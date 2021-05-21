<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion_m extends CI_Model{

	public function getpubli($id){
		$this->db->where('id_publicacion',$id);
		$resultado=$this->db->get('publicacion');
		return $resultado->row();
	}

	public function listapub(){
		$this->db->select('p.*, t.nombre_publicacion as nombrep');
		$this->db->from('publicacion p');
		$this->db->join('tipo_publicacion t','p.id_tipo_publi = t.id_tipo_publi');
		$this->db->order_by('fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function listapubuser(){
		$this->db->select('p.*, t.nombre_publicacion as nombrep');
		$this->db->from('publicacion p');
		$this->db->join('tipo_publicacion t','p.id_tipo_publi = t.id_tipo_publi');
		$this->db->where('p.id_tipo_publi',4);
		$this->db->order_by('fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarpubli($data){
		$this->db->insert('publicacion', $data);
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

	public function tipo($id){
		$this->db->where('id_tipo_publi',$id);
		$resultado=$this->db->get('tipo_publicacion');
		return $resultado->row();
	}

	public function edita($data,$id){
		$this->db->where('id_publicacion', $id);
		$this->db->update('publicacion', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_publicacion', $id);
		$this->db->delete('publicacion');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function lstpubli($id){
		$this->db->select('p.*, t.nombre_publicacion as nombrep');
		$this->db->from('publicacion p');
		$this->db->join('tipo_publicacion t','p.id_tipo_publi = t.id_tipo_publi');
		$this->db->where('p.id_tipo_publi',$id);
		$this->db->order_by('fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function listadetalle($id){
		$this->db->select('p.*, t.nombre_publicacion as nombre_tipo');
		$this->db->from('publicacion p');
		$this->db->join('tipo_publicacion t','p.id_tipo_publi = t.id_tipo_publi');
		$this->db->where('p.id_publicacion', $id);
		$this->db->order_by('fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function detalleimg($id){
		$this->db->where('id_publi', $id);
		$query = $this->db->get('fotos_noticias');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function insertnoti($data){
		$insert = $this->db->insert('fotos_noticias',$data);
        return $insert?true:false;
    }
}