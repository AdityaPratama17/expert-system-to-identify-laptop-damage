<?php 

class Dashboard extends Controller{
	public function index(){
		if (isset($_SESSION['id'])) {

			$data['judul']='Dashboard';
			$data['gejala']= count($this->model('Diagnosis_model')->getAllGejala());
			$data['kerusakan']= count($this->model('Diagnosis_model')->getKerusakan());
			$data['rule']= count($this->model('Dashboard_model')->getAllRule());
			$data['riwayat']= count($this->model('Dashboard_model')->getAllRiwayat($_SESSION['id']));

			// exit();

			$this->view('templates/header', $data);
			$this->view('dashboard/index', $data);
			$this->view('templates/footer');
		} else {
			header('Location:'.BASEURL.'/login');
			exit;
		}

		
	}

	
}