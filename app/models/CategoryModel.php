<?php

require_once 'Model.php';


class CategoryModel{
    private $db;
    public function __construct() {
        // Instantiate the Database class
        $database = new Database();
        // Get the PDO connection
        $this->db = $database->getConnection();
    }

    public function GetAllCategory() {
        $stmt = $this->db->query("SELECT * FROM category");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}