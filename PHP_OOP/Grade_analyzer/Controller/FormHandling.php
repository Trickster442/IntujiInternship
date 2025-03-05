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
    public function register_student($fName, $lName, $rollNo, $phone, $class, $email, $password) {
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
    
    public function register_teacher($fName, $lName, $phone, $class, $subject, $email, $password){
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
            
            header('Location: ../index.php');
        } else {
            echo "Class or Subject not found.";
        }
    }
    
    public function insert_student_data($math, $science, $english, $nepali, $social, $health)
    {
        $rollNos = array_keys($social);

        foreach ($rollNos as $values) {
            $stmt = $this->config->prepare("SELECT id FROM students WHERE roll_no = ?");
            $stmt->bind_param("i", $values);
            $stmt->execute();
            $result = $stmt->get_result();


            $id_fetch = $result->fetch_assoc();

            if ($id_fetch) {
                $id = (int) $id_fetch['id'];

                //check if result already exists
                $checkStmt = $this->config->prepare("SELECT student_id FROM subjectMarks WHERE student_id = ?");
                $checkStmt->bind_param("i", $id);
                $checkStmt->execute();
                $checkStmt->store_result();

                if ($checkStmt->num_rows > 0) {
                    echo "Error: Score already exists!";
                    return;
                }

                $stmt2 = $this->config->prepare("INSERT INTO subjectMarks (Math, Science, English, Nepali, Social, Health, student_id) 
                                                 VALUES (?, ?, ?, ?, ?, ?, ?)");

                if ($stmt2) {
                    $stmt2->bind_param(
                        "ddddddi",
                        $math[$values],
                        $science[$values],
                        $english[$values],
                        $nepali[$values],
                        $social[$values],
                        $health[$values],
                        $id
                    );

                    if ($stmt2->execute()) {
                        echo "Marks inserted successfully for RollNo: $values<br>";
                    } else {
                        echo "Error inserting marks for RollNo: $values - " . $stmt2->error . "<br>";
                    }

                    $stmt2->close();
                } else {
                    echo "Error preparing INSERT statement.<br>";
                }

            } else {
                echo "No ID found for RollNo: $values<br>";
            }
        }
    }

    public function add_class($class)
    {
        $query = "INSERT INTO classes (class) VALUES (?)";
        $stmt = $this->config->prepare($query);
        $stmt->bind_param('s', $class);

        $stmt->execute();

        $stmt->close();

    }    
    
    public function add_subject($subject, $class) {
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

}







