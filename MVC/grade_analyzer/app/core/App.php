<?php
class App
{

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
        } else {
            $filename = "../app/Controllers/_404.php";
            require $filename;
        }
    }
}

