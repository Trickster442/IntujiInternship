<?php
use Grade_analyzer\Config\Config;
use Grade_analyzer\Controller\FormHandling; 
require_once '../Config/Config.php';
require_once './FormHandling.php';

$config = new Config();
$formHand = new FormHandling($config);

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$phone = $_POST['phone'];
$class = $_POST['class'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$password = $_POST['password'];


$formHand->registerTeacher($firstName, $lastName, $phone, $class, $subject, $email, $password);



