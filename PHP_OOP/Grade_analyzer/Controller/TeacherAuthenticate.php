<?php
session_start();
$_SESSION['user'] = '';

use Grade_analyzer\Controller\UserAuthentication;
use Grade_analyzer\Config\Config;

require_once __DIR__ . '/../Config/Config.php';
require_once __DIR__ . '/UserAuthenticate.php';

if (isset($_POST['username'], $_POST['password'], $_POST['role'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $config = new Config();
    $userAuth = new UserAuthentication($config);
    if ($role === 'Principal') {
        $userAuth->authenticate_principal($username, $password, $role);
    }

    
}
