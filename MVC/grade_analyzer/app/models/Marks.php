<?php
class Marks
{
    use Model;

    protected $table = 'marks';

    protected $allowedColumns = [
        'id',
        'class_id',
        'student_id',
        'subject_id',
        'subject_marks',
        'semester'
    ];

    public function createDatabase(): string
    {
        $sql = "CREATE TABLE IF NOT EXISTS marks (
            id INT NOT NULL AUTO_INCREMENT,
            class_id INT NOT NULL,
            student_id INT NOT NULL,
            subject_id INT NOT NULL,
            subject_marks INT NOT NULL,
            semester varchar(50) NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
            FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
            FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
        )";
        return $sql;
    }

}