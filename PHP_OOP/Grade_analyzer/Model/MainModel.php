<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/UserModel.php';   
require_once __DIR__ . '/ClassModel.php';      
require_once __DIR__ . '/SubjectModel.php';         
require_once __DIR__ . '/MarksModel.php';      

class MainModel
{
    private $userDB, $marksDB, $classDB, $subjectDB;

    public function __construct(){
        $this->userDB = new UserModel();
        $this->marksDB = new MarksModel();
        $this->classDB = new ClassModel();
        $this->subjectDB = new SubjectModel();
    }

    public function main(): array{
        return [
            $this->userDB->createDatabase(), 
            $this->classDB->createDatabase(), 
            $this->subjectDB->createDatabase(),
            $this->marksDB->createDatabase(), 
        ];
    }
}
