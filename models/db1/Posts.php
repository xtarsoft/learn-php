<?php

namespace models\db1;


class Posts extends ModelDb1
{
    protected string $table = 'posts';
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        return $this->query($this->table);
    }

    public function getById($id): false|array
    {
        return $this->query($this->table, 'WHERE id = :id', ['id' => $id]);
    }
}