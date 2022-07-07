<?php 

class Login extends Controller{
	public function index(){
		$this->view('login/index');
	}

    public function cekLogin(){
		$data=$this->model('Login_model')->getUser($_POST);
		$data['gejala'] = $this->model('Diagnosis_model')->getAllGejala();

		if (count($data) > 0) {
			$_SESSION['id']=$data[0]['id_user'];
			$_SESSION['nama']=$data[0]['nama_user'];
			$_SESSION['role']=$data[0]['role'];
			$_SESSION['bobot'] = array_fill(1,count($data['gejala'])+1,1);
			header('Location:'.BASEURL.'/dasboard');
			exit;
		}else {
			header('Location:'.BASEURL.'/login');
			exit;
		}
    }

    public function regis(){
		$this->view('login/regis');
	}

	public function registrasi(){
		if ($this->model('Login_model')->createUser($_POST) > 0) {
			header('Location:'.BASEURL.'/login');
			exit;
		}else {
			header('Location:'.BASEURL.'/login/regis');
			exit;
		}
    }

	public function logout(){
		unset($_SESSION['uname']);
		header('Location:'.BASEURL.'/login');
		exit;
	}
}
