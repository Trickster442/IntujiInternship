<?php

namespace Grade_analyzer\Config;

use Grade_analyzer\Model\MainModel;
require_once __DIR__ . '/../Model/MainModel.php';


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

        $model = new MainModel();
        $model = ($model->main());
        foreach($model as $query){
            if ($this->conn->query($query) !== TRUE) {
                echo "Error creating table: " . $this->conn->error . "<br>";
            }
        }
    }

    
    public function getConnection(): mysqli{
        return $this->conn;
    }

}

// $try = new Config();
// $try->getConnection();