<?php

namespace App\Controllers;

use \App\Models\KalenderModel;

class Kalender extends BaseController
{

    protected $KalenderModel;
    public function __construct()
    {
        $this->KalenderModel = new KalenderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home | Kalender',
        ];
        return view('/kalender/index', $data);
    }

    // public function get_event()
    // {
    //     $db = \Config\Database::connect();
    //     if (isset($_POST['id'])) {
    //         $row = $db->query("SELECT* FROM calendar where id=?", [$_POST['id']]);
    //         $data = [
    //             'id'        => $row->id,
    //             'title'     => $row->title,
    //             'start'     => date('d-m-Y H:i:s', strtotime($row->start_event)),
    //             'end'       => date('d-m-Y H:i:s', strtotime($row->end_event)),
    //         ];

    //         echo json_encode($data);
    //     }
    // }

    public function load()
    {
        $db = \Config\Database::connect();
        $data = [];

        $query = $db->query("SELECT * FROM calendar ORDER BY id DESC");
        $results = $query->getResult();
        foreach ($results as $row) {
            $data[] = [
                'id'                => $row->id,
                'title'             => $row->agenda,
                'color'             => $row->color,
                'start'             => $row->start,
                'end'               => $row->end,
            ];
        }

        echo json_encode($data);
        exit;
    }

    // DATA LAMA

    function save()
    {
        // dd($this->request->getVar());
        $this->KalenderModel->save([
            'agenda'            => $this->request->getVar('title'),
            'color'             => $this->request->getVar('color'),
            'start'             => $this->request->getVar('start'),
            'end'               => $this->request->getVar('end'),
        ]);
    }


    function update($id)
    {
        $this->KalenderModel->save([
            'id' => $id,
            'agenda' => $this->request->getVar('title'),
            'color'  => $this->request->getVar('color'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
        ]);
    }

    //--------------------------------------------------------------------

}
