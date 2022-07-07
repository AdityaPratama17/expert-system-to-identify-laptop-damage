<?php

class Riwayat_model{
    private $db;

    public function __construct(){
		$this->db = new Database;
	}

    public function getRiwayatById($id){
      $this->db->query('SELECT r.id_riwayat, COUNT(id_riwayat) AS jum, k.jenis_kerusakan, r.nilai_cf 
      FROM riwayat r
      INNER JOIN kerusakan k USING(id_kerusakan)
      INNER JOIN riwayat_gejala USING(id_riwayat)
      WHERE r.id_user=:id GROUP BY r.id_riwayat');
      
      $this->db->bind('id',$id);
      return $this->db->resultSet();
	}

  public function getRiwayatGejalaById($id){
    $this->db->query('SELECT * FROM riwayat_gejala rg
      INNER JOIN riwayat USING(id_riwayat)
      INNER JOIN kerusakan USING(id_kerusakan)
      INNER JOIN gejala USING(id_gejala)
      INNER JOIN bobot b ON rg.id_bobot_user=b.id_bobot
      WHERE id_riwayat=:id
      ORDER BY id_gejala ASC');
    
    $this->db->bind('id',$id);
    return $this->db->resultSet();
  }

  public function hapusIdRiwayatDiRiwayatGejala($id){
		$query = "DELETE FROM riwayat_gejala WHERE id_riwayat = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}

  public function hapusRiwayat($id){
		$query = "DELETE FROM riwayat WHERE id_riwayat = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		
		return $this->db->rowCount();
	}
}