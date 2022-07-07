<?php 

class Gejala extends Controller{
	public function index(){
		$data['judul']='Gejala';
		$data['gejala']= $this->model('Diagnosis_model')->getAllGejala();
		$data['bobot'] = $this->model('Diagnosis_model')->getAllBobot();

		$this->view('templates/header', $data);
		$this->view('gejala/index', $data);
		$this->view('templates/footer');
	}

	public function tambahGejala(){
		// GET ID TERAKHIR
		$id=$this->model('Gejala_model')->getLastIdhGejala();
		$id['id'] = ($id['id']+1);

		// TAMBAH DATA
		if ($this->model('Gejala_model')->tambahGejala($id['id'],$_POST) > 0) {
			Flasher::setFlash('Gejala','berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'/gejala');
			exit;
		}else {
			Flasher::setFlash('Gejala','gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'/gejala');
			exit;
		}
	}

	public function getUbahGejala(){
		echo json_encode($this->model('Gejala_model')->getGejalaById($_POST['id']));
	}

	public function ubahGejala(){
		if ($this->model('Gejala_model')->ubahDataGejala($_POST) > 0) {
			Flasher::setFlash('Gejala','berhasil','diubah','success');
			header('Location:'.BASEURL.'/gejala');
			exit;
		}else {
			Flasher::setFlash('Gejala','gagal','diubah','danger');
			header('Location:'.BASEURL.'/gejala');
			exit;
		}
	}

	public function hapus($id){
		//PENGAHPUSAN GEJALA PADA RIWAYAT GEJALA
		$this->model('Gejala_model')->hapusGejalaDiRiwayatGejala($id);
			
		//PENGAHPUSAN GEJALA PADA RULES
		$this->model('Gejala_model')->hapusGejalaDiRules($id);
		
		if ($this->model('Gejala_model')->hapusGejala($id) > 0) {			
			// UPDATE ID SETELAH DATA YG DIHAPUS 
			$this->model('Gejala_model')->UpdateIdGejala($id);

			Flasher::setFlash('Gejala','berhasil','dihapus','success');
			header('Location:'.BASEURL.'/gejala');
			exit;
		}else {
			Flasher::setFlash('Gejala','gagal','dihapus','danger');
			header('Location:'.BASEURL.'/gejala');
			exit;
		}
	}
}
