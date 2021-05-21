<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facultades_m extends CI_Model{

	public function getfacultad(){
		$this->db->order_by('nombre_facultad', 'asc');
		$resultados=$this->db->get('facultades');
		return $resultados->result();
	}

	public function listafacultad(){
		$this->db->select('f.*, ');
		$this->db->from('facultades f');
		$this->db->order_by('f.nombre_facultad', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarfacultad($data){
		$this->db->insert('facultades', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function trae($id){
		$this->db->where('id_facultad',$id);
		$resultado=$this->db->get('facultades');
		return $resultado->row();
	}

	public function edita($data,$id){
		//$id = $this->input->post('txtId');
		$this->db->where('id_facultad', $id);
		$this->db->update('facultades', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_facultad', $id);
		$this->db->delete('facultades');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function verinfo($id){
		$this->db->where('id_facultad', $id);
		$resultado = $this->db->get('facultades');
		return $resultado->row();
	}
}