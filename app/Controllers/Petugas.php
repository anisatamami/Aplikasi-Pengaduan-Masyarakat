<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
	public function index(){
	}
	public function tampilUser(){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
			}
			$data['ListPetugas'] = $this->petugas->findAll();
			return view('Petugas/tampil-petugas', $data);}

	public function tambahPetugas(){
		if(!session()->get('sudahkahLogin')){
		return redirect()->to('/petugas');
		exit;
		}
		return view('Petugas/tambah-petugas');
		}

	public function simpanPetugas(){
			if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
			}
			helper(['form']);
			$datanya=[
			'nama_petugas'=>$this->request->getPost('txtInputNama'),
			'username'=>$this->request->getPost('txtInputUser'),
			'password'=>md5($this->request->getPost('txtInputPassword')),
			'telp_petugas'=>$this->request->getPost('txtInputTlp'),
			'level'=>$this->request->getPost('selectLevel')];

			$petugas = $this->petugas->where('nama_petugas', $datanya['nama_petugas'])->findAll();
			if(count($petugas)==1){
				return redirect()->to('/petugas/user')->with('pesan-error', '<div class="alert alert-danger" role="alert">Data Petugas sudah ada</div>');
			}else{
			$this->petugas->insert($datanya);
			return redirect()->to('/petugas/user');
			}
		}
	public function editPetugas($idPetugas){
				if(!session()->get('sudahkahLogin')){
				return redirect()->to('/petugas');
				exit;
				}
				$data['detailPetugas']=$this->petugas->where('id_petugas',$idPetugas)->findAll();
				return view('Petugas/edit-petugas',$data);
				}
	public function updatePetugas(){
					// cek apakah sudah login
					if(!session()->get('sudahkahLogin')){
						return redirect()->to('/petugas');
						exit;
					}
					// cek apakah yang login bukan admin ?
					if(session()->get('level')!='admin'){
						return redirect()->to('/petugas/dashboard');
						exit;   	 
					}
					if($this->request->getPost('txtInputPassword')){
						$data=['nama_petugas'=>$this->request->getPost('txtInputNama'),
						'telp_petugas'=>$this->request->getPost('txtInputTelp'),
						'password'=>md5($this->request->getPost('txtInputPassword')),
						'level'=>$this->request->getPost('selectLevel')];
					} else {
						$data=['nama_petugas'=>$this->request->getPost('txtInputNama'),
						'level'=>$this->request->getPost('selectLevel')];
					}
					$this->petugas->update($this->request->getPost('txtInputUser'),$data);
					return redirect()->to('/petugas/user');
			}
	public function hapusPetugas($idPetugas){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}
		$this->petugas->where('id_petugas',$idPetugas)->delete();
		return redirect()->to('/petugas/user');
	}

	public function tampilMasyarakat(){
		if(!session()->get('sudahkahLogin')){
		return redirect()->to('/');
		exit;
		}
		$data['ListMasyarakat'] = $this-> masyarakat-> findAll();
		return view ('petugas/tampil-masyarakat', $data);}

	public function tambahMasyarakat(){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
			}
			return view('Petugas/tambah-masyarakat');
			}
	

	public function simpanMasyarakat(){
		if(!session()->get('sudahkahLogin')){
		return redirect()->to('/petugas');
		exit;
		}
		helper(['form']);
		$datanya=[
		'nik'=>$this->request->getPost('txtInputNik'),
		'nama'=>$this->request->getPost('txtInputNama'),
		'telp'=>$this->request->getPost('txtInputTlp'),
		'username'=>$this->request->getPost('txtInputUser'),
		'password'=>md5($this->request->getPost('txtInputPassword'))
		];
		$this-> masyarakat-> insert($datanya);
		return redirect()->to('/petugas/masyarakat');}
	public function editMasyarakat($NIK){
		if(!session()->get('sudahkahLogin')){
		return redirect()->to('/petugas');
		exit;
		}
		$data['detail']=$this-> masyarakat-> where('nik',$NIK)->findAll();
		return view('Petugas/edit-masyarakat',$data);}

	public function updateMasyarakat(){
		// cek apakah sudah login
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}
		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;   	 
		}
		if($this->request->getPost('txtInputNik')){
			$data=[
				'nama'=>$this->request->getPost('txtInputNama'),
				'telp'=>$this->request->getPost('txtInputTelp'),
				'username'=>$this->request->getPost('txtInputUser'),
				'password'=>$this->request->getPost('txtInputPassword')];
		} else {
			$data=['nama'=>$this->request->getPost('txtInputNama')];
		}
		$this-> masyarakat-> update($this->request->getPost('txtInputNik'),$data);
		return redirect()->to('/petugas/masyarakat');}

	public function hapusMasyarakat($NIK){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}
		$this-> masyarakat-> where('nik',$NIK)->delete();
		return redirect()->to('/petugas/masyarakat');}

	public function verifikasi(){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
			}
			$this->pengaduan->join('masyarakat','masyarakat.nik=pengaduan.nik');
			$data['ListPengaduan'] = $this-> pengaduan ->findAll();
			return view('Petugas/tampil-pengaduan', $data);}
	public function tanggapan($idpengaduan){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
			}
			$this->pengaduan->join('masyarakat','masyarakat.nik=pengaduan.nik');
			$data['detail']=$this-> pengaduan ->where('id_pengaduan',$idpengaduan)->findAll();
			return view('Petugas/verifikasi',$data);}
	public function simpantanggapan(){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
			}
			if($this->request->getPost('txtId')){
				$data=['status'=>$this->request->getPost('selectStatus')];
			} else {
				$data=['status'=>$this->request->getPost('selectStatus')];
			}
			$this-> pengaduan-> update($this->request->getPost('txtId'),$data);
			
			if($this->request->getPost('tanggapan')){
			helper(['form']);
			$datanya=[
				'id_petugas' =>session()->get('id_petugas'),
				'id_pengaduan'=>$this->request->getPost('txtId'),
				'isi_tanggapan'=>$this->request->getPost('tanggapan'),
				'tgl_tanggapan'=>$this->request->getPost('tanggal')];
				$this-> tanggapan-> insert($datanya);
			}
			return redirect()->to('/verifikasi');
	}
	public function respon(){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
			}
			$this->tanggapan->join('pengaduan','pengaduan.id_pengaduan=tanggapan.id_pengaduan');
			$this->tanggapan->join('masyarakat','masyarakat.nik=pengaduan.nik');
			$this->tanggapan->join('petugas','petugas.id_petugas=tanggapan.id_petugas');
			$data['ListTanggapan'] = $this-> tanggapan ->findAll();
			return view('Petugas/tampil-respon', $data);}

	public function tampilrespon($idtanggapan){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
			}
			$this->tanggapan->join('pengaduan','pengaduan.id_pengaduan=tanggapan.id_pengaduan');
			$this->tanggapan->join('masyarakat','masyarakat.nik=pengaduan.nik');
			$this->tanggapan->join('petugas','petugas.id_petugas=tanggapan.id_petugas');
			$data['detail'] = $this-> tanggapan -> where('id_tanggapan',$idtanggapan)->findAll();
			return view('Petugas/detail-respon', $data);
		}


}