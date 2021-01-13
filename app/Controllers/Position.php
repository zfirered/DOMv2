<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\PositionModel;
 
class Position extends Controller
{
    public function index()
    {
        $model = new PositionModel();
        $this->request->getPost('submit')== "print" ?  $this->htmlToPDF() : '';

        $data['data'] = $model->getData();
        $data['title']= 'Home | Master Position';
        echo view('/position/index',$data);
    }

    function htmlToPDF(){

        $model = new PositionModel();
        $data['data'] = $model->getData();

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('/position/printAll',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    } 

    public function create()
    {
        $data['title']= 'Home | Master Position';
        echo view('/position/create',$data);
        
    }
 
    public function save()
    {
        $model = new PositionModel();
        $data = array(
            'position_name'  => $this->request->getPost('pos_nm'),
            'position_desc'  => $this->request->getPost('pos_desc'),
            'level'  => $this->request->getPost('level'),
        );
        $model->savePosition($data);
        return redirect()->to('/position');
    }

    public function edit($id)
    {
        $model = new PositionModel();
        $data['data'] = $model->getData($id)->getRow();
        $data['title']= 'Home | Master Position';
        echo view('/position/edit',$data);
    }

    public function update()
    {
        $model = new PositionModel();
        $id = $this->request->getPost('id');
        $data = array(
            'position_name'  => $this->request->getPost('pos_nm'),
            'position_desc'  => $this->request->getPost('pos_desc'),
            'level'  => $this->request->getPost('level'),
        );
        $model->updatePosition($data, $id);
        return redirect()->to('/position');
    }

    public function delete($id)
    {
        $model = new PositionModel();
        $model->deletePosition($id);
        return redirect()->to('/position');
    }
}
 
