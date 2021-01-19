<?php

namespace App\Controllers;

use App\Models\EmployeModel;
use App\Models\DivisiModel;
use App\Models\PositionModel;


class Pages extends BaseController
{
    public function index()
    {
        $model = new EmployeModel();
        $model2= new DivisiModel();
        $model3= new PositionModel();

        $totalEmploye= $model->getDataCount();
        $totalDivisi= $model2->getData();
        $totalPosition= $model3->getData();


        $data['employe']= count($totalEmploye);
        $data['divisi']= count($totalDivisi);
        $data['position']= count($totalPosition);
        $data['title']= 'Dashboard';
        return view('pages/home', $data);
        $session = session();
        echo "Welcome back, " . $session->get('nip');
    }

    public function about()
    {
        $data = [
            'title' => 'Home | About Us',
        ];
        return view('pages/about', $data);
    }

    //--------------------------------------------------------------------

} 
