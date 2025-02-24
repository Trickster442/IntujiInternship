<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/AbstractDatabase.php'; 

class SubjectModel extends AbstractDatabase
{
    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS subjectModel (
            id INT NOT NULL AUTO_INCREMENT,
            SubjectName VARCHAR(255) UNIQUE NOT NULL,  -- Corrected syntax here
            PRIMARY KEY (id)
        )";
        return $sql;
    }
}
