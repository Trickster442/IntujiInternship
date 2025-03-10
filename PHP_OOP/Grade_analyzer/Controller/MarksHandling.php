<?php declare(strict_types=1);

namespace Grade_analyzer\Controller;

use Grade_analyzer\Config\Config;


class MarksHandling
{
    private $config;

    public function __construct(Config $conn)
    {
        $this->config = $conn->getConnection();
    }
 
    public function insertStudentMarks(array $data) {
        $query = "INSERT INTO marks (class_id, student_id, subject_id, subject_marks, semester) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->config->prepare($query);
    
        if (!$stmt) {
            die("Error preparing statement: " . $this->config->error);
        }
    
        foreach ($data['marks_data'] as $mark) {
            $class_id = $data['class_id'];
            $student_id = $mark['student_id']; 
            $subject_id = $mark['subject_id'];
            $subject_mark = $mark['subject_mark']; 
            $semester = $data['semester'];
    
            $stmt->bind_param("iiids", $class_id, $student_id, $subject_id, $subject_mark, $semester);
    
            if (!$stmt->execute()) {
                echo "Error inserting record: " . $stmt->error;
            }
        }
    
        $stmt->close();
        $this->config->close();
    }
    
}






