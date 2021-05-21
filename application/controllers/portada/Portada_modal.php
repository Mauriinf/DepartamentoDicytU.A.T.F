<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portada_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('portada_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'portada' => $this->m->listaportada(),
			//'estraf' => $this->m->getcargo()
			 );
		$this->load->view($campo.'/portada/portada',$data);
	}

	public function agregar(){
		$config['upload_path']   = './uploads/portada/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']    = '5024';
        $config['max_width']  = '3200';
        $config['max_height']  = '3200';
        $config['min_width']     = '900';
        $config['min_height']    = '800';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagen'))
          {
          	$this->session->set_flashdata('ok','ERROR, Imagen pequeña o Formato no Valido');
            redirect('portada/portada_modal');
            
          }
          else
          {
          	$file_info= $this->upload->data();
          	$this->load->library('image_lib'); 
			$config = array();			 
			$config['image_library'] = 'gd2';			 
			$config['source_image'] = './uploads/portada/'.$file_info['file_name'];
			$config['create_thumb'] = FALSE;			 
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '300%'; 		 
			$config['width'] = 1566;			 
			$config['height'] = 968;			 
			$this->image_lib->initialize($config);			 
			$this->image_lib->resize();

			$titulo=strtoupper($this->input->post('titulo'));
			$desc=$this->input->post('desc');
			$data = array(				
				'imagen' => $file_info['file_name'],
				'titulo' => $titulo,
				'descripcion' => $desc,
				'usuario' => $this->session->id,
				);
			$this->m->agregarportada($data);
			$this->session->set_flashdata('ok','Portada Agregado Exitosamente');
			redirect('portada/portada_modal');
		}
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('portada/portada_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'portadas' => $this->m->trae($id),
			);
		$this->load->view($campo.'/portada/editpor',$data);
	}

	public function editar(){
		if(empty($_FILES['fileimagenp']['name'])){
		$id=$this->input->post('txtId');
		$titulo=strtoupper($this->input->post('titulo'));
		$desc=$this->input->post('desc');
		$data = array(
			'titulo' => $titulo,
			'descripcion' => $desc,
			);
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Portada Modificado Exitosamente');
		redirect('portada/portada_modal');
		}
		else{
		$config['upload_path']   = './uploads/portada/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']    = '5024';
        $config['max_width']     = '3024';
        $config['max_height']    = '3008';
        $config['min_width']     = '900';
        $config['min_height']    = '800';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagenp'))
          {
            redirect('portada/portada_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $this->load->library('image_lib'); 
			$config = array();			 
			$config['image_library'] = 'gd2';			 
			$config['source_image'] = './uploads/portada/'.$file_info['file_name'];
			$config['create_thumb'] = FALSE;			 
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '300%'; 		 
			$config['width'] = 1566;			 
			$config['height'] = 968;			 
			$this->image_lib->initialize($config);			 
			$this->image_lib->resize();
            $id=$this->input->post('txtId');
            $titulo=strtoupper($this->input->post('titulo'));
		$desc=$this->input->post('desc');
		$data = array(				
			'imagen' => $file_info['file_name'],
			'titulo' => $titulo,
			'descripcion' => $desc,			 
			);
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Portada Modificado Exitosamente');
		redirect('portada/portada_modal');
		}

	}
	}
}