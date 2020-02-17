<?php
    namespace Connect;

    use mysqli;

    Class ConnectDB {
        private static $instance = null;
        private $conn;

        private $servername = "localhost";
        private $username = "root";
        private $password = "root";
        private $dbname = "singleton";

        public function __construct() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                echo "Connect Fail";
            }
            echo "Connect Succes <br>";
        }

        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new ConnectDB();
            }
            return self::$instance;
        }

        public function getConnect() {
            return $this->conn;
        }
    }
