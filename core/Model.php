<?php

namespace core;

use database\sql\Database;

class Model extends Database
{
    protected mixed $config;

    public function __construct()
    {
        $app_config = require base_path('/config/database.php');
        $this->config = $app_config['app'];
        parent::__construct($this->config['config'], $this->config['engine'], $this->config['secret']['username'], $this->config['secret']['password']);
    }
}