<?php
session_start();

include '../../Controller/UserAuthenticate.php';

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'ClassTeacher') {
    header('Location: ../TeacherLogin.php');
    exit(); 
}