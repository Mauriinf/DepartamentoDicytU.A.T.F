<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conteo extends CI_Model{
	
	public function contar($tabla){
		if ($tabla!='trabajo_investigacion' and $tabla!='carrera') {
			
		}		
		$resultados=$this->db->get($tabla);
		return $resultados->num_rows();
	}
	public function contardoc(){
		$this->db->where('tipo_investigador', 1);
		$resultados=$this->db->get('trabajo_investigacion');
		return $resultados->num_rows();
	}
	public function contarest(){
		$this->db->where('tipo_investigador', 2);
		$resultados=$this->db->get('trabajo_investigacion');
		return $resultados->num_rows();
	}
	public function contarpro(){
		$this->db->where('tipo_investigador', 3);
		$resultados=$this->db->get('trabajo_investigacion');
		return $resultados->num_rows();
	}
}