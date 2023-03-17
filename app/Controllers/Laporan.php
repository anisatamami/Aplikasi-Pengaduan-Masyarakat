<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
	public function index()
	{
		return view('/petugas/laporan');
	}
	
	public function pengaduanTampil(){
			$this->tanggapan->join('pengaduan','pengaduan.id_pengaduan=tanggapan.id_pengaduan');
			$this->tanggapan->join('masyarakat','masyarakat.nik=pengaduan.nik');
			$this->tanggapan->join('petugas','petugas.id_petugas=tanggapan.id_petugas');
			$data['listPengaduan'] = 
			$this-> tanggapan ->where('tanggapan.tgl_tanggapan',$this->request->getPost('txtTglPengaduan'))->findAll();
		$arrBulan=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
		
		$htmlData=null;
		$no=null;
		$htmlData .='<p>Berikut adalah laporan Pengaduan yang sudah selesai tanggal '.$this->request->getPost('txtTglPengaduan').' :</p>';

		$htmlData .='<table class="table table-sm">';
		$htmlData .='<thead class="bg-light">
						<tr>
						<th>No</th>
						<th>Nik</th>
						<th>Nama</th>
						<th>Petugas</th>
						<th>Tanggal Masuk</th>
						<th>Tanggal Ditanggapi</th>
						<th>Status</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($data['listPengaduan'] as $row){
			$no++;
			$htmlData .='<tr>';
			$htmlData .='<td>'.$no.'</td>';
			$htmlData .='<td>'.$row['nik'].'</td>';
			$htmlData .='<td>'.$row['nama'].'</td>';
			$htmlData .='<td>'.$row['nama_petugas'].'</td>';
			$htmlData .='<td>'.$row['tgl_pengaduan'].'</td>';
			$htmlData .='<td>'.$row['tgl_tanggapan'].'</td>';
			$htmlData .='<td>'.$row['status'].'</td>';
			$htmlData .='</tr>';
		}
		$htmlData .='
					</tbody>
					</table>';

		$htmlData .='<p>
		<a class="btn btn-danger btn-sm" onclick="window.print()">Cetak</a>
		</p>';			
		echo $htmlData;	
	
	}	

	
	public function excel($tanggal)
	{
		$this->tanggapan->join('pengaduan','pengaduan.id_pengaduan=tanggapan.id_pengaduan');
		$this->tanggapan->join('masyarakat','masyarakat.nik=pengaduan.nik');
		$this->tanggapan->join('petugas','petugas.id_petugas=tanggapan.id_petugas');
			$listPengaduan = 
			$this-> tanggapan ->where('tanggapan.tgl_tanggapan',$this->request->getPost('txtTglPengaduan'))->findAll();
		$arrBulan=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
		
		$Spreadsheet = new Spreadsheet();

		$Spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1','nik')
		->setCellValue('B1','nama')
		->setCellValue('C1','nama_petugas')
		->setCellValue('D1','tgl_pengaduan')
		->setCellValue('E1','tgl_tanggapan')
		->setCellValue('F1','status');

		$column = 2;

		foreach ($listPengaduan as $row){
			$Spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'. $column, $row['nik'])
			->setCellValue('B'. $column, $row['nama'])
			->setCellValue('C'. $column, $row['nama_petugas'])
			->setCellValue('D'. $column, $row['tgl_pengaduan'])
			->setCellValue('E'. $column, $row['tgl_tanggapan'])
			->setCellValue('F'. $column, $row['status']);

			$column++;
		}

		$writer = new Xlsx($Spreadsheet);
		$filename = 'Laporan-'.$tangal;

		header('Content-Type: application/vnd.openxml-ormats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename='. $filename. '.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');

	}
	


}

