<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carreras_m extends CI_Model{

	public function getcarrera($id){
		$this->db->where('id_carrera',$id);
		$resultado=$this->db->get('carrera');
		return $resultado->row();
	}

	public function listacarrera(){
		$this->db->select('c.*, f.nombre_facultad as nombref,f.imagen');
		$this->db->from('carrera c');
		$this->db->join('facultades f','c.id_facultad = f.id_facultad');
		$this->db->order_by('f.nombre_facultad', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarcarrera($data){
		$this->db->insert('carrera', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getfacultad(){
		$resultado=$this->db->get('facultades');
		return $resultado->result();
	}

	public function edita($data,$id){
		//$id = $this->input->post('txtId');
		$this->db->where('id_carrera', $id);
		$this->db->update('carrera', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_carrera', $id);
		$this->db->delete('carrera');
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
	public function datocarrera($id)
	{
		$this->db->select('c.*, f.nombre_facultad as nombref');
		$this->db->from('carrera c');
		$this->db->join('facultades f','c.id_facultad = f.id_facultad');
		$this->db->where('c.id_carrera', $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getnomcar($id){
		$this->db->where('id_facultad',$id);
		$this->db->order_by('nombre_carrera', 'asc');
		$resultado=$this->db->get('carrera');
		return $resultado->result();
	}
	public function prufac(){
		$this->db->order_by('nombre_facultad','acs');
		$resultado=$this->db->get('facultades');
		return $resultado->result();
	}
	public function prucar(){
		$this->db->order_by('nombre_carrera','acs');
		$resultado=$this->db->get('carrera');
		return $resultado->result();
	}
}