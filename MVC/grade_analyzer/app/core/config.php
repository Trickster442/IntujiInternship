<?php

// if you are in localhost use http and create constant 
// else with your domain

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    /**Database config **/
    define('DBNAME', 'grade_analyzer');
    define('DBHOST', 'mysql');
    define('DBUSER', 'root');
    define('DBPASS', 'root');
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
