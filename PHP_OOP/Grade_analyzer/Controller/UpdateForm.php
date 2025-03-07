<?php
namespace Grade_analyzer\Controller;
use Grade_analyzer\Config\Config;

require_once __DIR__ . '/../Config/Config.php';

class UpdateForm
{
    private $config;
    public function __construct(Config $conn){
        $this->config = $conn->getConnection();
    }

    public function updateTeacherForm($id, $firstName, $lastName, $phone, $role, $status, $classID, $subjectID, $email, $password) {
        $query = "UPDATE teachers 
                  SET first_name = ?, last_name = ?, phone_num = ?, role = ?, status = ?, class_id = ?, subject_id = ?, email = ?, password = ?
                  WHERE id = ?";    
        $stmt = $this->config->prepare($query);
        $stmt->execute([$firstName, $lastName, $phone, $role, $status, $classID, $subjectID, $email, $password, $id]);
    }

    public function updateClassForm($teacher_id, $class_id) {
        if ($teacher_id !== 'none') {
            $query = "UPDATE teachers 
                      SET role = 'ClassTeacher', class_id = ?
                      WHERE id = ? AND role = 'Teacher'";
            
            $stmt = $this->config->prepare($query);
            $stmt->execute([$class_id,  $teacher_id]);
        }
    
        if ($teacher_id === 'none') {
            $query = "UPDATE teachers 
                      SET role = 'Teacher'
                      WHERE class_id = ?  AND role = 'ClassTeacher'";
            
            $stmt = $this->config->prepare($query);
            $stmt->execute([ $class_id]);
        }
    }
    
}