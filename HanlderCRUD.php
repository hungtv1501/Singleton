<?php
    include 'ConnectBD.php';

    use Connect\ConnectDB;

    Class HandleCRUD {
        private $connect;

        public function __construct() {
            $instance = ConnectDB::getInstance();
            $this->connect = $instance->getConnect();
        }

        public function show() {
            echo "SHOW <br>";
            $sql = "SELECT * FROM user;";
            $result = $this->connect->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "id: ". $row["id"] . "    Ten: ". $row["name"] . "    Dia Chi: " . $row["address"] . "    SDT" . $row['phone'] . "<br>";
                }
            } else {
                echo "Show fail";
            }
        }

        public function create() {
            echo "CREATE <br>";
            $sql = "INSERT INTO user (name, address, phone) VALUES ('Hung', 'TB', '123');";
            if ($this->connect->query($sql) === TRUE) {
                echo "Insert OK";
            } else {
                echo "Insert fail";
            }
        }

        public function update($id) {
            echo "UPDATE <br>";
            $sqlSelect = "SELECT * FROM user where id =".$id.";";
            $result = $this->connect->query($sqlSelect);
            if ($result->num_rows > 0) {
                $sql = "UPDATE user SET name = 'Hung123' WHERE id = " . $id . ";";
                if ($this->connect->query($sql) === TRUE) {
                    echo "Update OK";
                } else {
                    echo "Update fail";
                }
            } else {
                echo "ID does not exist";
            }
        }

        public function delete($id) {
            echo "DELETE <br>";
            $sqlSelect = "SELECT * FROM user where id =".$id.";";
            $result = $this->connect->query($sqlSelect);
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM user WHERE id = " . $id . ";";
                if ($this->connect->query($sql) === TRUE) {
                    echo "Delete OK";
                } else {
                    echo "Delete fail";
                }
            } else {
                echo "ID does not exist";
            }
        }
    }

    $crud = new HandleCRUD;
    $crud->delete(3);

