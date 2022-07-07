<?php 

class Admin extends Controller{
	public function index(){
		$data['judul']='Admin';
		$data['admin']= $this->model('Admin_model')->getAdmin();

		$this->view('templates/header', $data);
		$this->view('admin/index', $data);
		$this->view('templates/footer');
	}

	public function tambahAdmin(){
		// TAMBAH DATA
		if ($this->model('Admin_model')->tambahAdmin($_POST) > 0) {
			Flasher::setFlash('Admin','berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'/admin');
			exit;
		}else {
			Flasher::setFlash('Admin','gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'/admin');
			exit;
		}
	}

    public function hapus($id){
		// TAMBAH DATA
		if ($this->model('Admin_model')->hapusAdmin($id) > 0) {
			Flasher::setFlash('Admin','berhasil','dihapus','success');
			header('Location:'.BASEURL.'/admin');
			exit;
		}else {
			Flasher::setFlash('Admin','gagal','dihapus','danger');
			header('Location:'.BASEURL.'/admin');
			exit;
		}
	}

	// public function getUbahAturan(){
	// 	echo json_encode($this->model('Aturan_model')->getAturanById($_POST['id']));
	// }
	
	// public function ubahAturan(){
	// 	if ($this->model('Aturan_model')->ubahDataAturan($_POST) > 0) {
	// 		Flasher::setFlash('Aturan','berhasil','diubah','success');
	// 		header('Location:'.BASEURL.'/aturan');
	// 		exit;
	// 	}else {
	// 		Flasher::setFlash('Aturan','gagal','diubah','danger');
	// 		header('Location:'.BASEURL.'/aturan');
	// 		exit;
	// 	}
	// }

	// public function hapus($id){		
	// 	if ($this->model('Aturan_model')->hapusAturan($id) > 0) {			
	// 		Flasher::setFlash('Aturan','berhasil','dihapus','success');
	// 		header('Location:'.BASEURL.'/aturan');
	// 		exit;
	// 	}else {
	// 		Flasher::setFlash('Aturan','gagal','dihapus','danger');
	// 		header('Location:'.BASEURL.'/aturan');
	// 		exit;
	// 	}
	// }
}
