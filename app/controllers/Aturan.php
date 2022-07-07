<?php 

class Aturan extends Controller{
	public function index(){
		$data['judul']='Aturan';
		$data['aturan']= $this->model('Aturan_model')->getAllAturan();
		$data['kerusakan']= $this->model('Diagnosis_model')->getKerusakan();
		$data['gejala']= $this->model('Diagnosis_model')->getAllGejala();

		// echo '<pre>'; print_r($data['Aturan']); echo '</pre>';
        // exit();

		$this->view('templates/header', $data);
		$this->view('aturan/index', $data);
		$this->view('templates/footer');
	}

	public function tambahAturan(){
		// TAMBAH DATA
		if ($this->model('Aturan_model')->tambahAturan($_POST) > 0) {
			Flasher::setFlash('Aturan','berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'/aturan');
			exit;
		}else {
			Flasher::setFlash('Aturan','gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'/aturan');
			exit;
		}
	}

	public function getUbahAturan(){
		echo json_encode($this->model('Aturan_model')->getAturanById($_POST['id']));
	}
	
	public function ubahAturan(){
		if ($this->model('Aturan_model')->ubahDataAturan($_POST) > 0) {
			Flasher::setFlash('Aturan','berhasil','diubah','success');
			header('Location:'.BASEURL.'/aturan');
			exit;
		}else {
			Flasher::setFlash('Aturan','gagal','diubah','danger');
			header('Location:'.BASEURL.'/aturan');
			exit;
		}
	}

	public function hapus($id){		
		if ($this->model('Aturan_model')->hapusAturan($id) > 0) {			
			Flasher::setFlash('Aturan','berhasil','dihapus','success');
			header('Location:'.BASEURL.'/aturan');
			exit;
		}else {
			Flasher::setFlash('Aturan','gagal','dihapus','danger');
			header('Location:'.BASEURL.'/aturan');
			exit;
		}
	}
}
