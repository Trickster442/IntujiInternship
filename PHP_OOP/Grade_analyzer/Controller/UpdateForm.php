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
                  SET FirstName = ?, LastName = ?, PhoneNum = ?, role = ?, status = ?, class_id = ?, subject_id = ?, email = ?, password = ?
                  WHERE id = ?";
        $stmt = $this->config->prepare($query);
        $stmt->execute([$firstName, $lastName, $phone, $role, $status, $classID, $subjectID, $email, $password, $id]);
    }

    public function updateClassForm(){
        
    }
    

    

}