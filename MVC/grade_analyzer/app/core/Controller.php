<?php

class Controller
{

    //load the view of model, name :: which file to load
    public function view($name)
    {
        $filename = "../app/views/" . $name . ".view.php";

        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
}