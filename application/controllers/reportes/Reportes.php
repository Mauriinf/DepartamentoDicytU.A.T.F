<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('proyectos_m', 'p');
		$this->load->model('personal_m', 'per');
		//$this->load->model('cargo_m', 'c');
		$this->load->model('usuarios_m', 'c');
		$this->load->model('facultades_m', 'f');
		$this->load->model('carreras_m', 'car');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$fechainicio = $this->input->post('fechainicio');
		$fechafin = $this->input->post('fechafin');
		$carrera = mb_strtoupper($this->input->post('carrera'),'utf-8');
		$gestion = $this->input->post('gestion');
		if ($this->input->post('buscar')) {
			$proy = $this->p->datepro($fechainicio, $fechafin, $carrera,$gestion);
		}
		else{
			$proy = $this->p->listaproy();
		}
		$data = array(
			'proyecto' => $proy,
			'fechainicio' => $fechainicio,
			'fechafin' => $fechafin,
			'carrera' => $carrera,
			'gestion' => $gestion,
			 );
		$this->load->view($campo.'/reportes/proyectos',$data);
	}
	public function personal()
	{
		$campo = $this->session->campo;
		$data = array(
			'personal' => $this->per->listapersonal(),
			'estraf' => $this->per->getcargo()
			 );
		$this->load->view($campo.'/reportes/personal',$data);
	}
	public function cargos()
	{
		$campo = $this->session->campo;
		$data = array(
			'cargos' => $this->c->listacargo(),
			 );
		$this->load->view($campo.'/reportes/cargo',$data);
	}
	public function usuario()
	{
		$campo = $this->session->campo;
		$gestion = $this->input->post('gestion');
		if ($this->input->post('buscar')) {
			$proy = $this->c->datepro($gestion);
		}
		else{
			$proy = $this->c->listausuariorepor();
		}
		$data = array(
			'usuario' => $proy,
			'gestion' => $gestion,
			 );
		$this->load->view($campo.'/reportes/usuario',$data);
	}
	public function facultades()
	{
		$campo = $this->session->campo;
		$data = array(
			'facultades' => $this->f->listafacultad(),
			 );
		$this->load->view($campo.'/reportes/Facultades_modal',$data);
	}
	public function carreras()
	{
		$campo = $this->session->campo;
		$data = array(
			'carreras' => $this->car->listacarrera(),
			'estraf'=> $this->f->getfacultad(),
			
			 );
		
		$this->load->view($campo.'/reportes/carreras_modal',$data);
	}

}