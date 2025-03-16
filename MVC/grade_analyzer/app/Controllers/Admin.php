<?php

class Admin extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        echo "This is the admin controller";
    }

}


// $admin = new Admin;

// // you can call function from class, 1st parameter which function from class
// // second param defines the parameter for that class
// // i can get user input to change what function to run 
// call_user_func_array([$admin, 'edit'], ['a' => 'a something', 'b' => 'b something']);
