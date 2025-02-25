<?php
namespace Grade_analyzer\Model;

require_once __DIR__ . '/ClassModel.php';
require_once __DIR__ . '/StudentModel.php';
require_once __DIR__ . '/SubjectModel.php';
require_once __DIR__ . '/MarksModel.php';
require_once __DIR__ . '/TeacherModel.php';

class MainModel
{
    private $studentDB, $marksDB, $classDB, $subjectDB, $teacherDB;

    public function __construct(){
        $this->classDB = new ClassModel();
        $this->subjectDB = new SubjectModel();
        $this->studentDB = new StudentModel();
        $this->marksDB = new MarksModel();
        $this->teacherDB = new TeacherModel();
    }

    public function main(): array{
        return [
            $this->classDB->createDatabase(), 
            $this->studentDB->createDatabase(), 
            $this->subjectDB->createDatabase(),
            $this->marksDB->createDatabase(), 
            $this->teacherDB->createDatabase()
        ];
    }
}
