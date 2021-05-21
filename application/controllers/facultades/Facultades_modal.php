<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facultades_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('facultades_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'facultades' => $this->m->listafacultad(),
			 );
		$this->load->view($campo.'/facultades/Facultades_modal',$data);
	}

	public function agregar(){
		$config['upload_path']   = './uploads/facultades/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 2024;
        $config['max_height']    = 2008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagen'))
          {
            redirect('facultades/facultades_modal');
          }
          else
          {
          	$file_info= $this->upload->data();          	
		        $config1['upload_path']   = './uploads/proyectos/facultades/';        
		        $config1['allowed_types'] = 'gif|jpg|png';
		        $config1['max_size']      = 2048;
		        $config1['max_width']     = 2024;
		        $config1['max_height']    = 2008;
		        $this->load->library('upload', $config1);
		        if ( ! $this->upload->do_upload('fileimagenr'))
		          {
		            redirect('facultades/facultades_modal');
		          }
		          else
		          {
		          	$file_info1= $this->upload->data();
		          	$nombre=mb_strtoupper($this->input->post('nombrefac'),'utf-8');
					$data = array(
					'nombre_facultad' => $nombre ,
					'imagen'=>$file_info['file_name'],
					'imagenr'=>$file_info1['file_name'], );
					$this->m->agregarfacultad($data);
					$this->session->set_flashdata('ok','Facultad Agregado Exitosamente');
					redirect('facultades/facultades_modal');
			}
		}
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('facultades/facultades_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'facultad' => $this->m->trae($id),
			);
		$this->load->view($campo.'/facultades/editfac',$data);
	}

	public function editar(){
		$id=$this->input->post('txtId');
		$nombre=mb_strtoupper($this->input->post('nombrefac'),'utf-8');
		$data = array(
			'nombre_facultad' => $nombre ,
			);
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Facultad Modificada Exitosamente');
		redirect('facultades/facultades_modal');
	}
	public function editImagen(){
		$id=$this->input->post('txtId');
		if(!empty($_FILES['file']['name'])){
			$config['upload_path']   = './uploads/facultades/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size']      = 7048;
	        $config['max_width']     = 5024;
	        $config['max_height']    = 5008;
	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('file'))
	          {
	            redirect('facultades/facultades_modal');
	          }
	          else
	          {
	          	$file_info= $this->upload->data();
	          	$data = array(
					'imagen'=>$file_info['file_name'],
					 );
					$this->m->edita($data,$id);
					$this->session->set_flashdata('ok','Imagen Modificada Exitosamente');
					redirect('facultades/facultades_modal/edit/'.$id);

		}
		}
	}
	public function editImagenr(){
		$id=$this->input->post('txtId');
		if(!empty($_FILES['file']['name'])){
			$config['upload_path']   = './uploads/facultades/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size']      = 7048;
	        $config['max_width']     = 5024;
	        $config['max_height']    = 5008;
	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('file'))
	          {
	            redirect('facultades/facultades_modal');
	          }
	          else
	          {
	          	$file_info= $this->upload->data();
	          	$data = array(
					'imagenr'=>$file_info['file_name'],
					 );
					$this->m->edita($data,$id);
					$this->session->set_flashdata('ok','Imagen Modificada Exitosamente');
					redirect('facultades/facultades_modal/edit/'.$id);

		}
		}
	}

	public function ver($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'datos' => $this->m->verinfo($id));
		$this->load->view($campo."/facultades/ver", $data);
	}
}