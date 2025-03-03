<?php
// session_start();

use Grade_analyzer\Controller\UserAuthentication;
use Grade_analyzer\Config\Config; 
require_once '../Config/Config.php';
require_once './UserAuthenticate.php';

$_SESSION['user'] = '';
$username = $_POST['username'];
$password = $_POST['password'];
$role =  $_POST['role'];

$config = new Config();
$userAuth = new UserAuthentication($config);

if ($_POST['role'] === 'Principal'){
    $userAuth->authenticate_principal($username, $password, $role);

    // $_SESSION['user'] = 'principal';
}

