<?php

class Admin_model{
    private $db;

    public function __construct(){
		$this->db = new Database;
	}

    public function getAdmin(){
		$this->db->query("SELECT * FROM users WHERE `role`='admin'");
		return $this->db->resultSet();
	}

    public function tambahAdmin($data){
		$query = "INSERT INTO users VALUES ('',:uname,:nama,:email,:pw,'admin')";

		$this->db->query($query);
		$this->db->bind('uname', $data['uname']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('pw', $data['pw']);
		$this->db->execute();

		return $this->db->rowCount();
	}

    public function hapusAdmin($id){
    	$query = "DELETE FROM users WHERE id_user = :id";

    	$this->db->query($query);
    	$this->db->bind('id', $id);
    	$this->db->execute();
        
    	return $this->db->rowCount();
    }

    // public function getAllRiwayat($id){
	// 	$this->db->query('SELECT * FROM riwayat WHERE id_user=:id');
    //     $this->db->bind('id',$id);
	// 	return $this->db->resultSet();
	// }

    // public function tambahAturan($data){
	// 	$query = "INSERT INTO rules VALUES ('',:gejala,:kerusakan)";

	// 	$this->db->query($query);
	// 	$this->db->bind('gejala', $data['gejala']);
	// 	$this->db->bind('kerusakan', $data['kerusakan']);
	// 	$this->db->execute();

	// 	return $this->db->rowCount();
	// }

    // public function getAturanById($id){
	// 	$this->db->query('SELECT * FROM rules WHERE id_rule=:id');
	// 	$this->db->bind('id',$id);
	// 	return $this->db->single();
	// }

    // public function ubahDataAturan($data){
	// 	$query = "UPDATE rules SET id_gejala = :gejala, id_kerusakan = :kerusakan WHERE id_rule = :id";

	// 	$this->db->query($query);
	// 	$this->db->bind('gejala', $data['gejala']);
	// 	$this->db->bind('kerusakan', $data['kerusakan']);
	// 	$this->db->bind('id', $data['id']);
	// 	$this->db->execute();

	// 	return $this->db->rowCount();
	// }

    // public function hapusAturan($id){
	// 	$query = "DELETE FROM rules WHERE id_rule = :id";

	// 	$this->db->query($query);
	// 	$this->db->bind('id', $id);
	// 	$this->db->execute();
		
	// 	return $this->db->rowCount();
	// }
}