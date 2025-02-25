<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/AbstractDatabase.php';
require_once __DIR__ . '/ClassModel.php';

class StudentModel extends AbstractDatabase
{
    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS student (
            id INT NOT NULL AUTO_INCREMENT,
            FirstName VARCHAR(255) NOT NULL,
            LastName VARCHAR(255) NOT NULL,
            RollNo INT NOT NULL UNIQUE,
            PhoneNum VARCHAR(20) NOT NULL UNIQUE,
            class_id INT NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (class_id) REFERENCES class(id)
        )";
        return $sql;
    }
}
