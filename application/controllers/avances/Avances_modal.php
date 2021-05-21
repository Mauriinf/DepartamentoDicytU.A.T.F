<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avances_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('usuarios_m', 'm');
		$this->load->model('avances_m', 'a');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'usuario' => $this->m->listausuarioava(),			
			 );		
		$this->load->view($campo.'/avances/avance',$data);
	}
	public function catego()
	{
		$id = $this->session->id;
		$campo = $this->session->campo;
		$cat = $this->session->facultad;
		$data = array(
			'usuario' => $this->m->listausuariocat($id, $cat),			
			 );		
		$this->load->view($campo.'/avances/avance',$data);
	}

	public function crear()
	{
		$campo = $this->session->campo;
		$data = array(
			'usuario' => $this->m->listausuario(),			
			 );		
		$this->load->view($campo.'/avances/crear_avance',$data);
	}

	public function ver($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'usuario' => $this->m->getusu($id),
			'avance'=> $this->a->listavance($id),			
			 );

		$this->load->view($campo.'/avances/detalle',$data);
	}
	public function download($archivo){
		$this->load->helper('download');
		$data = file_get_contents('./uploads/avances/'.$archivo);
		force_download($archivo, $data);
	}
	public function calificar()
	{
		$idusu=$this->input->post('idusu');
		$idde=$this->input->post('idca');
		$pun=$this->input->post('ptg');
		$avance=$this->input->post('porce');
		$data = array(				
			'puntage' => $pun,
			'avance' => $avance,
			);
		$this->a->cali($data,$idde);
		$this->session->set_flashdata('ok','Se Guardo su Caslificacion');
		redirect('avances/avances_modal/ver/'.$idusu);
	}
	public function rehabilitar(){
		$id=$this->input->post('idre');
		$this->a->rehabil($id);
		$this->session->set_flashdata('ok','Se Rehabilito el Avance');
		redirect('avances/avances_modal');
	}
}