<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('cargo_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'cargos' => $this->m->listacargo(),
			 );
		$this->load->view($campo.'/cargo/cargo',$data);
	}

	public function agregar(){
		$nombre=$this->input->post('nombrecar');
		$this->form_validation->set_rules('nombrecar','cargo','is_unique[cargo.nombre_cargo]');
		if ($this->form_validation->run()) {
			$data = array(
			'nombre_cargo' => $nombre,
			'id_usuario'=> $this->session->id, );
		$this->m->agregarcargo($data);
		$this->session->set_flashdata('ok','Cargo Agregado Exitosamente');
		redirect('cargos/cargos_modal');
		}
		else{
			$this->session->set_flashdata('ok','ERROR..!!! El valor ya Existe');
		redirect('cargos/cargos_modal');
		}
		
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('cargos/cargos_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'cargo' => $this->m->trae($id)
			);
		$this->load->view($campo.'/cargo/editcar',$data);
	}

	public function editar(){
		$id=$this->input->post('txtId');
		$nombre=$this->input->post('ncar');
		$data = array(
			'nombre_cargo' => $nombre );
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Cargo Modificado Exitosamente');
		redirect('cargos/cargos_modal');
	}
}