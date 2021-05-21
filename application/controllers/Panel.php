<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mensajes_m', 's');
		$this->load->model('conteo', 'c');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array(
			'entrada' => $this->s->vermensajes($this->session->id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),
			'cantcarrera' => $this->c->contar('carrera'),
			'cantfacultad' => $this->c->contar('facultades'),
			'cantproyecto' => $this->c->contar('trabajo_investigacion'),
			'cantproyectodocente' => $this->c->contardoc('trabajo_investigacion'),
			'cantproyectoestudiante' => $this->c->contarest('trabajo_investigacion'),
			'cantproyectos' => $this->c->contarpro('trabajo_investigacion'),
			'cantusuario' => $this->c->contar('usuario'),		
			 );
		$this->load->view('admin/admin/panel',$data);
	}

	public function admin()
	{
		$data = array(
			'entrada' => $this->s->vermensajes($this->session->id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),
			'cantcarrera' => $this->c->contar('carrera'),
			'cantfacultad' => $this->c->contar('facultades'),
			'cantproyecto' => $this->c->contar('trabajo_investigacion'),
			'cantproyectodocente' => $this->c->contardoc('trabajo_investigacion'),
			'cantproyectoestudiante' => $this->c->contarest('trabajo_investigacion'),
			'cantproyectos' => $this->c->contarpro('trabajo_investigacion'),
			'cantusuario' => $this->c->contar('usuario'),	
			 );
		$this->load->view('director/admin/panel',$data);
	}

	public function usuario()
	{
		$data = array(
			'entrada' => $this->s->vermensajes($this->session->id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),
			'cantcarrera' => $this->c->contar('carrera'),
			'cantfacultad' => $this->c->contar('facultades'),
			'cantproyecto' => $this->c->contar('trabajo_investigacion'),
			'cantproyectodocente' => $this->c->contardoc('trabajo_investigacion'),
			'cantproyectoestudiante' => $this->c->contarest('trabajo_investigacion'),
			'cantproyectos' => $this->c->contarpro('trabajo_investigacion'),
			'cantusuario' => $this->c->contar('usuario'),		
			 );
		$this->load->view('usuario/admin/panel',$data);
	}
	public function coordinador()
	{
		$data = array(
			'entrada' => $this->s->vermensajes($this->session->id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),
			'cantcarrera' => $this->c->contar('carrera'),
			'cantfacultad' => $this->c->contar('facultades'),
			'cantproyecto' => $this->c->contar('trabajo_investigacion'),
			'cantproyectodocente' => $this->c->contardoc('trabajo_investigacion'),
			'cantproyectoestudiante' => $this->c->contarest('trabajo_investigacion'),
			'cantproyectos' => $this->c->contarpro('trabajo_investigacion'),
			'cantusuario' => $this->c->contar('usuario'),		
			 );
		$this->load->view('coordinador/admin/panel',$data);
	}
}
