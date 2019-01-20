<?php
   class View
   {
       //генерация страницы
       public function generate($contentView, $templateView, $data = NULL)
       {
           require_once("app/views/{$templateView}");
       }
   }