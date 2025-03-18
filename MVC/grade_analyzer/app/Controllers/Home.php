<?php
class Home extends Controller
{
    use Model;
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('home');
    }


}