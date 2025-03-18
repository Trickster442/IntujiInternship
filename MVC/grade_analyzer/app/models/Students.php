<?php

class Students
{
    use Model;

    protected $table = 'students';

    protected $allowedColumns = [
        'id',
        'first_name',
        'last_name',
        'roll_no',
        'phone_num',
        'class_id',
        'email',
        'password'
    ];

    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS students (
            id INT NOT NULL AUTO_INCREMENT,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            roll_no INT NOT NULL UNIQUE,
            phone_num VARCHAR(20) NOT NULL UNIQUE,
            class_id INT NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
            UNIQUE KEY (class_id, roll_no)
        )";
        return $sql;
    }

}