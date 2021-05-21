<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_m extends CI_Model{

	public function listacargo(){
		$this->db->order_by('id_cargo', 'asc');
		$query = $this->db->get('cargo');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarcargo($data){
		$this->db->insert('cargo', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function trae($id){
		$this->db->where('id_cargo',$id);
		$resultado=$this->db->get('cargo');
		return $resultado->row();
	}

	public function edita($data,$id){
		$this->db->where('id_cargo', $id);
		$this->db->update('cargo', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_cargo', $id);
		$this->db->delete('cargo');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}