<?php

class App{
    protected $controller="home";
    protected $action="index";
    protected $params=[];

    public function __construct(){
        $arr = $this->UrlProcess();
        
        // Controllers
        if (file_exists("./app/controllers/".$arr[0].".php")){
            require_once "./app/controllers/" . $arr[0] . ".php";
            $this->controller = new $arr[0];
        } else {
            require_once "./app/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
        }

        // Actions
        if (isset($arr[1]) && method_exists($this->controller, $arr[1])){
            $this->action = $arr[1];
        }

        // Params
        $this->params = $arr ? array_slice($arr, 2) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
        
    }

    public function UrlProcess(){
        if (isset($_GET["url"])){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        } 
        return [];
    }
}