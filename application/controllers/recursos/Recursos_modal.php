<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recursos_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('recurso_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'recurso' => $this->m->listarecurso(),
			
			 );
		
		$this->load->view($campo.'/recurso/recurso_modal',$data);
	}

	public function agregar(){
		$config['upload_path']   = './uploads/recurso/';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size']      = 5048;
        $config['max_width']     = 3024;
        $config['max_height']    = 3008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
          {
            redirect('recursos/recursos_modal');
          }
          else
          {
          	$file_info= $this->upload->data();
			$titulo=$this->input->post('titulo');
			$descripcion=$this->input->post('obj');
			$fecha=$this->input->post('area');
			$tipo=$this->input->post('url');
			$data = array(
				'nombre' => $titulo ,
				'objetivo'=> $descripcion,
				'area' => $fecha,
				'url' => $tipo,
				'imagen' => $file_info['file_name'],
				'id_usuario' => $this->session->id,
				 );
			$this->m->agregarrecurso($data);
			$this->session->set_flashdata('ok','Recurso Bibliografico Agregado Exitosamente ');
			redirect('recursos/recursos_modal');
		}
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('recursos/recursos_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'recursos' => $this->m->getrecurso($id),			
			 );

		$this->load->view($campo.'/recurso/editrecu',$data);
	}

	public function editar(){
		if(empty($_FILES['file1']['name'])){
			$id=$this->input->post('txtId');
			$titulo=$this->input->post('titulo');
			$descripcion=$this->input->post('obj');
			$fecha=$this->input->post('area');
			$tipo=$this->input->post('url');
			$data = array(
				'nombre' => $titulo ,
				'objetivo'=> $descripcion,
				'area' => $fecha,
				'url' => $tipo,
				 );
			$this->m->edita($data,$id);
			$this->session->set_flashdata('ok','Recurso Bibliografico Modificado Exitosamente');
			redirect('recursos/recursos_modal');
		}
		else{
		$config['upload_path']   = './uploads/recurso/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 2024;
        $config['max_height']    = 2008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file1'))
          {
            redirect('recursos/recursos_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $id=$this->input->post('txtId');
            $titulo=$this->input->post('titulo');
			$descripcion=$this->input->post('obj');
			$fecha=$this->input->post('area');
			$tipo=$this->input->post('url');
			$data = array(
				'nombre' => $titulo ,
				'objetivo'=> $descripcion,
				'area' => $fecha,
				'url' => $tipo,
				'imagen' => $file_info['file_name'],
				'id_usuario' => $this->session->id,
				 );
			$this->m->edita($data,$id);
			$this->session->set_flashdata('ok','Recurso Bibliografico Modificado Exitosamente');
			redirect('recursos/recursos_modal');
		}
		}
	}
}