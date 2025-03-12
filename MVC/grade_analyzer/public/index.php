<?php

// display url
function show($stuff)
{
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}

// separate URL by '/'
function splitURL()
{
    $URL = $_GET['url'] ?? 'home';
    return explode("/", $URL);
}

// search controller and direct there
function loadController()
{
    $URL = splitURL();

    // find the controller from the controllers
    $filename = __DIR__ . "/../app/Controllers/" . ucfirst($URL[0]) . ".php";

    if (file_exists($filename)) {
        require_once $filename;
    } else {
        echo "Controller not found";
    }
}

loadController();