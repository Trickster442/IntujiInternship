<?php

require_once '../app/core/init.php';

// display error if appeared
DEBUG ? ini_set('display_error', 1) : ini_set('display_error', 0);


$app = new App;
$app->loadController();