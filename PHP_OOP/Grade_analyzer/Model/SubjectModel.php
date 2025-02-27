<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/AbstractDatabase.php';
require_once __DIR__ . '/ClassModel.php';

class SubjectModel extends AbstractDatabase
{
    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS subjects (
            id INT NOT NULL AUTO_INCREMENT,
            SubjectName VARCHAR(255) UNIQUE NOT NULL, 
            class_id INT NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (class_id) REFERENCES class(id)
        )";
        return $sql;
    }
}
