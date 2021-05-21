<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario_m extends CI_Model{
	
	public function geteventos(){
		$this->db->select('id_evento id, titulo title, fecha_inicio start, fecha_final end, color color, link url, color_texto textColor');
		$this->db->from('eventos');
		return $this->db->get()->result();

	}

	public function geteventosdir(){
		$this->db->select('id_evento id, titulo title, fecha_inicio start, fecha_final end, color color, color_texto textColor');
		$this->db->from('eventos');
		return $this->db->get()->result();

	}

	public function agregar($data){
		$this->db->insert('eventos', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function listaeventos(){
		$this->db->order_by('fecha_inicio', 'desc');
		$query = $this->db->get('eventos');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_evento', $id);
		$this->db->delete('eventos');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function infoeventos($ide,$idu){
		$this->db->where('id_avance',$ide);
		$this->db->where('id_usuario',$idu);
		$query = $this->db->get('detalle_avances');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function infodeta($ide){
		$this->db->where('id_evento',$ide);
		$resultado=$this->db->get('eventos');
		return $resultado->row();
	}
	public function agregardeta($data){
		$this->db->insert('detalle_avances', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function getevent($id){
		$this->db->where('id_evento',$id);
		$resultado=$this->db->get('eventos');
		return $resultado->row();
	}
	public function edita($data,$id){
		//$id = $this->input->post('txtId');
		$this->db->where('id_evento', $id);
		$this->db->update('eventos', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}