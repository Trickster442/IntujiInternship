<?php
session_start();
if($_SESSION['user'] !== 'Student'){
    header('Location:./Login.php');
    exit();
}
echo 'Student Home Page';