<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Becas_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('becas_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'beca' => $this->m->listabeca(),			
			 );
		
		$this->load->view($campo.'/becas/becas_modal',$data);
	}

	public function agregar(){
		if(empty($_FILES['fileimagen']['name'])){
			$id_usuario = $this->session->id;
			$titulo=$this->input->post('titulo');
			$descripcion=$this->input->post('desc');
			$fecha=$this->input->post('fecha');
			$data = array(
			'titulo' => $titulo ,
			'fecha' => $fecha,
			'descripcion'=> $descripcion,
			'imagen' => '',
			'id_usuario' => $id_usuario,
			 );          
			
		$this->m->agregarbeca($data);
		$this->session->set_flashdata('ok','Curso Agregado Exitosamente ');
		redirect('becas/becas_modal');			
		}
		else{
		$config['upload_path']   = './uploads/becas/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 5048;
        $config['max_width']     = 5024;
        $config['max_height']    = 5008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagen'))
          {
            redirect('becas/becas_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $id_usuario = $this->session->id;
			$titulo=$this->input->post('titulo');
			$descripcion=$this->input->post('desc');
			$fecha=$this->input->post('fecha');
			$data = array(
			'titulo' => $titulo ,
			'fecha' => $fecha,
			'descripcion'=> $descripcion,
			'imagen' => $file_info['file_name'],
			'id_usuario' => $id_usuario,
			 );          
			
		$this->m->agregarbeca($data);
		$this->session->set_flashdata('ok','Curso Agregado Exitosamente ');
		redirect('becas/becas_modal');
          }
      }
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('becas/becas_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'beca' => $this->m->getbeca($id),			
			 );

		$this->load->view($campo.'/becas/editbe',$data);
	}

	public function editar(){
		if(empty($_FILES['fileimagens']['name'])){
		$id=$this->input->post('txtId');
		$titulo=$this->input->post('titulo');
		$descripcion=$this->input->post('desc');
		$fecha=$this->input->post('fecha');
		$data = array(
			'titulo' => $titulo ,
			'fecha' =>$fecha,
			'descripcion'=> $descripcion,
			);
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Curso Modificado Exitosamente');
		redirect('becas/becas_modal');
	}else
	{
		$config['upload_path']   = './uploads/becas/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 2024;
        $config['max_height']    = 2008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagens'))
          {
            redirect('becas/becas_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $id=$this->input->post('txtId');
			$titulo=$this->input->post('titulo');
			$descripcion=$this->input->post('desc');
			$fecha=$this->input->post('fecha');
			$data = array(
			'titulo' => $titulo ,
			'fecha' => $fecha,
			'descripcion'=> $descripcion,
			'imagen' => $file_info['file_name'],
			 );          
			
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Curso Modificado Exitosamente');
		redirect('becas/becas_modal');
          }
	}
	}
}