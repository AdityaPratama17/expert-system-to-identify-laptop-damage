<?php

class Gejala_model{
    private $db;

    public function __construct(){
		$this->db = new Database;
	}

	public function getLastIdhGejala(){
		$this->db->query('SELECT MAX(id_gejala) AS id FROM gejala');
		return $this->db->single();
	}

    public function tambahGejala($id,$data){
		$query = "INSERT INTO gejala VALUES (:id,:gejala,:bobot)";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->bind('gejala', $data['gejala']);
		$this->db->bind('bobot', $data['bobot']);
		$this->db->execute();

		return $this->db->rowCount();
	}

    public function getGejalaById($id){
		$this->db->query('SELECT * FROM gejala WHERE id_gejala=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

    public function ubahDataGejala($data){
		$query = "UPDATE gejala SET nama_gejala = :gejala, id_bobot_pakar = :bobot WHERE id_gejala = :id";

		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('gejala', $data['gejala']);
		$this->db->bind('bobot', $data['bobot']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusGejala($id){
		$query = "DELETE FROM gejala WHERE id_gejala = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}

	public function UpdateIdGejala($id){
		$query = "UPDATE gejala SET id_gejala = id_gejala-1 WHERE id_gejala > :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}

	public function hapusGejalaDiRiwayatGejala($id){
		$query = "DELETE FROM riwayat_gejala WHERE id_gejala = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}

	public function hapusGejalaDiRules($id){
		$query = "DELETE FROM rules WHERE id_gejala = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}
}