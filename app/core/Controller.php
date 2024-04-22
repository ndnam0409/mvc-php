<?php

class Controller{
    public function model($model){
        require "./app/models/".$model.".php";
        return new $model;
    }

    public function view($view){
        
    }
}