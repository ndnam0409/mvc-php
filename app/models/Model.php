<?php
require_once './app/core/Database.php';

class Model {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
}

