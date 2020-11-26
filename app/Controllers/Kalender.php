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

    function load()
    {
        $event_data = $this->KalenderModel->fetch_all_event();
        foreach ($event_data->get()->getResultArray() as $row) {
            $data[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'start' => $row['start_event'],
                'end' => $row['end_event']
            );
        }
        echo json_encode($data);
    }

    function save()
    {
        // dd($this->request->getVar());
        $this->KalenderModel->save([
            'agenda' => $this->request->getVar('title'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
        ]);
    }

    function update($id)
    {
        $this->KalenderModel->save([
            'id' => $id,
            'agenda' => $this->request->getVar('title'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
        ]);
    }

    //--------------------------------------------------------------------

}
