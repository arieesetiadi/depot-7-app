<?php 
    class Connection{
        private $conn;

        protected $host = "localhost";
        protected $user = "n1566767_root";
        protected $pass = "@Root1212";
        protected $db = "n1566767_depot7";

        public function __construct(){
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            return $this->conn;
        }
    }
?>