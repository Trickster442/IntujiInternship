<?php
class App
{
    private $controller = 'Home';
    private $method = 'index';

    // separate URL by '/'
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        return explode("/", trim($URL, '/'));
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

            unset($URL[0]);
        } else {
            $filename = "../app/Controllers/_404.php";
            require $filename;
            $this->controller = '_404';
        }

        $controller = new $this->controller;

        // select method that exists
        if (!empty($URL[1])) {
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];

                // unset the controller and method part from URL
                unset($URL[1]);

            }
        }

        // send the remaining URL
        call_user_func_array([$controller, $this->method], $URL);

    }
}

