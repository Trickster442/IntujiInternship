<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/AbstractDatabase.php';
require_once __DIR__ . '/TeacherModel.php';
class ClassModel extends AbstractDatabase
{
    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS classes (
            id INT NOT NULL AUTO_INCREMENT,
            class varchar(100) UNIQUE NOT NULL,
            PRIMARY KEY (id)
        )";
        return $sql;
    }
}
