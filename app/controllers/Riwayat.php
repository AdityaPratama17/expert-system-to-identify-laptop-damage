<?php 

class Riwayat extends Controller{
	public function index(){
		$data['judul']='Riwayat';
		$data['riwayat']= $this->model('Riwayat_model')->getRiwayatById($_SESSION['id']);

		// echo '<pre>'; print_r($data['Aturan']); echo '</pre>';
        // exit();

		$this->view('templates/header', $data);
		$this->view('riwayat/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id){
		$data['judul']='Detail Riwayat';
		$data['detail']= $this->model('Riwayat_model')->getRiwayatGejalaById($id);
		$data['nama']= $_SESSION['nama'];
		// echo '<pre>'; print_r($data['detail']['id_gejala']); echo '</pre>';
		// echo $data['detail'][0]['jenis_kerusakan'];
		// exit();

		$this->view('templates/header', $data);
		$this->view('riwayat/detail', $data);
		$this->view('templates/footer');
	}

	public function hapus($id){
		//PENGAHPUSAN RIWAYAT PADA RIWAYAT GEJALA
		$this->model('Riwayat_model')->hapusIdRiwayatDiRiwayatGejala($id);
		
		if ($this->model('Riwayat_model')->hapusRiwayat($id) > 0) {			
			Flasher::setFlash('Riwayat','berhasil','dihapus','success');
			header('Location:'.BASEURL.'/riwayat');
			exit;
		}else {
			Flasher::setFlash('Riwayat','gagal','dihapus','danger');
			header('Location:'.BASEURL.'/riwayat');
			exit;
		}
	}
	
}
