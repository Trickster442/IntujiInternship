<?php

// if you are in localhost use http and create constant 
// else with your domain

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    /**Database config **/
    define('DBNAME', 'grade_analyzer');
    define('DBHOST', 'mysql');
    define('DBUSER', 'admin');
    define('DBPASS', 'admin');
    define('PORT', 3306);

    define('ROOT', 'http://localhost:8090/public');
} else {
    /**Database config **/
    define('DBNAME', 'grade_analyzer');
    define('DBHOST', 'mysql');
    define('DBUSER', 'root');
    define('DBPASS', 'root');

    define('ROOT', 'https://www.yourwebsite.com');
}

// constant to show error when appeared
// false will not show error
define('DEBUG', true);