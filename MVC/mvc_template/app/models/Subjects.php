<?php

class Subjects
{
    use Model;

    protected $table = 'subjects';

    protected $allowedColumns = [
        'id',
        'subject_name',
        'class_id'
    ];

    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS subjects (
            id INT NOT NULL AUTO_INCREMENT,
            subject_name VARCHAR(255) UNIQUE NOT NULL, 
            class_id INT NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE
        )";
        return $sql;
    }

}