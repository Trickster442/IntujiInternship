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
 
    public function insertStudentMarks(array $data){
        $query = "INSERT INTO marks (class_id, student_id, subject_id, subject_marks, semester) VALUES ";
        $values = [];
        foreach($data['marks_data'] as $mark){
            $values[] = "({$data['class_id']}, {$data['student_id']}, {$mark['subject_id']}, {$mark['marks']}, {$data['semester']})";
        }

        $query .= implode(", ", $values);

        if ($this->config->query($query) === TRUE) {
            echo "Records inserted successfully.";
        } else {
            echo "Error: " . $query . "<br>" . $this->config->error;
        }
        
        // Close connection
        $this->config->close();
    }    
}






