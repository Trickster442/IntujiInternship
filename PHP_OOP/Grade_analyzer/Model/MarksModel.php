<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/AbstractDatabase.php';
require_once __DIR__ . '/StudentModel.php';
require_once __DIR__ . '/SubjectModel.php';
require_once __DIR__ . '/ClassModel.php';

class MarksModel extends AbstractDatabase
{
    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS marks (
            id INT NOT NULL AUTO_INCREMENT,
            class_id INT NOT NULL,
            student_id INT NOT NULL,
            subject_id INT NOT NULL,
            subject_marks INT NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (class_id) REFERENCES classes(id),
            FOREIGN KEY (student_id) REFERENCES students(id),
            FOREIGN KEY (subject_id) REFERENCES subjects(id)
        )";
        return $sql;
    }
}
