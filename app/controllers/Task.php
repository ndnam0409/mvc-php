<?php
    class Task extends Controller {
        public function index() {
            echo "Task";
        }

        public function get(){
            $task = $this->model('TaskModel');
            print_r($task->GetAllTask());
        }

        public function getTask($id){
            $task = $this->model('TaskModel');
            print_r($task->GetTask($id));
        }

}

