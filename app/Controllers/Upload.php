<?php namespace App\Controllers;

// Tambahkan Upload Model di sini
use App\Models\UploadModel;

class Upload extends BaseController
{

    protected $model_upload;
    protected $allowedFields;

    public function __construct() {

        // Memanggil form helper
        helper('form');
        // Menyiapkan variabel untuk menampung upload model
        $this->model_upload = new UploadModel();
    }

	public function index()
    {
        if (!$this->validate([]))
        {
            $data['validation'] = $this->validator;
            $data['uploads'] = $this->model_upload->get_uploads();
            $data['uploads1'] = $this->model_upload->get_uploads();
            echo view('Masyarakat/form_upload', $data);
        }
    }
 
    public function process()
    {

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('upload'));
        }

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('upload1'));
        }

        $validated = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]',
            'file_upload1' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]',
        ]);
 
        if ($validated == FALSE) {
            
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->index();

        } else {

            $avatar = $this->request->getFile('file_upload');
            $avatar->move(ROOTPATH . 'public/uploads');

            $avatar = $this->request->getFile('file_upload');
            $avatar->move(ROOTPATH . 'public/uploads1');

            $data = [
                'foto' => $avatar->getName(),
                'foto1' => $avatar1->getName(),
                'isi_laporan'=>$this->request->getPost('txtInputPengaduan'),
                'tgl_pengaduan'=>$this->request->getPost('tanggal')
            ];
    
            $this->model_upload->insert_gambar($data);
            return redirect()->to(base_url('/masyarakat/pengaduan'))->with('success', 'Upload successfully'); 
        }

    }

}
