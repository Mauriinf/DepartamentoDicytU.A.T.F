<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('personal_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'personal' => $this->m->listapersonal(),
			'estraf' => $this->m->getcargo()
			 );
		$this->load->view($campo.'/personal/personal',$data);
	}

	public function agregar(){
		$config['upload_path']   = './uploads/personal/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 5048;
        $config['max_width']     = 3024;
        $config['max_height']    = 3008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagen'))
          {
            redirect('personal/personal_modal');
          }
          else
          {
          	$file_info= $this->upload->data();
			$nombrec=$this->input->post('nomco');
			$apat=$this->input->post('apat');
			$amat=$this->input->post('amat');
			$cargo=$this->input->post('cargo');
			$correo=$this->input->post('email');
			$data = array(				
				'nombre_completo' => $nombrec,
				'apellido_pat' => $apat,
				'apellido_mat' => $amat,
				'id_cargo' => $cargo,
				'correo' => $correo,
				'imagen' => $file_info['file_name'] 
				);
			$this->m->agregarpersonal($data);
			$this->session->set_flashdata('ok','Personal Agregado Exitosamente');
			redirect('personal/personal_modal');
		}
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('personal/personal_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'personal' => $this->m->trae($id),
			'cargo' => $this->m->getcargo(),
			);
		$this->load->view($campo.'/personal/editper',$data);
	}

	public function editar(){
		if(empty($_FILES['fileimagens']['name'])){
		$id=$this->input->post('txtId');
		$nombrec=$this->input->post('nomc');
		$apat=$this->input->post('apat');
		$amat=$this->input->post('amat');
		$cargo=$this->input->post('cargo');
		$correo=$this->input->post('email');
		$data = array(				
			'nombre_completo' => $nombrec,
			'apellido_pat' => $apat,
			'apellido_mat' => $amat,
			'id_cargo' => $cargo,
			'correo' => $correo,
			);
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Personal Modificado Exitosamente');
		redirect('personal/personal_modal');
		}
		else{
		$config['upload_path']   = './uploads/personal/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 2024;
        $config['max_height']    = 2008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagens'))
          {
            redirect('personal/personal_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $id=$this->input->post('txtId');
		$nombrec=$this->input->post('nomc');
		$apat=$this->input->post('apat');
		$amat=$this->input->post('amat');
		$cargo=$this->input->post('cargo');
		$correo=$this->input->post('email');
		$data = array(				
			'nombre_completo' => $nombrec,
			'apellido_pat' => $apat,
			'apellido_mat' => $amat,
			'id_cargo' => $cargo,
			'correo' => $correo,
			'imagen' => $file_info['file_name'] 			 
			);
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Personal Modificado Exitosamente');
		redirect('personal/personal_modal');
		}

	}
	}
}