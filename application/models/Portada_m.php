<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portada_m extends CI_Model{

	public function listaportada(){
		$this->db->order_by('id_portada', 'desc');
		$query = $this->db->get('portada');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarportada($data){
		$this->db->insert('portada', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function trae($id){
		$this->db->where('id_portada',$id);
		$resultado=$this->db->get('portada');
		return $resultado->row();
	}

	public function edita($data,$id){
		$this->db->where('id_portada', $id);
		$this->db->update('portada', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_portada', $id);
		$this->db->delete('portada');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}