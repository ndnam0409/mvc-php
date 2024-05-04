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
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        return $task ? $task : null;
    }


    public function AddTask($taskName, $taskDescription, $startDate, $dueDate) {
        // Get the smallest available ID
        $stmt = $this->db->query("SELECT COALESCE(MIN(id + 1), 1) AS new_id FROM task WHERE id + 1 NOT IN (SELECT id FROM task)");
        $new_id = $stmt->fetchColumn();

        $sql = "INSERT INTO task (id, name, description, start_date, due_date) VALUES (:id, :name, :description, :start_date, :due_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $new_id);
        $stmt->bindParam(':name', $taskName);
        $stmt->bindParam(':description', $taskDescription);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':due_date', $dueDate);
        $stmt->execute();
    }

    public function EditTask($id, $taskName, $taskDescription, $status, $startDate, $dueDate) {
        $sql = "UPDATE task 
                SET name = :name, 
                    description = :description, 
                    status = :status,
                    start_date = :start_date, 
                    due_date = :due_date 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $taskName);
        $stmt->bindParam(':description', $taskDescription);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':due_date', $dueDate);
        $stmt->execute();
    }

    public function DeleteTaskById($id) {
        $stmt = $this->db->prepare("DELETE FROM task WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function DeleteTasks($taskIds) {
        $placeholders = implode(',', array_fill(0, count($taskIds), '?'));
        $stmt = $this->db->prepare("DELETE FROM task WHERE id IN ($placeholders)");
        return $stmt->execute($taskIds);
    }

}