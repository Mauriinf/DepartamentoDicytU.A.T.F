<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convenio_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('convenio_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'conve' => $this->m->listaconvenio(),
			'esti'=> $this->m->gettipo(),
			
			 );
		
		$this->load->view($campo.'/convenios/convenio_modal',$data);
	}

	public function agregar(){
		$titulo=$this->input->post('titulo');
		$descripcion=$this->input->post('desc');
		$fecha=$this->input->post('fecha');
		$tipo=$this->input->post('tipo');
		$data = array(
			'titulo' => $titulo ,
			'descripcion'=> $descripcion,
			'fecha' => $fecha,
			'tipo_convenio' => $tipo,
			 );
		$this->m->agregarconvenio($data);
		$this->session->set_flashdata('ok','Convenio Agregado Exitosamente ');
		redirect('convenio/convenio_modal');
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('convenio/convenio_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'conven' => $this->m->getconvenio($id),
			'tipo'=> $this->m->gettipo(),			
			 );

		$this->load->view($campo.'/convenios/editcon',$data);
	}

	public function editar(){
		$id=$this->input->post('txtId');
		$titulo=$this->input->post('titulo');
		$descripcion=$this->input->post('desc');
		$id_tipo=$this->input->post('tipo');
		$data = array(
			'titulo' => $titulo ,
			'descripcion'=> $descripcion,
			'tipo_convenio' => $id_tipo, );
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Convenio Modificado Exitosamente');
		redirect('convenio/convenio_modal');
	}
}