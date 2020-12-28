<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Time extends Controller
{
    public function index()
    {   
       

        $data['title']= 'Home | Master Time';
        echo view('/time/index',$data);
    }

    
}
 
