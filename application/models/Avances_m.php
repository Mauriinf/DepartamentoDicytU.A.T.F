<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avances_m extends CI_Model{

	public function listavance($id){
		$this->db->select('d.*, e.titulo, e.fecha_inicio, e.fecha_final');
		$this->db->from('detalle_avances d');
		$this->db->join('eventos e','d.id_avance = e.id_evento');
		$this->db->order_by('e.titulo', 'asc');
		$this->db->where('d.id_usuario', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function cali($data,$id){
		$this->db->where('id_detalle', $id);
		$this->db->update('detalle_avances', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function rehabil($id){
		$this->db->where('id_detalle', $id);
		$this->db->delete('detalle_avances');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}