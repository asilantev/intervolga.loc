<?php
    class Route
    {
        public static function start()
        {
            $controllerName = 'Main';
            $actionName = 'index';
            $uri = $_SERVER['REQUEST_URI'];
            //избавляемся от параметров в URL
            if (($cutoff = strpos($uri, '?')) !== false)
                $uri = substr($uri, 0, $cutoff);
            $routes = explode('/', $uri);
            //получаем имя контроллера
            if(!empty($routes[1]))
                $controllerName = $routes[1];
            //получаем экшен
            if(!empty($routes[2]))
                $actionName = $routes[2];
            //формируем имя контроллера, модели и экшена
            $modelName = 'Model_'.$controllerName;
            $controllerName = 'Controller_'.$controllerName;
            $actionName = 'action'.ucfirst($actionName);
            //формируем имя модели и путь к файлу
            $modelFile = strtolower($modelName).'.php';
            $modelPath = "app/models/{$modelFile}";
            if(file_exists($modelPath))
                include_once($modelPath);
            //формируем имя контроллера и путь к файлу
            $controllerFile = strtolower($controllerName).'.php';
            $controllerPath = "app/controllers/{$controllerFile}";
            if(file_exists($controllerPath))
                include_once($controllerPath);
            else
                Route::errorPage404();
            //создаем новый контроллер и вызываем экшен
            $controller = str_replace('_', '', $controllerName);
            $controller = new $controller;
            $action = $actionName;
            if(method_exists($controller, $action))
                $controller->$action();
            else
                Route::errorPage404();
        }
    
        public function ErrorPage404()
        {
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host.'404');
        }
    }