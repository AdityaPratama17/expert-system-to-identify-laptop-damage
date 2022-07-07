<?php 

class Home extends Controller{
	public function index(){
		echo 'HOME';
		exit();
		
		$data['judul']='Diagnosis';
		$data['gejala'] = $this->model('Diagnosis_model')->getAllGejala();
		$data['bobot'] = $this->model('Diagnosis_model')->getAllBobot();

		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}

	public function hasilDiagnosis(){
		echo 'HOME';
		exit();
		$bobot_post = $_POST['bobot'];

		// ambil data bobot dari bobot post
		$gejala = $this->model('Diagnosis_model')->getAllGejala();
		$bobot_user=[];
		$cf = array_fill(1, count($gejala), 0);
		foreach ($gejala as $i => $g) {
			if ($bobot_post[$g['id_gejala']] != 1) {
				$bobot_user[$g['id_gejala']]= $this->model('Diagnosis_model')->getBobotId($bobot_post[$g['id_gejala']]);
				
				// bobot user * bobot pakar
				$cf[$g['id_gejala']] = $g['nilai_bobot']*$bobot_user[$g['id_gejala']]['nilai_bobot'];
			}
		}
		
		// perhitungan CF total
		$kerusakan = $this->model('Diagnosis_model')->getKerusakan();
		$cf_total = array_fill(0, count($kerusakan), -1);
		$cf_max = array(0,0);

		foreach($kerusakan as $i=>$k){
			$gejalaPerKerusakan = $this->model('Diagnosis_model')->getGejalaPerKerusakan($k['id_kerusakan']);
			$flag=true;
			foreach ($gejalaPerKerusakan as $j => $g) {
				if ($cf_total[$i]==-1 && $flag==true) {
					$flag=false;
				}elseif($cf_total[$i]==-1 && $flag==false){
					$cf_total[$i] = $cf[$gejalaSebelum] + $cf[$g['id_gejala']] * (1 - $cf[$gejalaSebelum]);
				}else{
					$cf_total[$i] = $cf_total[$i] + $cf[$g['id_gejala']] * (1 - $cf_total[$i]);
				}
				
				$gejalaSebelum = $g['id_gejala'];
			}
			
			// cari nilai cf total terbesar
			if ($cf_max[0]<$cf_total[$i]){
				$cf_max[0]=$cf_total[$i];
				$cf_max[1]=$k['id_kerusakan'];
			}
		}

		// ambil data kerusakan berdasarkan id
		$kerusakan_akhir = $this->model('Diagnosis_model')->getKerusakanPerId($cf_max[1]);

		$gejala_riwayat = [];
		// insert hasil ke riwayat
		if ($this->model('Diagnosis_model')->insertRiwayat($cf_max[1], $cf_max[0], 1) > 0) {
			$riwayat = $this->model('Diagnosis_model')->getRiwayat(1);
			
			// insert gejala ke riwayat gejala
			foreach ($gejala as $i => $g) {
				if ($bobot_post[$g['id_gejala']] != 1) {
					$this->model('Diagnosis_model')->insertRiwayatGejala($riwayat['id_riwayat'],$g['id_gejala'],$bobot_user[$g['id_gejala']]['id_bobot']);
				}
			}
		}
		// echo '<pre>'; print_r($gejala_riwayat); echo '</pre>';

		// INPUT DATA DARI USER KE DATA[NAMA]
		
		$data['judul']='Hasil Diagnosis';
		$data['nama'] = "Aditya Pratama";
		$data['kerusakan'] = $kerusakan_akhir['jenis_kerusakan'];
		$data['cf'] = round($cf_max[0],2)*100;
		$data['gejala'] = $gejala;
		$data['bobot_user'] = $bobot_user;
		$this->view('templates/header', $data);
		$this->view('home/hasil_diagnosis', $data);
		$this->view('templates/footer');
	}
}