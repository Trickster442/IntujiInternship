<?php

class Classes
{
    use Model;

    protected $table = 'classes';

    protected $allowedColumns = [
        'id',
        'class'
    ];

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