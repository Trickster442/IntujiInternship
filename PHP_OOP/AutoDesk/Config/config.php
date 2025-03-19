<?php
namespace Autodesk\Config;

use Autodesk\Model\UserModel;
require_once '../Model/UserModel.php';

use mysqli;
class Config
{
    private $conn;
    public function __construct()
    {
        $servername = "mysql";
        $username = "root";
        $password = "root";
        $dbname = "autodesk";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $model = new UserModel();
        $query =$model->createDatabase();
        
        if ($this->conn->query($query) !== true){
            echo "Error creating table";
        }
           
    }

    
    public function getConnection(): mysqli{
        return $this->conn;
    }

}
