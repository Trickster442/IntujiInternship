<?php

namespace Grade_analyzer\Model;

require_once __DIR__ . '/ClassModel.php';
require_once __DIR__ . '/StudentModel.php';
require_once __DIR__ . '/SubjectModel.php';
require_once __DIR__ . '/TeacherModel.php';
require_once __DIR__ . '/MarksModel.php';

class MainModel
{
    private $studentDB, $marksDB, $classDB, $subjectDB, $teacherDB;

    public function __construct(){
        $this->classDB = new ClassModel();
        $this->studentDB = new StudentModel();
        $this->subjectDB = new SubjectModel();
        $this->teacherDB = new TeacherModel();
        $this->marksDB = new MarksModel();
    }

    public function main(): array{
        return [
            $this->classDB->createDatabase(), 
            $this->studentDB->createDatabase(), 
            $this->subjectDB->createDatabase(),
            $this->teacherDB->createDatabase(),
            $this->marksDB->createDatabase()
        ];
    }
}
