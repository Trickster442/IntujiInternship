<?php
class App
{
    private $controller = 'Home';
    private $method = 'index';

    // separate URL by '/'
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        return explode("/", $URL);
    }

    // search controller and direct there
    public function loadController()
    {
        $URL = $this->splitURL();

        // find the controller from the controllers
        $filename = "../app/Controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
        } else {
            $filename = "../app/Controllers/_404.php";
            require $filename;
            $this->controller = '_404';
        }

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);

    }
}

