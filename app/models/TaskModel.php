<?php

require_once 'Model.php';

class TaskModel{
    private $db;
    public function __construct() {
        $database = new Database();
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

    public function AddTask($task) {
        $stmt = $this->db->prepare("INSERT INTO task (task) VALUES (:task)");
        $stmt->bindParam(':task', $task);
        $stmt->execute();
    }

    public function UpdateTaskById($id, $task) {
        $stmt = $this->db->prepare("UPDATE task SET task = :task WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':task', $task);
        $stmt->execute();
    }

    public function DeleteTaskById($id) {
        $stmt = $this->db->prepare("DELETE FROM task WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}