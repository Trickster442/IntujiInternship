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

    public function insertStudentMarks(array $data)
    {
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
    public function getMarksByClass($class)
    {
        $query = "SELECT m.id, s.first_name, s.last_name, sub.subject_name, m.semester, m.subject_marks 
              FROM marks m
              INNER JOIN students s ON m.student_id = s.id
              INNER JOIN subjects sub ON m.subject_id = sub.id
              WHERE s.class_id = ?";

        $stmt = $this->config->prepare($query);
        $stmt->bind_param("i", $class);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function getMarksByClassAndSemester($class, $semester)
    {
        $query = "SELECT m.id, s.first_name, s.last_name, sub.subject_name, m.semester, m.subject_marks 
              FROM marks m
              INNER JOIN students s ON m.student_id = s.id
              INNER JOIN subjects sub ON m.subject_id = sub.id
              WHERE s.class_id = ? AND m.semester = ?";

        $stmt = $this->config->prepare($query);
        $stmt->bind_param("is", $class, $semester);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function searchMarks($name, $class_id)
    {
        $query = "SELECT m.semester, m.subject_marks, c.class, s.first_name, s.last_name, sub.subject_name
              FROM marks m
              INNER JOIN classes c ON m.class_id = c.id
              INNER JOIN students s ON m.student_id = s.id
              INNER JOIN subjects sub ON m.subject_id = sub.id
              WHERE CONCAT(s.first_name, ' ', s.last_name) LIKE ? 
              AND m.class_id = ?";

        $stmt = $this->config->prepare($query);
        $name = "%$name%";
        $stmt->bind_param("si", $name, $class_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }


}






