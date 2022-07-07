<?php 

class Kerusakan extends Controller{
	public function index(){
		$data['judul']='Kerusakan';
		$data['kerusakan']= $this->model('Diagnosis_model')->getKerusakan();


		$this->view('templates/header', $data);
		$this->view('kerusakan/index', $data);
		$this->view('templates/footer');
	}

	public function tambahKerusakan(){
		// TAMBAH DATA
		if ($this->model('Kerusakan_model')->tambahKerusakan($_POST) > 0) {
			Flasher::setFlash('Jenis Kerusakan','berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'/kerusakan');
			exit;
		}else {
			Flasher::setFlash('Jenis Kerusakan','gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'/kerusakan');
			exit;
		}
	}

	public function getUbahKerusakan(){
		echo json_encode($this->model('Kerusakan_model')->getKerusakanById($_POST['id']));
	}

	public function ubahKerusakan(){
		if ($this->model('Kerusakan_model')->ubahDataKerusakan($_POST) > 0) {
			Flasher::setFlash('Kerusakan','berhasil','diubah','success');
			header('Location:'.BASEURL.'/kerusakan');
			exit;
		}else {
			Flasher::setFlash('Kerusakan','gagal','diubah','danger');
			header('Location:'.BASEURL.'/kerusakan');
			exit;
		}
	}

	public function hapus($id){
		//PENGAHPUSAN RIWAYAT PADA RIWAYAT GEJALA
		$this->model('Kerusakan_model')->hapusIdRiwayatDiRiwayatGejala($id);

		//PENGAHPUSAN KERUSAKAN PADA RIWAYAT
		$this->model('Kerusakan_model')->hapusKerusakanDiRiwayat($id);
			
		//PENGAHPUSAN KERUSAKAN PADA RULES
		$this->model('Kerusakan_model')->hapusKerusakanDiRules($id);
		
		if ($this->model('Kerusakan_model')->hapusKerusakan($id) > 0) {			
			Flasher::setFlash('Kerusakan','berhasil','dihapus','success');
			header('Location:'.BASEURL.'/kerusakan');
			exit;
		}else {
			Flasher::setFlash('Kerusakan','gagal','dihapus','danger');
			header('Location:'.BASEURL.'/kerusakan');
			exit;
		}
	}
}
