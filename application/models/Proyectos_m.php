<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos_m extends CI_Model{

	public function getproy(){
		$this->db->order_by('nombre_facultad', 'asc');
		$resultados=$this->db->get('facultades');
		return $resultados->result();
	}

	public function gettipo(){
		$resultados=$this->db->get('tipo_investigador');
		return $resultados->result();
	}
	public function getcarrera(){
		$resultados=$this->db->get('carrera');
		return $resultados->result();
	}

	public function combocarrera($facultad_id){
		$this->db->where('id_facultad', $facultad_id);
		$this->db->order_by('nombre_carrera', 'asc');
		$query = $this->db->get('carrera');
		$output = '<option value="">..:: Selecione Carrera ::..</option>';
		foreach ($query->result() as $row)
		{
			$output .='<option value="'.$row->id_carrera.'">'.$row->nombre_carrera.'</option>';
		}
		return $output;
	}

	public function listaproy(){

		$this->db->select('p.*, f.nombre_facultad, f.imagen, c.nombre_carrera, u.nombre_completo, u.apellido_pat, t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->order_by('p.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function datepro($fechainicio, $fechafin, $carrera,$gestion){

		$this->db->select('p.*, f.nombre_facultad, c.nombre_carrera, u.nombre_completo, u.apellido_pat, t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		if ($fechainicio!=='' and $fechafin!=='') {
			$this->db->where('p.fecha >=', $fechainicio);
		$this->db->where('p.fecha <=', $fechafin);
		}
		if ($carrera!=='') {
			$this->db->like('c.nombre_carrera',$carrera,'both');
		}
		if ($gestion!=='') {
			$this->db->where('p.gestion=',$gestion);
		}
		$this->db->order_by('p.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function listaproyuse(){

		$this->db->select('p.*, f.nombre_facultad, f.imagenr as rela, c.nombre_carrera, u.nombre_completo, u.apellido_pat, t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.tipo_investigador',2);
		$this->db->order_by('p.visitas', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function listaproyusedoc(){

		$this->db->select('p.*, f.nombre_facultad, f.imagen as imagenf , c.nombre_carrera, c.imagenc , u.nombre_completo, u.apellido_pat, t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.tipo_investigador',1);
		$this->db->or_where_in('p.tipo_investigador',3);
		$this->db->order_by('p.visitas', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function listaproysociedad(){

		$this->db->select('p.*, f.nombre_facultad,f.imagen , c.nombre_carrera, u.nombre_completo, u.apellido_pat, t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.tipo_investigador', 4);
		$this->db->order_by('p.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function subir($data,$id){
		$this->db->where('id_investigacion', $id);
		$this->db->update('trabajo_investigacion', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function trae($id){
		$this->db->where('id_investigacion',$id);
		$resultado=$this->db->get('trabajo_investigacion');
		return $resultado->row();
	}

	public function agregarproyecto($data){
		$this->db->insert('trabajo_investigacion', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editproyecto($data,$id){
		$this->db->where('id_investigacion', $id);
		$this->db->update('trabajo_investigacion', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function borrar($id){
		$this->db->where('id_investigacion', $id);
		$this->db->delete('trabajo_investigacion');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function listaproyuser(){

		$this->db->select('p.*, f.nombre_facultad,f.imagen, c.nombre_carrera, u.nombre_completo, u.apellido_pat,  t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.tipo_investigador', 1);
		$this->db->order_by('p.fecha', 'desc');		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function listaproyest(){

		$this->db->select('p.*, f.nombre_facultad,f.imagen , c.nombre_carrera, u.nombre_completo, u.apellido_pat, t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.tipo_investigador', 2);
		$this->db->order_by('p.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function lista_inv(){

		$this->db->select('p.*, f.nombre_facultad,f.imagen, c.nombre_carrera, u.nombre_completo, u.apellido_pat, t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.tipo_investigador', 3);
		$this->db->order_by('p.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function detallepro($id, $cont){
		$this->db->where('id_investigacion', $id);
		$this->db->update('trabajo_investigacion', array('visitas'=>$cont,));

		$this->db->select('p.*, f.nombre_facultad, f.imagenr as rela, c.nombre_carrera, u.nombre_completo, u.apellido_pat, u.imagen as uimagen, t.nombre_investigador');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.id_investigacion', $id);
		$this->db->order_by('p.fecha', 'desc');
		$query = $this->db->get();
		return $query->result();
		
	}


	public function listafacul($id)
	{
		$this->db->select('p.*, f.nombre_facultad, c.nombre_carrera, u.nombre_completo, u.apellido_pat, u.imagen, t.nombre_investigador, f.nombre_facultad');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.id_facultad', $id);
		$this->db->order_by('p.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function nomfacul($id)
	{
		$this->db->where('id_facultad',$id);
		$resultado=$this->db->get('facultades');
		return $resultado->row();
	}
	public function nomcarre($id)
	{
		$this->db->where('id_facultad',$id);
		$this->db->order_by('nombre_carrera', 'asc');
		$resultado=$this->db->get('carrera');
		return $resultado->result();
	}

	public function listaporcarrera($id)
	{
		$this->db->select('p.*, f.nombre_facultad, c.nombre_carrera, u.nombre_completo, u.apellido_pat, u.imagen, t.nombre_investigador, f.nombre_facultad');
		$this->db->from('trabajo_investigacion p');
		$this->db->join('facultades f','p.id_facultad = f.id_facultad');
		$this->db->join('carrera c','p.id_carrera = c.id_carrera');
		$this->db->join('usuario u','p.autor = u.id_usuario');
		$this->db->join('tipo_investigador t','p.tipo_investigador = t.id');
		$this->db->where('p.id_carrera', $id);
		$this->db->order_by('p.fecha', 'desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

}