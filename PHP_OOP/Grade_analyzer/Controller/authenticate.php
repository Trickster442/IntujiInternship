<?php
session_start();

$_SESSION['user'] = '';

use Grade_analyzer\Controller\UserAuthentication;
use Grade_analyzer\Config\Config;

require_once __DIR__ . '/../Config/Config.php';
require_once __DIR__ . '/UserAuthenticate.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = isset($_POST['role']) ? $_POST['role'] : 'None';

    $config = new Config();
    $userAuth = new UserAuthentication($config);

    if ($role === 'None') {
        $userAuth->authenticateStudent($username, $password);

    }

    if ($role === 'Principal') {
        $userAuth->authenticatePrincipal($username, $password, $role);
    }

    if ($role === 'ClassTeacher') {
        $userAuth->authenticateClassTeacher($username, $password, $role);
    }

    echo "Not found";
}
