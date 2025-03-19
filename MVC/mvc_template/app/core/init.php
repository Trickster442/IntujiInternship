<?php
// file that will load all the file

// search for class and require that class here
spl_autoload_register(function ($className) {
    require "../app/models/" . ucfirst($className) . ".php";
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';