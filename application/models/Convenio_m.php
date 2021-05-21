<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convenio_m extends CI_Model{

	public function getconvenio($id){
		$this->db->where('id_convenios',$id);
		$resultado=$this->db->get('convenios');
		return $resultado->row();
	}

	public function listaconvenio(){
		$this->db->select('c.*, t.nombre_convenio as nombret');
		$this->db->from('convenios c');
		$this->db->join('tipo_convenio t','c.tipo_convenio = t.id_convenio');
		$this->db->order_by('c.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarconvenio($data){
		$this->db->insert('convenios', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function gettipo(){;
		$resultado=$this->db->get('tipo_convenio');
		return $resultado->result();
	}

	public function edita($data,$id){
		$this->db->where('id_convenios', $id);
		$this->db->update('convenios', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_convenios', $id);
		$this->db->delete('convenios');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function lstcon($id){
		$this->db->select('c.*, t.nombre_convenio as nombret');
		$this->db->from('convenios c');
		$this->db->join('tipo_convenio t','c.tipo_convenio = t.id_convenio');
		$this->db->where('tipo_convenio',$id);
		$this->db->order_by('c.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function tipo($id){
		$this->db->where('id_convenio',$id);
		$resultado=$this->db->get('tipo_convenio');
		return $resultado->row();
	}
	public function listadetalle($id){
		$this->db->select('c.*, t.nombre_convenio as nombre_tipo');
		$this->db->from('convenios c');
		$this->db->join('tipo_convenio t','c.tipo_convenio = t.id_convenio');
		$this->db->where('c.id_convenios',$id);
		$this->db->order_by('c.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}