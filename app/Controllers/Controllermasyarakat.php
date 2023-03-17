<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UploadModel;

class Controllermasyarakat extends BaseController
{
	protected $model_upload;

    public function __construct() {

        // Memanggil form helper
        helper('form');
        // Menyiapkan variabel untuk menampung upload model
        $this->model_upload = new UploadModel();
    }
	public function index(){
		return view ('login');
	}
	public function register(){
		return view ('register');
	}
	public function login(){
		helper(['form']);
		$aturan=['txtUsername'=>'required', 'txtPassword'=>'required'];
		if($this->validate($aturan)){
			$syarat = [ 'username'=> $this->request->getPost('txtUsername'),'password'=> md5($this->request->getPost('txtPassword'))];    
			$Userpetugas = $this->petugas->where($syarat) ->find();
		$Usermasyarakat = $this->masyarakat->where($syarat) ->find();
			
			if(count($Userpetugas)==1){
			   $session_data=[
			'id_petugas'=> $Userpetugas[0]['id_petugas'],
			'username' => $Userpetugas[0]['username'],
			   'level'    => $Userpetugas[0]['level'], 'sudahkahLogin' => TRUE];
			   session()->set($session_data);
			   return redirect()->to('/dashboard');
			}elseif(count($Usermasyarakat)==1) {
				$session_data=[
					'nik'=> $Usermasyarakat[0]['nik'],
					'username' => $Usermasyarakat[0]['username'],
					   'nama'    => $Usermasyarakat[0]['nama'], 'sudahkahLogin' => TRUE];
					   session()->set($session_data);
					   return redirect()->to('/masyarakat/dashboard');
				}else {
				session()->setFlashdata('msg', 'Username & Password Salah');
				return redirect()->to('/login/masy');
			}
			session()->setFlashdata('msg','Username & Password Salah');
			return redirect()->to('/login/masy');
		}}
	public function logout(){
		session()->destroy();
   	 return redirect()->to('/login/masy');
	}

	public function daftar()
	{
		if($this->request->getPost('txtNik')){
			$data=['nik'=>$this->request->getPost('txtNik'),
					'nama'=>$this->request->getPost('txtNama'),
					'username'=>$this->request->getPost('txtUsername'),
					'password'=>md5($this->request->getPost('txtPassword')),
					'telp'=>$this->request->getPost('txtTelp')
				];
		} else {
			$data=['nama'=>$this->request->getPost('txtNama')];
		}
		$this-> masyarakat-> insert($data);
		session()->setFlashdata('msg','Registrasi Berhasil, Silahkan Login.!');
		return redirect()->to('/login/masy');
	}
	public function pengaduan()
	{
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/');
			exit;
			}
		if (!$this->validate([]))
        {
			$n = session()->get('nama');
            $data['validation'] = $this->validator;
            $data['uploads'] = $this->model_upload->get_uploads();
			$data['uploads1'] = $this->model_upload->get_uploads();	

			$this->pengaduan->join('masyarakat','masyarakat.nik=pengaduan.nik');
			$this->pengaduan->join('tanggapan','tanggapan.id_pengaduan=pengaduan.id_pengaduan');
			$data['listPengaduan'] = $this->pengaduan-> where('nama', $n)->findAll();
            echo view('Masyarakat/v_pengaduan', $data);
        }
	}
	public function process()
    {

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('upload'));
        }

        $validated = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]',
		]);
 
        if ($validated == FALSE) {
            
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->index();

        } else {
			

            $avatar = $this->request->getFile('file_upload');
            $avatar->move(ROOTPATH . 'public/uploads');

			$avatar1 = $this->request->getFile('file_upload1');
            $avatar1->move(ROOTPATH . 'public/uploads1');

            $data = [
				'nik' => session()->get('nik'),
                'foto' => $avatar->getName('file_upload'),
				'foto1' => $avatar1->getName(),
                'isi_laporan'=>$this->request->getPost('txtInputPengaduan'),
                'tgl_pengaduan'=>$this->request->getPost('tanggal')
            ];
    
            $this->model_upload->insert_gambar($data);
            return redirect()->to(base_url('/masyarakat/pengaduan'))->with('success', 'Upload successfully'); 
        }

    }
	
	public function tampilrespon($idtanggapan){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/');
			exit;
			}
			$this->tanggapan->join('pengaduan','pengaduan.id_pengaduan=tanggapan.id_pengaduan');
			$this->tanggapan->join('masyarakat','masyarakat.nik=pengaduan.nik');
			$this->tanggapan->join('petugas','petugas.id_petugas=tanggapan.id_petugas');
			$data['detail'] = $this-> tanggapan -> where('id_tanggapan',$idtanggapan)->findAll();
			return view('Masyarakat/tampilrespon', $data);
	}
}