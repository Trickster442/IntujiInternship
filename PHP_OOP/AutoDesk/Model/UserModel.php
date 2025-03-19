<?php
namespace Autodesk\Model;

class UserModel
{
    public function createDatabase(): string {
    $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            age INT (3) NOT NULL
            )";
            return $sql;
    }
}