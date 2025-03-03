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
    public function get_score(): array{
        $student_scores = [];
        $names = $_POST["name"];

        $sciences_marks = $_POST["science"];
        $math_marks = $_POST["math"];
        $english_marks = $_POST["english"];
        $computer_marks = $_POST["computer"];
        $social_marks = $_POST["social"];

        // Store in associative way
        for ($i = 0; $i < count($names); $i++) {
            $total = (float) $sciences_marks[$i] + (float) $math_marks[$i] + (float) $english_marks[$i] + (float) $computer_marks[$i] + (float) $social_marks[$i];
            $total_percentage = (float) ($total / 500) * 100;
            $student_scores[$names[$i]] = ['science' => (float) $sciences_marks[$i], 'math' => (float) $math_marks[$i], 'english' => (float) $english_marks[$i], 'computer' => (float) $computer_marks[$i], 'social' => (float) $social_marks[$i], 'percentage' => round($total_percentage, 2)];
        }

        return $student_scores;
    }
    public function register_student($fName, $lName, $rollNo, $phone, $class, $email, $password){
    $rollNo = (int) $rollNo;
    $class = (int) $class;

    $stmt1 = $this->config->prepare("SELECT id FROM class WHERE id = ?");
    $stmt1->bind_param("i", $class);
    $stmt1->execute();
    $stmt1->bind_result($class);
    $stmt1->fetch();
    $stmt1->close();

    if (!$class) {
        echo "Error: Invalid class ID!";
        return;
    }

    // Check if roll number already exists
    $checkStmt = $this->config->prepare("SELECT RollNo FROM student WHERE RollNo = ?");
    $checkStmt->bind_param('i', $rollNo);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "Error: Roll number already exists!";
        $checkStmt->close();
        return;
    }
    $checkStmt->close();

    // Insert new student
    $stmt = $this->config->prepare("INSERT INTO student (FirstName, LastName, RollNo, PhoneNum, class_id, email, password) 
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
        $query1 = "SELECT c.id FROM class c WHERE c.class = ?";
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
    
        $query2 = "SELECT s.id FROM subjects s WHERE s.SubjectName = ?";
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
            $stmt = $this->config->prepare("INSERT INTO teachers (FirstName, LastName, PhoneNum, class_id, subject_id, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssiiss', $fName, $lName, $phone, $class_id, $subject_id, $email, $password);
            $stmt->execute();
            $stmt->close();
            // echo "Teacher form submitted successfully.";
            header('Location: ../index.php');
        } else {
            echo "Class or Subject not found.";
        }
    }
    
    public function insert_student_data($math, $science, $english, $nepali, $social, $health)
    {
        $rollNos = array_keys($social);

        foreach ($rollNos as $values) {
            $stmt = $this->config->prepare("SELECT id FROM student WHERE RollNo = ?");
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

}







