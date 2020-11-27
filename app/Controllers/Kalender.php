<?php

namespace App\Controllers;

use \App\Models\KalenderModel;
use DateTime;

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

    public function get_events()
    {
        // Our Start and End Dates
        $start = $this->request->getVar("start");
        $end = $this->request->getVar("end");

        $startdt = new DateTime('now'); // setup a local datetime
        $startdt->setTimestamp($start); // Set the date based on timestamp
        $start_format = $startdt->format('Y-m-d H:i:s');

        $enddt = new DateTime('now'); // setup a local datetime
        $enddt->setTimestamp($end); // Set the date based on timestamp
        $end_format = $enddt->format('Y-m-d H:i:s');

        $events = $this->KalenderModel->get_events($start_format, $end_format);

        $data_events = array();

        foreach ($events->result() as $r) {

            $data_events[] = array(
                "id" => $r->ID,
                "agenda" => $r->title,
                "end" => $r->end,
                "start" => $r->start
            );
        }

        echo json_encode(array("events" => $data_events));
        exit();
    }

    // DATA LAMA

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
