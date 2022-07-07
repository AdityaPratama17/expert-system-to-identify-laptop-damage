<?php 

class Diagnosis extends Controller{
	public function index($page=1){
		$data['judul']='Diagnosis';
		$data['gejala'] = $this->model('Diagnosis_model')->getAllGejala();
		$data['bobot'] = $this->model('Diagnosis_model')->getAllBobot();
		$data['page'] = $page;

		// JIKA INPUTAN PAGE LEBIH DARI JUMLAH GEJALA
		$data['maxPage'] = (int)(count($data['gejala'])/10)+1;
		if ($page>$data['maxPage']) {
			header('Location:'.BASEURL.'/diagnosis/1');
			exit;
		}

		if (isset($_POST['bobot'])) {
			// PERBARUI BOBOT SESSION
			$bobot_post = $_POST['bobot'];
			foreach ($bobot_post as $i => $bobot) {
				$_SESSION['bobot'][$i] = $bobot;
			}

			// DIRECT PAGINATION
			if (isset($_POST['prev'])) {
				$newPage='/'.'diagnosis'.'/'.(string)$_POST['page']-1;
				header('Location:'.BASEURL.$newPage);
				exit;
			}elseif (isset($_POST['next'])) {
				$newPage='/'.'diagnosis'.'/'.(string)$_POST['page']+1;
				header('Location:'.BASEURL.$newPage);
				exit;
			}elseif (isset($_POST['tombolPage'])) {
				$newPage='/'.'diagnosis'.'/'.(string)$_POST['tombolPage'];
				header('Location:'.BASEURL.$newPage);
			}elseif (isset($_POST['hasilDiagnosis'])) {
				$newPage='/'.'diagnosis'.'/'.(string)$_POST['tombolPage'];
				header('Location:'.BASEURL.'/diagnosis/hasilDiagnosis');
			}
		}

		$data['inputan'] = $_SESSION['bobot'];

		// MENENTUKAN AWAL DAN AKHIR GEJALA YG AKAN DITAMPILKAN
		$data['dataAwal'] = ($page-1)*10;
		if ($page*10>count($data['gejala'])) {
			$data['dataAkhir'] = ($page-1)*10 + (count($data['gejala']) - ($page-1)*10);
		}else {
			$data['dataAkhir'] = $page*10;
		}
		
		$this->view('templates/header', $data);
		$this->view('diagnosis/index', $data);
		$this->view('templates/footer');
	}

	public function hasilDiagnosis(){
		$bobot_post = $_SESSION['bobot'];
		
		// UNSET / KOSONGKAN BOBOT PADA SESSION
		$data['gejala'] = $this->model('Diagnosis_model')->getAllGejala();
		$_SESSION['bobot'] = array_fill(1,count($data['gejala'])+1,1);

		// ambil data bobot dari bobot post
		$gejala = $this->model('Diagnosis_model')->getAllGejala();
		$bobot_user=[];
		$cf = array_fill(1, count($gejala), 0);
		foreach ($gejala as $i => $g) {
			if ($bobot_post[$g['id_gejala']] != 1) {
				$bobot_user[$g['id_gejala']]= $this->model('Diagnosis_model')->getBobotId($bobot_post[$g['id_gejala']]);
				
				// bobot user * bobot pakar
				$cf[$g['id_gejala']] = $g['nilai_bobot']*$bobot_user[$g['id_gejala']]['nilai_bobot'];
				// echo 'G'.$g['id_gejala'].' = '.$g['nilai_bobot'].' * '.$bobot_user[$g['id_gejala']]['nilai_bobot'].' = '.$cf[$g['id_gejala']].'<br>';
			}
		}
		
		// perhitungan CF total
		$kerusakan = $this->model('Diagnosis_model')->getKerusakan();
		$cf_total = array_fill(0, count($kerusakan), -1);
		$cf_max = array(0,0);

		foreach($kerusakan as $i=>$k){
			$gejalaPerKerusakan = $this->model('Diagnosis_model')->getGejalaPerKerusakan($k['id_kerusakan']);
			$flag=true;
			// echo '<br> '.$k['jenis_kerusakan'].'<br>';
			foreach ($gejalaPerKerusakan as $j => $g) {
				if ($cf_total[$i]==-1 && $flag==true) {
					$flag=false;
				}elseif($cf_total[$i]==-1 && $flag==false){
					$cf_total[$i] = $cf[$gejalaSebelum] + $cf[$g['id_gejala']] * (1 - $cf[$gejalaSebelum]);
					// echo '= '.$cf[$gejalaSebelum].' + '.$cf[$g['id_gejala']].' * (1 - '.$cf[$gejalaSebelum].') = '.$cf_total[$i].'<br>';
				}else{
					// echo '= '.$cf_total[$i].' + '.$cf[$g['id_gejala']].' * (1 - '.$cf_total[$i].') = ';
					$cf_total[$i] = $cf_total[$i] + $cf[$g['id_gejala']] * (1 - $cf_total[$i]);
					// echo $cf_total[$i].'<br>';
				}
				
				$gejalaSebelum = $g['id_gejala'];
			}
			
			// cari nilai cf total terbesar
			if ($cf_max[0]<$cf_total[$i]){
				$cf_max[0]=$cf_total[$i];
				$cf_max[1]=$k['id_kerusakan'];
			}
		}
		// exit;

		// ambil data kerusakan berdasarkan id
		$kerusakan_akhir = $this->model('Diagnosis_model')->getKerusakanPerId($cf_max[1]);

		$gejala_riwayat = [];
		// insert hasil ke riwayat
		if ($this->model('Diagnosis_model')->insertRiwayat($cf_max[1], $cf_max[0], $_SESSION['id']) > 0) {
			$riwayat = $this->model('Diagnosis_model')->getRiwayat($_SESSION['id']);
			
			// insert gejala ke riwayat gejala
			foreach ($gejala as $i => $g) {
				if ($bobot_post[$g['id_gejala']] != 1) {
					$this->model('Diagnosis_model')->insertRiwayatGejala($riwayat['id_riwayat'],$g['id_gejala'],$bobot_user[$g['id_gejala']]['id_bobot']);
				}
			}
		}

		// echo '<pre>'; print_r($gejala_riwayat); echo '</pre>';
		// echo '<pre>'; print_r($cf_total); echo '</pre>';
		// exit();

		$data['judul']='Hasil Diagnosis';
		$data['nama'] = $_SESSION['nama'];
		$data['kerusakan'] = $kerusakan_akhir['jenis_kerusakan'];
		$data['cf'] = round($cf_max[0],2)*100;
		$data['gejala'] = $gejala;
		$data['bobot_user'] = $bobot_user;
		$this->view('templates/header', $data);
		$this->view('diagnosis/hasil_diagnosis', $data);
		$this->view('templates/footer');
	}
}