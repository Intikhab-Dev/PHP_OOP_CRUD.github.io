<?php
session_start();
class Database
{
    // --------------------------------------------------
    ## Table structure
    //     CREATE TABLE `users` (
    //   `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    //   `name` VARCHAR(255),
    //   `email` VARCHAR(100),
    //   `phone` VARCHAR(20)
    // ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    // --------------------------------------------------

    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect()
    {

        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'oop_crud';

        $conn = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );

        return $conn;
    }
}


## Class to perform SQL queries
class Query extends Database
{

    ## function to get data
    public function getData($table, $feilds)
    {
        $sql = "SELECT  $feilds FROM $table ORDER BY id desc";
        $result = $this->connect()->query($sql);
        return $result;
    }

    ## funtion to insert data
    public function insertData($table, $param)
    {

        $fields = array();
        $values = array();
        foreach ($param as $key => $value) {
            $fields[] = $key;
            $values[] = $value;
        }

        $fields = implode(",", $fields);
        $values = implode("','", $values);
        $values = "'" . $values . "'";

        $sql = "INSERT INTO $table ($fields) 
            VALUES ($values)";

        $result = $this->connect()->query($sql);
        return $result;
    }

    ## Function to delete data
    public function deleteData($table, $field, $id)
    {
        $sql = "DELETE FROM $table WHERE $field = $id";
        $result = $this->connect()->query($sql);
        return $result;
    }

    ## Function to get single record
    public function getDataById($table, $fields, $whereField, $id)
    {
        $sql = "SELECT $fields FROM $table WHERE $whereField = $id";
        $result = $this->connect()->query($sql);
        return $result;
    }

    ## Function to update data
    public function updateData($table, $param, $whereField, $id)
    {
        $sql = "UPDATE $table SET";
        $length = count($param); // 3
        $i = 1;

        foreach ($param as $key => $value) {
            if ($i == $length) // 1==3
                $sql .= " $key='$value'";
            else
                $sql .= " $key='$value' , ";
            $i++;
        }

        $sql .= " WHERE $whereField = $id";
        $result = $this->connect()->query($sql);
        return $result;
    }
}
