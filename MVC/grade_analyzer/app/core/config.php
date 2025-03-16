<?php

// if you are in localhost use http and create constant 
// else with your domain

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('ROOT', 'http://localhost/mvc/public');
} else {
    define('ROOT', 'https://www.yourwebsite.com');
}
