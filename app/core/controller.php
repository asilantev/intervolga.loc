<?php
    class Controller
    {
        public $model, $view;
        
        public function __construct()
        {
            $this->view = new View();
        }
        
        public function actionIndex()
        {
        }
    }