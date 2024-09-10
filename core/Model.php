<?php

namespace Core;

use Database\Sql\Database;

class Model extends Database
{
    protected mixed $config;

    public function __construct()
    {
        $app_config = require base_path('/config/database.php');
        $this->config = $app_config['app'];
        parent::__construct($this->config['config'], $this->config['engine'], $this->config['secret']['username'], $this->config['secret']['password']);
    }

    public function all(): false|array
    {
        return $this->query()->get();
    }

    public function find($id): false|array
    {
        return $this->query('WHERE id = :id', ['id' => $id])->findOrFail();
    }

    public function where($key, $value): Model
    {
        return $this->query("WHERE {$key} = :{$key}", [$key => $value]);
    }
    public function oneToOne($table, $foreign_key): Model
    {
        return $this->query("JOIN {$table} ON {$table}.id = {$this->table}.{$foreign_key}");
    }
    public function oneToMany($table, $foreign_key): Model
    {
        return $this->query("JOIN {$table} ON {$table}.{$foreign_key} = {$this->table}.id");
    }
}