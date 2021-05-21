<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Becas_m extends CI_Model{

	public function getbeca($id){
		$this->db->where('id_beca',$id);
		$resultado=$this->db->get('becas');
		return $resultado->row();
	}

	public function listabeca(){
		$this->db->order_by('fecha', 'desc');
		$query = $this->db->get('becas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarbeca($data){
		$this->db->insert('becas', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function gettipo(){;
		$resultado=$this->db->get('tipo_publicacion');
		return $resultado->result();
	}

	public function edita($data,$id){
		$this->db->where('id_beca', $id);
		$this->db->update('becas', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_beca', $id);
		$this->db->delete('becas');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function convbe(){
		$this->db->select('c.*, t.nombre_tipo');
		$this->db->from('convocatoria c');
		$this->db->join('tipo_convocatoria t','c.id_tipo_convocatoria = t.id_tipo_convocatoria');
		$this->db->where('c.id_tipo_convocatoria', '2');
		$this->db->order_by('id_convocatoria', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function detallebeca($id){
		$this->db->where('id_beca',$id);
		$this->db->order_by('fecha', 'desc');
		$query = $this->db->get('becas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}