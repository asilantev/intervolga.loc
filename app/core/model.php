<?php
    class Model
    {
        private $server, $base, $user, $pass;
        public $dbh, $result;
        
        public function __construct()
        {
            $this->server = 'localhost';
            $this->base = 'intervolga';
            $this->user = 'root';
            $this->pass = '12345';
            try
            {
                $pdoParams = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
                $this->dbh = new PDO("mysql:host=$this->server;dbname=$this->base", $this->user, $this->pass, $pdoParams);
            }
            catch (PDOException $e)
            {
                die("Ошибка подключения к базе данных: {$e->getMessage()}");
            }
        }
        //Функция получения данныз с БД
        public function getData()
        {
        }
        //Функция сохранения данных в БД
        public function save($data)
        {
        }
    }