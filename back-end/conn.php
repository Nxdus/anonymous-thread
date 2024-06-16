<?php

    define("DB_Server","localhost");
    define("DB_User","root");
    define("DB_Password","");
    define("DB_Name","anonymousthread");

    class db_con {
        private $conn;
        public function __construct() {
            $this->conn = mysqli_connect(DB_Server, DB_User, DB_Password, DB_Name);
            if(!$this->conn) {
                die("Connection failed: ". mysqli_connect_error());
            }
        }

        public function query() {
            $result = mysqli_query($this->conn, "SELECT * FROM posts");
            return $result;
        }

        public function fecthid($id) {
            $result = mysqli_query($this->conn, "SELECT * FROM posts WHERE id = $id");
            return $result;
        }

        public function insert($text, $date, $time, $address) {
            $result = mysqli_query($this->conn, "INSERT INTO posts(text, date, time, address) VALUES('$text', '$date', '$time', '$address')");
            return $result;
        }

        public function update($text,$date, $time, $address, $id) {
            $result = mysqli_query($this->conn, "UPDATE posts SET text = '$text', date = '$date', time = '$time', address = '$address' WHERE id = $id");
            return $result;
        }

        public function delete($id) {
            $result = mysqli_query($this->conn, "DELETE FROM posts WHERE id = '$id'");
            return $result;
        }
    }
?>