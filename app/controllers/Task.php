<?php
    class Task extends Controller {
        public function index() {
            echo "Task";
        }

        public function viewAllTask(){
            $taskModel = $this->model('TaskModel');
            $tasks = $taskModel->GetAllTask();
            $this->view("viewTask", $tasks);
        }

        public function addTask(){
            $taskModel = $this->model('TaskModel');
            if(isset($_POST['taskName'])){
                $taskName = $_POST['taskName'];
                $taskDescription = $_POST['taskDescription'];
                $startDate = $_POST['startDate'];
                $dueDate = $_POST['dueDate'];
                $taskModel->AddTask($taskName, $taskDescription, $startDate, $dueDate);
            }
            $this->view("addTask");
        }

        public function editTask(){
            $taskModel = $this->model('TaskModel');
            if(isset($_POST['taskName'])){
                $taskName = $_POST['taskName'];
                $taskDescription = $_POST['taskDescription'];
                $startDate = $_POST['startDate'];
                $dueDate = $_POST['dueDate'];
                $taskModel->EditTask($taskName, $taskDescription, $startDate, $dueDate);
            }
            $this->view("editTask");
        }

        // Task Controller

        public function delete($taskId) {
            // Call the model method to delete the task
            $result = $this->model('TaskModel')->deleteTask($taskId);
            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                // Send an error response if the delete operation failed
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Task could not be deleted']);
            }
            exit();
        }

        public function deleteMultiple() {
            $idsToDelete = json_decode(file_get_contents('php://input'), true)['ids'];
            $result = $this->model('TaskModel')->deleteMultipleTasks($idsToDelete);
            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                // Send an error response if the delete operation failed
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Tasks could not be deleted']);
            }
            exit();
        }


}

