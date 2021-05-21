<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carreras_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('carreras_m', 'm');
		$this->load->model('facultades_m', 'fa');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'carreras' => $this->m->listacarrera(),
			'estraf'=> $this->fa->getfacultad(),
			
			 );
		
		$this->load->view($campo.'/carreras/carreras_modal',$data);
	}

	public function agregar()
	{
		$config['upload_path']   = './uploads/carrera/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 2024;
        $config['max_height']    = 2008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
          {
            redirect('carreras/carreras_modal');
          }
          else
          {
          	$file_info= $this->upload->data();
			$idfa=$this->input->post('facultad');
			$nombrecarrera=mb_strtoupper($this->input->post('nomcarrera'),'utf-8');
			$data = array(
				'id_facultad' => $idfa ,
				'nombre_carrera'=> $nombrecarrera,
				'imagenc' => $file_info['file_name'],
				 );
			$this->m->agregarcarrera($data);
			$this->session->set_flashdata('ok','Carrera Agregado Exitosamente ');
			redirect('carreras/carreras_modal');
		}
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('carreras/carreras_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'carreras' => $this->m->getcarrera($id),
			'estraf'=> $this->m->getfacultad(),			
			 );

		$this->load->view($campo.'/carreras/editcarr',$data);
	}

	public function editar(){
		if(empty($_FILES['file']['name'])){
			$id=$this->input->post('txtId');
			$facu=mb_strtoupper($this->input->post('facu'),'utf-8');
			$carre=mb_strtoupper($this->input->post('nfac'),'utf-8');
			$data = array(
				'id_facultad' => $facu ,
				'nombre_carrera'=> $carre );
			$this->m->edita($data,$id);
			$this->session->set_flashdata('ok','Carrera Modificada Exitosamente');
			redirect('carreras/carreras_modal');
		}
		else{
			$config['upload_path']   = './uploads/carrera/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size']      = 7048;
	        $config['max_width']     = 5024;
	        $config['max_height']    = 5008;
	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('file'))
	          {
	            redirect('carreras/carreras_modal');
	          }
	          else
	          {
	          	$file_info= $this->upload->data();
	          	$id=$this->input->post('txtId');
				$facu=mb_strtoupper($this->input->post('facu'),'utf-8');
				$carre=mb_strtoupper($this->input->post('nfac'),'utf-8');
				$data = array(
					'id_facultad' => $facu ,
					'nombre_carrera'=> $carre,
					'imagenc' => $file_info['file_name'],
					);
				$this->m->edita($data,$id);
				$this->session->set_flashdata('ok','Carrera Modificada Exitosamente');
				redirect('carreras/carreras_modal');

	          }
	      }
	}

	public function ver($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'datos' => $this->m->verinfo($id));
		$this->load->view($campo."/carreras/ver", $data);
	}
}