<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UserAbsenceModel;
use App\Models\EmployeModel;
use App\Models\DivisiModel;
use App\Models\DiscSubmissionModel;




class UserAbsence extends BaseController
{

    public function __construct()
    {
        helper('all');
        helper('cekAttend');
    }

    public function index()
    {

        $data = $this->do_absence();
        $data['title'] = 'Home | User Absence';
        echo view('/UserAbsence/index', $data);
    }

    public function do_absence()
    {

        $model = new UserAbsenceModel();

        $id = session()->get('nip');
        $date = date('Y-m-d');
        $hour = date('H:i:s');
        $cek_event = date_event(strtotime($date));
        $cek_overtime_sub = $model->get_overtime_sub($date, $id)->getRow();


        if ($this->request->getPost('submit') == "in") {

            $cek_absence = $model->cek_absence($id, $date)->getRow();

            if ($cek_event == 'Y') {
                if ($cek_absence == FALSE) {
                    if ($cek_overtime_sub == FALSE) {

                        $data = ['message' => 'Belum daftar lembur'];
                        return $this->respond($data, 500);
                    } else {
                        $data = array(
                            'nip'  => $id,
                            'date'  => $date,
                            'overtime_in'  => $hour,
                        );
                        $model->save_absent($data);

                        $data = ['message' => 'Absen masuk lembur berhasil'];
                        return $this->respond($data, 200);
                    }
                } else {

                    if ($cek_absence->overtime_in == TRUE) {

                        $data = ['message' => 'Anda sudah absen masuk lembur'];
                        return $this->respond($data, 500);
                    }
                }
            } else {


                if ($cek_absence == FALSE) {

                    $data = array(
                        'nip'  => $id,
                        'date'  => $date,
                        'check_in'  => $hour,
                    );
                    $model->save_absent($data);

                    $data = ['message' => 'Absen masuk berhasil'];
                    return $this->respond($data, 200);
                } else {

                    if ($cek_absence->check_in == TRUE && $cek_absence->check_out == FALSE) {

                        $data = ['message' => 'Anda sudah absen masuk'];
                        return $this->respond($data, 500);
                    } else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == FALSE) {
                        if ($cek_overtime_sub == FALSE) {

                            $data = ['message' => 'Anda belum daftar lembur'];
                            return $this->respond($data, 500);
                        } else {
                            $id = $cek_absence->id;
                            $data = array(
                                'overtime_in'  => $hour,
                            );
                            $model->update_absent($data, $id);

                            $data = ['message' => 'Absen masuk lembur berhasil'];
                            return $this->respond($data, 200);
                        }
                    } else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == TRUE) {

                        $data = ['message' => 'Anda sudah absen masuk lembur'];
                        return $this->respond($data, 500);
                    }
                }
            }
        } else if ($this->request->getPost('submit') == "out") {

            $cek_absence = $model->cek_absence($id, $date)->getRow();

            if ($cek_event == 'Y') {

                if ($cek_absence == FALSE) {

                    $data = ['message' => 'Anda belum absen masuk lembur'];
                    return $this->respond($data, 500);
                } else {

                    if ($cek_absence->overtime_in == TRUE && $cek_absence->overtime_out == FALSE) {

                        $id = $cek_absence->id;
                        $data = array(
                            'overtime_out'  => $hour,
                        );
                        $model->update_absent($data, $id);

                        $data = ['message' => 'Absen pulang berhasil'];
                        return $this->respond($data, 200);
                    } else if ($cek_absence->overtime_in == TRUE && $cek_absence->overtime_out == TRUE) {

                        $data = ['message' => 'Anda sudah absen pulang lembur'];
                        return $this->respond($data, 500);
                    }
                }
            } else {

                if ($cek_absence == FALSE) {

                    $data = ['message' => 'Anda belum absen masuk'];
                    return $this->respond($data, 500);
                } else {

                    if ($cek_absence->check_in == FALSE) {

                        $data = ['message' => 'Anda belum absen masuk'];
                        return $this->respond($data, 500);
                    } else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == FALSE && $cek_absence->overtime_in == FALSE && $cek_absence->overtime_out == FALSE) {

                        $time_out = $model->get_timeout()->getRow();

                        if ($time_out->start < date('H:i:s')) {
                            $id = $cek_absence->id;
                            $data = array(
                                'check_out'  => $hour,
                            );
                            $model->update_absent($data, $id);

                            $data = ['message' => 'Absen pulang berhasil'];
                            return $this->respond($data, 200);
                        } else {
                            $data = ['message' => 'Belum jam pulang'];
                            return $this->respond($data, 500);
                        }
                    } else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == FALSE && $cek_absence->overtime_out == FALSE) {

                        $data = ['message' => 'Anda sudah absen pulang'];
                        return $this->respond($data, 500);
                    } else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == TRUE && $cek_absence->overtime_out == FALSE) {

                        $id = $cek_absence->id;
                        $data = array(
                            'overtime_out'  => $hour,
                        );
                        $model->update_absent($data, $id);

                        $data = ['message' => 'Absen pulang lembur berhasil'];
                        return $this->respond($data, 200);
                    } else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == TRUE && $cek_absence->overtime_out == TRUE) {

                        $data = ['message' => 'Anda sudah absen pulang lembur'];
                        return $this->respond($data, 500);
                    }
                }
            }
        }
    }
}
