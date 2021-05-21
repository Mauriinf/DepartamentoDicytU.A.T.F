<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_m extends CI_Model{

	public function getcargo(){
		$resultados=$this->db->get('cargo');
		return $resultados->result();
	}

	public function listapersonal(){
		$this->db->select('p.*, c.nombre_cargo');
		$this->db->from('personal p');
		$this->db->join('cargo c','p.id_cargo = c.id_cargo');
		//$this->db->where('f.estado', '1');
		$this->db->order_by('p.id_cargo', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarpersonal($data){
		$this->db->insert('personal', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function trae($id){
		$this->db->where('id_personal',$id);
		$resultado=$this->db->get('personal');
		return $resultado->row();
	}

	public function edita($data,$id){
		$this->db->where('id_personal', $id);
		$this->db->update('personal', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_personal', $id);
		$this->db->delete('personal');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}