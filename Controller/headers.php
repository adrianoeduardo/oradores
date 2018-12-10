<?php 
    class Headers {
        public function index(){
            header('Access-Control-Allow-Origin: *');
            header("Access-Control-Allow-Headers: Content-Type");
            header('Access-Control-Allow-Credentials: true');
            header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");
            header('Content-Type: application/json; charset=utf-8');
        }
    }

?>