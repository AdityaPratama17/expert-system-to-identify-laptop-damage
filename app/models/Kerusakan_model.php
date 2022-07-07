<?php

class Kerusakan_model{
    private $db;

    public function __construct(){
		$this->db = new Database;
	}

    public function tambahKerusakan($data){
		$query = "INSERT INTO kerusakan VALUES ('',:kerusakan)";

		$this->db->query($query);
		$this->db->bind('kerusakan', $data['kerusakan']);
		$this->db->execute();

		return $this->db->rowCount();
	}

    public function getKerusakanById($id){
		$this->db->query('SELECT * FROM kerusakan WHERE id_kerusakan=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

    public function ubahDataKerusakan($data){
		$query = "UPDATE kerusakan SET jenis_kerusakan = :kerusakan WHERE id_kerusakan = :id";

		$this->db->query($query);
		$this->db->bind('kerusakan', $data['kerusakan']);
		$this->db->bind('id', $data['id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusIdRiwayatDiRiwayatGejala($id){
		$query = "DELETE riwayat_gejala FROM riwayat
		INNER JOIN riwayat_gejala USING(id_riwayat)
		WHERE id_kerusakan = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}

	public function hapusKerusakanDiRiwayat($id){
		$query = "DELETE FROM riwayat WHERE id_kerusakan = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}

	public function hapusKerusakanDiRules($id){
		$query = "DELETE FROM rules WHERE id_kerusakan = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}

	public function hapusKerusakan($id){
		$query = "DELETE FROM kerusakan WHERE id_kerusakan = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}
}