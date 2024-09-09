<?php

namespace models\db1;

use database\sql\Database;

class ModelDb1 extends Database
{
    protected mixed $config;

    public function __construct()
    {
        $app_config = require rootPath('/config/database.php');
        $this->config = $app_config['app'];
        parent::__construct($this->config['db'], $this->config['engine'], $this->config['secret']['username'], $this->config['secret']['password']);
    }
}