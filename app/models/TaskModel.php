<?php

require_once 'Model.php';


class TaskModel{
    private $db;
    public function __construct() {
        // Instantiate the Database class
        $database = new Database();
        // Get the PDO connection
        $this->db = $database->getConnection();
    }

    public function GetAllTask() {
        $stmt = $this->db->query("SELECT * FROM task");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetTask($id) {
        $stmt = $this->db->prepare("SELECT * FROM task WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}