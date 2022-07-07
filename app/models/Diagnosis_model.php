<?php

class Diagnosis_model{
    private $db;

    public function __construct(){
		$this->db = new Database;
	}

    public function getAllGejala(){
		// $this->db->query('SELECT * FROM gejala');
		$this->db->query('SELECT * FROM gejala g JOIN bobot b ON g.id_bobot_pakar=b.id_bobot ORDER BY g.id_gejala ASC');
		return $this->db->resultSet();
	}

    public function getAllBobot(){
		$this->db->query('SELECT * FROM bobot');
		return $this->db->resultSet();
	}

    public function getKerusakan(){
		$this->db->query('SELECT * FROM kerusakan');
		return $this->db->resultSet();
	}

    public function getGejalaPerKerusakan($kerusakan){
        $this->db->query('SELECT id_gejala FROM rules WHERE id_kerusakan=:kerusakan');
		$this->db->bind('kerusakan',$kerusakan);
		return $this->db->resultSet();
	}

    public function getKerusakanPerId($id){
        $this->db->query('SELECT * FROM kerusakan WHERE id_kerusakan=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

    public function insertRiwayat($kerusakan, $cf, $user){
        $query = "INSERT INTO riwayat VALUES ('',:kerusakan,:cf,:user)";

		$this->db->query($query);
		$this->db->bind('kerusakan', $kerusakan);
		$this->db->bind('cf', $cf);
		$this->db->bind('user', $user);
		$this->db->execute();

		return $this->db->rowCount();
	}

    public function getRiwayat($id){
        $this->db->query('SELECT * FROM riwayat WHERE id_user=:id ORDER BY id_riwayat DESC LIMIT 1');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

    public function getBobotId($id){
        $this->db->query('SELECT * FROM bobot WHERE id_bobot=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

    public function insertRiwayatGejala($riwayat, $gejala, $bobot){
        $query = "INSERT INTO riwayat_gejala VALUES ('',:riwayat,:gejala,:bobot)";

		$this->db->query($query);
		$this->db->bind('riwayat', $riwayat);
		$this->db->bind('gejala', $gejala);
		$this->db->bind('bobot', $bobot);
		$this->db->execute();

		// return $this->db->rowCount();
	}
}