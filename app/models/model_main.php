<?php
    class ModelMain extends Model
    {
        public $id;
        public function __construct()
        {
            parent::__construct();
        }
    
        public function getData()
        {
            if($this->dbh != NULL)
            {
                //подготавливаем запрос и получаем данные из БД, сортируя по названию страны
                $sql = "SELECT * FROM countries ORDER BY name_country";
                $sth = $this->dbh->prepare($sql);
                $sth->execute();
                $this->result = $sth->fetchAll();
                if(count($this->result) > 0)
                    return $this->result;
                return array();
            }
            return array();
        }
        
        public function checkName($data)
        {
            return preg_match("/^[А-Яа-яёЁ ]+$/u", $data);
        }
    
        public function checkPopulation($data)
        {
            return is_int($data) ? str_replace(' ', '', $data) : false;
        }
        //функиця проверки на уникальность названия страны в БД
        private function checkUniqueNameInDb($data)
        {
            $query = "SELECT id_country FROM countries WHERE name_country=?";
            $sth = $this->dbh->prepare($query);
            $sth->bindValue(1, $data, PDO::PARAM_STR);
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC);
        }
        
        public function save($data)
        {
            if($this->dbh != NULL)
            {
                //если страны нет в списке, то добавляем новую
                if(!is_array($this->checkUniqueNameInDb($data['country-name'])))
                {
                    $query = "INSERT INTO countries (name_country, name_capital, population) 
                         VALUES (:nCountry, :nCapital, :cPopulation)";
                    $sth = $this->dbh->prepare($query);
                    $param = [ 'nCountry' => $data['country-name'],
                               'nCapital' => $data['capital-name'],
                               'cPopulation' => $data['population']];
                    return $sth->execute($param);
                }
                else
                    return 'Данная страна уже в списке';
            }
        }
    }