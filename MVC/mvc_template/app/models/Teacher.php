<?php

class Teachers
{
    use Model;

    protected $table = 'teachers';

    protected $allowedColumns = [
        'id',
        'first_name',
        'last_name',
        'phone_num',
        'role',
        'status',
        'class_id',
        'subject_id',
        'email',
        'password'
    ];

    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS teachers (
            id INT NOT NULL AUTO_INCREMENT,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            phone_num VARCHAR(20) NOT NULL UNIQUE,
            role ENUM('Teacher', 'ClassTeacher', 'Principal') DEFAULT 'Teacher',
            status ENUM('Pending', 'Active') DEFAULT 'Pending' , 
            class_id INT,
            subject_id INT,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
            FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE
        )";
        return $sql;
    }

}