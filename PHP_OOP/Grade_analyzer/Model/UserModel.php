<?php
namespace Grade_analyzer\Model;
require_once __DIR__ . '/AbstractDatabase.php'; 
class UserModel extends AbstractDatabase
{
    public function createDatabase(): string{
        $sql = "CREATE TABLE IF NOT EXISTS userInfo (
            id INT NOT NULL AUTO_INCREMENT,
            FirstName VARCHAR(255) NOT NULL,
            LastName VARCHAR(255) NOT NULL,
            RollNo INT NOT NULL UNIQUE,
            PhoneNum VARCHAR(20) NOT NULL UNIQUE,
            role ENUM('Teacher', 'Student', 'Principal') DEFAULT 'Student',
            Class INT DEFAULT 0,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            PRIMARY KEY (id)    
        )";
        return $sql;
    }
}
