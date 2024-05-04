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

        public function addTask() {
            $taskModel = $this->model('TaskModel');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize and validate input
                $taskName = trim(htmlspecialchars($_POST['taskName']));
                $taskDescription = trim(htmlspecialchars($_POST['taskDescription']));
                $startDate = trim(htmlspecialchars($_POST['startDate']));
                $dueDate = trim(htmlspecialchars($_POST['dueDate']));

                // Check if all required fields are filled
                if (!empty($taskName) && !empty($taskDescription) && !empty($startDate) && !empty($dueDate)) {
                    // Add the task using the model
                    $taskModel->AddTask($taskName, $taskDescription, $startDate, $dueDate);
                    // Redirect or inform the user of success
                    header("Location: viewAllTask");
                    exit();
                } else {
                    // Inform the user that all fields are required
                    echo "Please fill in all required fields.";
                }
            } else {
                // GET request handling for displaying the form
                $this->view("addTask");
            }
        }
        public function editTask($taskId = null) {
            $taskModel = $this->model('TaskModel');
            error_log("Received Task ID: " . $taskId);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Handle form submission
                $taskName = $_POST['name'];
                $taskDescription = $_POST['description'];
                $status = $_POST['status'];
                $startDate = $_POST['start_date'];
                $dueDate = $_POST['due_date'];
                $taskModel->EditTask($taskId, $taskName, $taskDescription, $status, $startDate, $dueDate);
                header("Location: /task-management/task/viewAllTask");
                exit();
            } else {
                // Handle GET request for displaying the form
                if ($taskId !== null) {
                    $task = $taskModel->GetTask($taskId);
                    error_log("Fetched Task Data: " . json_encode($task));

                    if ($task) {
                        $this->view("editTask", ['task' => $task]);
                    } else {
                        echo "Task not found.";
                    }
                } else {
                    // Redirect or show an error message if task ID is not provided
                    header("Location: /task-management/task/viewAllTask");
                    exit();
                }
            }
        }


       public function delete($taskId) {
            $taskModel = $this->model('TaskModel');
            $result = $taskModel->DeleteTaskById($taskId);

            if ($result) {
                http_response_code(200); // OK
                echo json_encode(["message" => "Task deleted successfully"]);
            } else {
                http_response_code(500); // Internal Server Error
                echo json_encode(["message" => "Failed to delete task"]);
            }
        }

        public function deleteMultiple() {
            $taskModel = $this->model('TaskModel');
            $input = json_decode(file_get_contents("php://input"), true);
            $taskIds = $input['ids'] ?? [];

            if (empty($taskIds)) {
                http_response_code(400); // Bad Request
                echo json_encode(["message" => "No task IDs provided"]);
                return;
            }

            $result = $taskModel->DeleteTasks($taskIds);

            if ($result) {
                http_response_code(200); // OK
                echo json_encode(["message" => "Tasks deleted successfully"]);
            } else {
                http_response_code(500); // Internal Server Error
                echo json_encode(["message" => "Failed to delete tasks"]);
            }
        }

}

