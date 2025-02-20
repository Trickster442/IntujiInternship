<?php

namespace Config;

use Grade_analyzer\Model\DatabaseModel;
require("../Model/DatabaseModel.php");
use mysqli;
class Config
{

    private $conn;

    public function __construct()
    {
        $servername = "mysql";
        $username = "root";
        $password = "root";
        $dbname = "grade_analyzer";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $model = new DatabaseModel();
        $query1 = $model->studentInfoModel();
        $query2 = $model->subjectMarksModel();

        // student info table creation
        if ($this->conn->query($query1) !== TRUE) {
            echo "Error creating Student Info table: " . $this->conn->error . "<br>";
        }

        // student subject marks table creation
        if ($this->conn->query($query2) !== TRUE) {
            echo "Error creating Student Marks table: " . $this->conn->error . "<br>";
        }
    }

    public function getConnection(){
        return $this->conn;
    }

}

