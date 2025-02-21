<?php declare(strict_types= 1);

namespace Controller;
use Config\Config;

   
class FormHandling
{
    private $config;

    public function __construct(Config $conn){
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
            $student_scores[$names[$i]] = ['science' => (float) $sciences_marks[$i], 'math' => (float) $math_marks[$i], 'english' => (float) $english_marks[$i], 'computer' => (float) $computer_marks[$i], 'social' => (float) $social_marks[$i], 'percentage' => round($total_percentage,2)];  
        }

        return $student_scores;
    }


    public function register_student($fName, $lName, $rollNo, $phone, $class){
        $rollNo = (int) $rollNo;
        $class = (int) $class;
    
        // Check if RollNo already exists
        $checkStmt = $this->config->prepare("SELECT RollNo FROM studentInfo WHERE RollNo = ?");
        $checkStmt->bind_param('i', $rollNo);
        $checkStmt->execute();
        $checkStmt->store_result();
    
        if ($checkStmt->num_rows > 0) {
            echo "Error: Roll number already exists!";
            return;
        }
    
        // Insert new student if RollNo is not found
        $stmt = $this->config->prepare("INSERT INTO studentInfo (FirstName, LastName, RollNo, PhoneNum, Class) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('ssisi', $fName, $lName, $rollNo, $phone, $class);
        $stmt->execute();
        $stmt->close();
    }
    
    public function num_of_students_by_class($class): array {
        $stmt = "SELECT FirstName, LastName, RollNo FROM studentInfo WHERE Class = '$class'";
        $query = $this->config->query($stmt);
        $result = $query->fetch_all(MYSQLI_ASSOC); 
        
        return $result;
    } 
    
    public function insert_student_data($math, $science, $english, $nepali, $social, $health){
        $rollNos = array_keys($social);
        
        foreach ($rollNos as $values) {
            $stmt = $this->config->prepare("SELECT id FROM studentInfo WHERE RollNo = ?");
            $stmt->bind_param("i", $values); 
            $stmt->execute();
            $result = $stmt->get_result();
    
            $id_fetch = $result->fetch_assoc(); 
            
            if ($id_fetch) {
                $id = (int) $id_fetch['id'];  

                $stmt2 = $this->config->prepare("INSERT INTO subjectMarks (Math, Science, English, Nepali, Social, Health, student_id) 
                                                 VALUES (?, ?, ?, ?, ?, ?, ?)");
                
                if ($stmt2) {
                    $stmt2->bind_param("ddddddi", 
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
 






