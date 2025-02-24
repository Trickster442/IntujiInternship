<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/AbstractDatabase.php';

class ClassModel extends AbstractDatabase
{
    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS class (
            id INT NOT NULL AUTO_INCREMENT,
            class INT UNIQUE NOT NULL, 
            PRIMARY KEY (id)
        )";
        return $sql;
    }
}
