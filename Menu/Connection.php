<?php 
    class Connection{
        private $conn;

        protected $host = "localhost";
        protected $user = "root";
        protected $pass = "";
        protected $db = "depot_7";

        public function __construct(){
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            return $this->conn;
        }
    }
?>