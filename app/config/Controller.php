<?php

    class Controller{

        protected function view($view,$data = [])
        {
            if (is_array($data)) {
                require_once '../app/views/'.$view.".php";
            }else {
                $data =['error' => "Parameter view bukan Array -> $view"] ;
                require_once '../app/views/error/view.php';
                die();
            }
        }

        protected function model($model)
        {
            if(file_exists('../app/models/'.$model.".php") && is_string($model)){
                require_once '../app/models/'.$model.".php";
                return new $model;

            }else {
                $data =['error' => "Parameter model bukan string / model tidak ditemukan  -> $model"] ;
                require_once '../app/views/error/view.php';
                die();
            }
        }
    }