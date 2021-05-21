<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensajes_m extends CI_Model{

	public function agregarmensaje($data){
		$this->db->insert('mensajes', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function vermensajes($id){
		$this->db->select('m.*, u.usuario as usuario');
		$this->db->from('mensajes m');
		$this->db->join('usuario u', 'm.id_emisor=u.id_usuario');
		$this->db->where('id_remitente', $id);
		//$this->db->where('leido', '0');
		$this->db->where('eliminado', '0');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
		
	}

	public function verenviados($id){
		$this->db->select('m.*, u.usuario as usuario');
		$this->db->from('mensajes m');
		$this->db->join('usuario u', 'm.id_remitente=u.id_usuario');
		$this->db->where('id_emisor', $id);
		$this->db->where('eliminado', '0');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
		
	}

	public function vereliminados($id){
		$this->db->select('m.*, u.usuario as usuario');
		$this->db->from('mensajes m');
		$this->db->join('usuario u', 'm.id_emisor=u.id_usuario');
		$this->db->where('id_remitente', $id);
		$this->db->where('eliminado', '1');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function vermesa($id){
		$this->db->select('m.*, u.usuario as usuario');
		$this->db->from('mensajes m');
		$this->db->join('usuario u', 'm.id_emisor=u.id_usuario');
		$this->db->where('id_mensaje', $id);
		$this->db->order_by('m.fecha','desc');
		$resultado = $this->db->get();
		if($resultado->num_rows() > 0){
			return $resultado->result();
		}else{
			return false;
		}
	}

	public function vermesaI($id){
		$this->db->select('m.*, u.usuario as usuario');
		$this->db->from('mensajes m');
		$this->db->join('usuario u', 'm.id_remitente=u.id_usuario');
		$this->db->where('id_mensaje', $id);
		$this->db->order_by('m.fecha','desc');
		$resultado = $this->db->get();
		if($resultado->num_rows() > 0){
			return $resultado->result();
		}else{
			return false;
		}
	}

	public function contar($id){
		$this->db->select ('count(*)');
		//$this->db->from('mensajes');
		$this->db->where('id_remitente',$id);
		$this->db->where('leido','0');
		$resultado = $this->db->get('mensajes');
		return $resultado->row(); 
	}

	public function contaren($id){
		$this->db->select ('count(*)');
		//$this->db->from('mensajes');
		$this->db->where('id_emisor',$id);
		$this->db->where('eliminado','0');
		$resultado = $this->db->get('mensajes');
		return $resultado->row(); 
	}

	public function contarel($id){
		$this->db->select ('count(*)');
		//$this->db->from('mensajes');
		$this->db->where('id_remitente',$id);
		$this->db->where('eliminado','1');
		$resultado = $this->db->get('mensajes');
		return $resultado->row(); 
	}

	public function actues($id){
		$this->db->where('id_mensaje', $id);
		$resultado=$this->db->update ('mensajes', array('leido' => '1', ));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function delete($idmes){
		$this->db->where('id_mensaje', $idmes);
		$this->db->update('mensajes', array('eliminado'=>'1', 'leido'=>'1',));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borraeli($idmes){
		$this->db->where('id_mensaje', $idmes);
		$this->db->delete('mensajes');
	}
}