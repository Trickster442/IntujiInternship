<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/AbstractDatabase.php';
require_once __DIR__ . '/ClassModel.php';
require_once __DIR__ . '/SubjectModel.php';

class TeacherModel extends AbstractDatabase
{
    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS teachers (
            id INT NOT NULL AUTO_INCREMENT,
            FirstName VARCHAR(255) NOT NULL,
            LastName VARCHAR(255) NOT NULL,
            PhoneNum VARCHAR(20) NOT NULL UNIQUE,
            role ENUM('Teacher', 'ClassTeacher', 'Principal') DEFAULT 'Teacher',
            status ENUM('Pending', 'Active') DEFAULT 'Pending' , 
            class_id INT,
            subject_id INT,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (subject_id) REFERENCES subjects (id),
            FOREIGN KEY (class_id) REFERENCES class(id)
        )";
        return $sql;
    }
}
