<?php

namespace Core;

use Database\Sql\Database;

abstract class Model extends Database
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
        return $this->query("SELECT * FROM {$this->table} ")->get();
    }

    public function find($id): false|array
    {
        return $this->query("SELECT * FROM {$this->table} ", 'WHERE id = :id', ['id' => $id])->findOrFail();
    }

    public function where($key, $value): Model
    {
        return $this->query("SELECT * FROM {$this->table} ","WHERE {$key} = :{$key}", [$key => $value]);
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $keys = implode(',', array_keys($data));
        $values = implode(',', array_map(fn($key) => ":{$key}", array_keys($data)));
        $this->query("INSERT INTO {$this->table}", "({$keys}) VALUES ({$values})", $data);
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