<?php

namespace database\sql;

use PDO;

class Database
{
    public PDO $connection;

    public function __construct($config,$service,$username = 'root',$password = '')
    {
        $dns = $service.':'.http_build_query($config,'',';');

        $this->connection = new PDO($dns, $username,$password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * @param $table
     * @param $condition
     * @param $param
     * @return false|array
     */
    public function query($table , $condition = null, $param = null): false|array
    {
        if ($condition){
            $stmt = $this->connection->prepare("SELECT * FROM {$table} {$condition}");
            $stmt->execute($param);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        $stmt = $this->connection->prepare("SELECT * FROM {$table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}