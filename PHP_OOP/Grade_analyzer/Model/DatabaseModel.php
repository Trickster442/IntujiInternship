<?php
namespace Grade_analyzer\Model;

class DatabaseModel {
    public function studentInfoModel(): string {
        $sql = "CREATE TABLE IF NOT EXISTS studentInfo (
            id int NOT NULL AUTO_INCREMENT UNIQUE,
            FirstName varchar(255) NOT NULL,
            LastName varchar(255) NOT NULL,
            RollNo int NOT NULL UNIQUE,
            PhoneNum varchar(20) NOT NULL UNIQUE,
            Class int NOT NULL,
            PRIMARY KEY (id)    
        )";
        return $sql;
    }

    public function subjectMarksModel(): string {
        $sql = "CREATE TABLE IF NOT EXISTS subjectMarks(
            id int NOT NULL AUTO_INCREMENT UNIQUE,
            Math int NOT NULL,
            Science int NOT NULL,
            English int NOT NULL,
            Nepali int NOT NULL,
            Social int NOT NULL,
            Health int NOT NULL,
            student_id int,
            FOREIGN KEY (student_id) REFERENCES studentInfo(id),
            PRIMARY KEY (id)
        )";
        return $sql;
    }
}
