<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convocatoria_m extends CI_Model{

	public function gettipo(){
		$resultados=$this->db->get('tipo_convocatoria');
		return $resultados->result();
	}

	public function listaconv(){
		$this->db->select('c.*, t.nombre_tipo');
		$this->db->from('convocatoria c');
		$this->db->join('tipo_convocatoria t','c.id_tipo_convocatoria = t.id_tipo_convocatoria');
		$this->db->order_by('c.fecha_inicio', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function listaconvus(){
		$this->db->select('c.*, t.nombre_tipo');
		$this->db->from('convocatoria c');
		$this->db->join('tipo_convocatoria t','c.id_tipo_convocatoria = t.id_tipo_convocatoria');
		$this->db->limit(6);
		$this->db->order_by('c.fecha_inicio', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function convinves(){
		$this->db->select('c.*, t.nombre_tipo');
		$this->db->from('convocatoria c');
		$this->db->join('tipo_convocatoria t','c.id_tipo_convocatoria = t.id_tipo_convocatoria');
		$this->db->where('c.id_tipo_convocatoria', '1');
		$this->db->order_by('c.fecha_inicio', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function listaconvext(){
		$this->db->select('c.*, t.nombre_tipo');
		$this->db->from('convocatoria c');
		$this->db->join('tipo_convocatoria t','c.id_tipo_convocatoria = t.id_tipo_convocatoria');
		$this->db->order_by('c.fecha_inicio', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarconv($data){
		$this->db->insert('convocatoria', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function trae($id){
		$this->db->where('id_convocatoria',$id);
		$resultado=$this->db->get('convocatoria');
		return $resultado->row();
	}

	public function edita($data,$id){
		$this->db->where('id_convocatoria', $id);
		$this->db->update('convocatoria', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_convocatoria', $id);
		$this->db->delete('convocatoria');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function listadetalle($id){
		$this->db->select('c.*, t.nombre_tipo');
		$this->db->from('convocatoria c');
		$this->db->join('tipo_convocatoria t','c.id_tipo_convocatoria = t.id_tipo_convocatoria');
		$this->db->where('c.id_convocatoria', $id);
		$this->db->order_by('c.fecha_inicio', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}