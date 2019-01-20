<?php
    class ControllerMain extends Controller
    {
        public function __construct()
        {
            $this->model = new ModelMain();
            $this->view = new View();
        }
    
        public function actionIndex()
        {
            $data = $this->model->getData();
            $this->view->generate('view_main.php', 'view_template.php', $data);
        }
        
        public function actionAdd()
        {
            $status = 0;
            $newCountry = $_POST;
            //проверка на правильность заполения данных
            if(!isset($newCountry['country-name']) && !$this->model->checkName($newCountry['country-name']))
                $status += 1;
            if(!isset($newCountry['capital-name']) && !$this->model->checkName($newCountry['capital-name']))
                $status += 2;
            if(!isset($newCountry['population']) && !$this->model->checkPopulation($newCountry['population']))
                $status += 3;
            //сохранение данных в бд и вывод ошибок
            if($status == 0)
            {
                $errors = $this->model->save($newCountry);
                if($errors === TRUE)
                    header("Location: {$_SERVER['HTTP_REFERER']}?error=none");
                else
                    header("Location: {$_SERVER['HTTP_REFERER']}?error={$errors}");
            }
            else
                header("Location: {$_SERVER['HTTP_REFERER']}?error=Неверно заполнены данные");
        }
    }