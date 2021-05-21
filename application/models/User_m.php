<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convocatoria_m extends CI_Model{

	public function gettipo(){
		$resultados=$this->db->get('tipo_convocatoria');
		return $resultados->result();
	}
}