<?php
    class Category extends Controller {
        public function index() {
            echo "Category";
        }

        public function get(){
            $category = $this->model('CategoryModel');
            print_r($category->GetAllCategory());
        }
}

