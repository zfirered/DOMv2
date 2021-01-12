<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
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
