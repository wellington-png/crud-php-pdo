<?php
    class DBConnection{
        private static $instance;
        private $conn;
        public function __construct(){
            $this->conn = new PDO("mysql:host=localhost;dbname=db_blog", "root", "password");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new DBConnection();
            }
            return self::$instance;
        }
        public function getConnection(){
            return $this->conn;
        }
        public function query($sql){
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn->query($sql);
        }
        public function prepare($sql){
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn->prepare($sql);
        }
        public function exec($sql){
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn->exec($sql);
        }
        
    }
?>