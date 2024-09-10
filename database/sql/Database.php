<?php

namespace Database\Sql;

use Core\Response;
use PDO;

class Database
{
    public PDO $connection;
    protected $table;
    protected $statement;

    public function __construct($config,$service,$username = 'root',$password = '')
    {
        $dns = $service.':'.http_build_query($config,'',';');

        $this->connection = new PDO($dns, $username,$password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * @param $condition
     * @param $param
     * @return Database
     */
    public function query($condition = null, $param = null): static
    {
        if ($condition){
            $this->statement = $this->connection->prepare("SELECT * FROM {$this->table} {$condition}");
            $this->statement->execute($param);
            return $this;

        }
        $this->statement = $this->connection->prepare("SELECT * FROM {$this->table}");
        $this->statement->execute();
        return $this;
    }
    public function get()
    {
        return $this->statement->fetchAll();
    }
    public function first()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $data = $this->statement->fetch();
        if (!$data){
            Response::abort(Response::NOT_FOUND);
        }
        return $data;
    }
}