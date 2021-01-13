<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\TimeModel;

 
class Time extends Controller
{

    public function __construct(){
        helper('all');
    }

    public function index()
    {   
        $model= new TimeModel();

        $data['timeIn']= $model->getIn();
        $data['timeOut']= $model->getOut();
        $data['title']= 'Home | Master Time';
        echo view('/time/index',$data);
    }

    public function update()
    {
        $model = new TimeModel();
        $id = $this->request->getPost('id');
        $getHour= $this->request->getPost('hour');
        $getMin= $this->request->getPost('minute');
        $time= $getHour.":".$getMin.":59";
        $data = array(
            'start'  => $time,
        );
        $model->updateTime($data, $id);
        return redirect()->to('/time');
    }
    
}
 
