<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_m extends CI_Model{

	public function login($username, $password){
		$this->db->select('u.*, r.nombre');
		$this->db->from('usuario u');
		$this->db->join('roles r','u.rol_id = r.id');
		$this->db->where("u.email", $username);
		$this->db->where("u.contrasena", $password);
		$this->db->where("u.estado", '1');
		$this->db->order_by('u.rol_id','asc');
		$resultado = $this->db->get();
		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}
	}

	public function getusu($id){
		$this->db->where('id_usuario',$id);
		$resultado=$this->db->get('usuario');
		return $resultado->row();
	}

	public function getusuari($id){
		$this->db->select('u.*, r.nombre');
		$this->db->from('usuario u');
		$this->db->join('roles r','u.rol_id = r.id');
		$this->db->where('u.id_usuario !='.$id);
		$resultado=$this->db->get();
		return $resultado->result();
	}

	public function listausuario(){
		$this->db->select('u.*, r.nombre as nombrerol');
		$this->db->from('usuario u');
		$this->db->join('roles r','u.rol_id = r.id');
		$this->db->order_by('r.nombre', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function datepro($gestion){

		$this->db->select('u.*, f.nombre_facultad,c.nombre_carrera,r.nombre as nombrerol, t.nombre_investigador');
		$this->db->from('usuario u');
		$this->db->join('facultades f','u.id_facultad = f.id_facultad');
		$this->db->join('carrera c','u.id_carrera = c.id_carrera');
		$this->db->join('roles r','u.rol_id = r.id');
		$this->db->join('tipo_investigador t','u.tipo_investigador = t.id');
		if ($gestion!=='') {
			$this->db->like('u.gestion',$gestion);
		}
		$this->db->order_by('f.nombre_facultad', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function listausuariorepor(){
		$this->db->select('u.*, f.nombre_facultad,c.nombre_carrera,r.nombre as nombrerol, t.nombre_investigador');
		$this->db->from('usuario u');
		$this->db->join('facultades f','u.id_facultad = f.id_facultad');
		$this->db->join('carrera c','u.id_carrera = c.id_carrera');
		$this->db->join('roles r','u.rol_id = r.id');
		$this->db->join('tipo_investigador t','u.tipo_investigador = t.id');
		$this->db->order_by('r.nombre', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function listausuarioava(){
		$this->db->select('u.*, r.nombre as nombrerol');
		$this->db->from('usuario u');
		$this->db->join('roles r','u.rol_id = r.id');
		$this->db->where('tipo_investigador',2);
		$this->db->order_by('rol_id', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function listausuariocat($id, $cat){
		$this->db->where('id_usuario !='.$id);
		$this->db->where('id_facultad', $cat);
		$this->db->order_by('id_carrera', 'asc');
		$query = $this->db->get('usuario');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function agregarusu($data){
		$this->db->insert('usuario', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getrol(){
		$resultado=$this->db->get('roles');
		return $resultado->result();
	}

	public function edita($data,$id){
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuario');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}