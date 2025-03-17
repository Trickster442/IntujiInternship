<?php
class Home extends Controller
{
    use Model;
    public function index($a = '', $b = '', $c = '')
    {
        //$model = new Model;
        // $arr['name'] = 'abc';
        // $result = $model->where($arr);
        // show($result);

        // $arr['id'] = 2;
        // $arr['name'] = 'def';
        // $arr['age'] = 25;
        // $model->insert($arr);

        // //$model->delete(2);

        // $arr['name'] = "Sandip";
        // $arr['age'] = 21;
        // $model->update(1, $arr);

        // $user = new User;
        // $arr['name'] = 'Subrace';
        // $arr['age'] = 24;

        // $user->insert($arr);

        //show($a);
        //show($b);
        //show($c);

        // show('This is index');

        $this->view('home');
    }

    // public function edit($a = '', $b = '', $c = '')
    // {
    //     show("This is edit");
    //     $this->view('home');
    // }

    // public function delete($a = '', $b = '', $c = '')
    // {
    //     show("This is delete");
    //     $this->view('home');
    // }

    // public function insert($a = '', $b = '', $c = '')
    // {
    //     show("This is insert");
    //     $this->view('home');
    // }

}