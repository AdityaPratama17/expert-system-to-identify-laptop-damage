<?php

class Dashboard_model{
    private $db;

    public function __construct(){
		$this->db = new Database;
	}

    public function getAllRule(){
		$this->db->query('SELECT * FROM rules');
		return $this->db->resultSet();
	}

    public function getAllRiwayat($id){
		$this->db->query('SELECT * FROM riwayat WHERE id_user=:id');
        $this->db->bind('id',$id);
		return $this->db->resultSet();
	}
}