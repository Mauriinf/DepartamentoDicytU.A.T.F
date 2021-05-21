<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recurso_m extends CI_Model{
	public function getrecurso($id){
		$this->db->where('id_recurso',$id);
		$this->db->order_by('nombre','asc');
		$resultado=$this->db->get('recurso');
		return $resultado->row();
	}

	public function listarecurso(){
		$this->db->select('*');
		$this->db->from('recurso');
		$this->db->order_by('nombre', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarrecurso($data){
		$this->db->insert('recurso', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function edita($data,$id){
		$this->db->where('id_recurso', $id);
		$this->db->update('recurso', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_recurso', $id);
		$this->db->delete('recurso');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}