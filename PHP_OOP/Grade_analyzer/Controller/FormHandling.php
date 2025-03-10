<?php declare(strict_types=1);

namespace Grade_analyzer\Controller;

use Grade_analyzer\Config\Config;


class FormHandling
{
    private $config;

    public function __construct(Config $conn)
    {
        $this->config = $conn->getConnection();
    }
    public function registerStudent($fName, $lName, $rollNo, $phone, $class, $email, $password) {
        $classID_query = "SELECT id FROM classes WHERE class = ?";
        $stmt = $this->config->prepare($classID_query);
        $stmt->bind_param('s', $class);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $classID = $row['id'];
        } else {
            echo "Error: Class not found.";
            return;
        }
        $stmt->close();
    

        $stmt = $this->config->prepare("INSERT INTO students (first_name, last_name, roll_no, phone_num, class_id, email, password) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssisiss', $fName, $lName, $rollNo, $phone, $classID, $email, $password);
    
        if ($stmt->execute()) {
            echo "Student registered successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    public function registerTeacher($fName, $lName, $phone, $class, $subject, $email, $password){
        $query1 = "SELECT c.id FROM classes c WHERE c.class = ?";
        $stmt1 = $this->config->prepare($query1);
        $stmt1->bind_param('s', $class); 
        $stmt1->execute();
        $stmt1->bind_result($class_id);

        if (!$stmt1->fetch()) {
            echo "Class not found.";
            $stmt1->close();
            return;
        }
        $stmt1->close();
    
        $query2 = "SELECT s.id FROM subjects s WHERE s.subject_name = ?";
        $stmt2 = $this->config->prepare($query2);
        $stmt2->bind_param('s', $subject);
        $stmt2->execute();
        $stmt2->bind_result($subject_id);

        if (!$stmt2->fetch()) {
            echo "Subject not found.";
            $stmt2->close();
            return;
        }

        $stmt2->close();
    
        if ($class_id && $subject_id) {
            $stmt = $this->config->prepare("INSERT INTO teachers (first_name, last_name, phone_num, class_id, subject_id, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssiiss', $fName, $lName, $phone, $class_id, $subject_id, $email, $password);
            $stmt->execute();
            $stmt->close();

        } else {
            echo "Class or Subject not found.";
        }
    }

    public function addClass($class)
    {
        $query = "INSERT INTO classes (class) VALUES (?)";
        $stmt = $this->config->prepare($query);
        $stmt->bind_param('s', $class);

        $stmt->execute();

        $stmt->close();

    }    
    
    public function addSubject($subject, $class) {
        $classID_query = "SELECT id FROM classes WHERE class = ?";
        $stmt = $this->config->prepare($classID_query);
        $stmt->bind_param('s', $class);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $classID = $row['id'];
        } else {
            echo "Error: Class not found.";
            return;
        }
        $stmt->close();
    
        $subject_name = $subject . ' ' . $class;
        $stmt = $this->config->prepare("INSERT INTO subjects (subject_name, class_id) 
                                        VALUES (?, ?)");
        $stmt->bind_param('ss', $subject_name, $classID);
    
        if ($stmt->execute()) {
            echo "New subject added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }

    public function getStudentByClass($class){
        $classID_query = "SELECT id FROM classes WHERE class = ?";
        $stmt = $this->config->prepare($classID_query);
        $stmt->bind_param('s', $class);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $classID = $row['id'];
        } else {
            echo "Error: Class not found.";
            return;
        }
        $stmt->close();

        $query = "SELECT s.id, s.first_name, s.last_name, s.roll_no, s.phone_num, s.class_id from students s WHERE class_id = $classID";
        $stmt2 = $this->config->query($query);
        $result2 = $stmt2->fetch_all(MYSQLI_ASSOC);
        return($result2);
    
    }

    public function getSubjectByClass($class_id) {
        $query = 'SELECT id, subject_name FROM subjects WHERE class_id = ?';
        
        $stmt = $this->config->prepare($query);
        $stmt->bind_param("i", $class_id);  
        $stmt->execute();
        
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
        return $result;
    }
    
    public function getUserByID($user_id){
        $query = "SELECT * FROM teachers WHERE id = ?";

        $stmt = $this->config->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        
        return $result;
    }
    
}






