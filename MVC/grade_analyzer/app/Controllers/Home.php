<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model;
        // $arr['name'] = 'abc';
        // $result = $model->where($arr);
        // show($result);

        // $arr['id'] = 2;
        // $arr['name'] = 'def';
        // $arr['age'] = 25;
        // $model->insert($arr);

        //$model->delete(2);

        $arr['name'] = "Sandip";
        $arr['age'] = 21;
        $model->update(1, $arr);
        $this->view('home');
    }
}