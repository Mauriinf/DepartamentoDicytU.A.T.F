<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revista_m extends CI_Model{

	public function listarevista($id){
		$this->db->where('id_publicacion', $id);
		$this->db->order_by('nombre_foto','asc');
		$resultado=$this->db->get('fotos_publicaciones');
		return $resultado->result();
	}
	public function insert($data){
		$insert = $this->db->insert_batch('fotos_publicaciones',$data);
        return $insert?true:false;
    }
    public function insertnoti($data){
		$insert = $this->db->insert_batch('fotos_noticias',$data);
        return $insert?true:false;
    }
    public function contar($id){
		$this->db->select ('count(*)');
		//$this->db->from('mensajes');
		$this->db->where('id_remitente',$id);
		$this->db->where('leido','0');
		$resultado = $this->db->get('mensajes');
		return $resultado->row(); 
	}
}