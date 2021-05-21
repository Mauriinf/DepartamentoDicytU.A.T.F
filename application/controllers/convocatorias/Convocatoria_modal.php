<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convocatoria_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('convocatoria_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'convocatorias' => $this->m->listaconv(),
			'estracon' => $this->m->gettipo()
			 );
		$this->load->view($campo.'/convocatorias/convocatoria',$data);
	}

	public function agregar(){
		$config['upload_path']   = './uploads/convocatorias/';
		$config['file_name'] = 'convo'.'_'.date('Y_m_d_H_i_s');
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
        $config['max_size']      = 5048;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagen'))
          {
            redirect('convocatorias/convocatoria_modal');
          }
          else
          {
            $file_info= $this->upload->data();

            //$this->load->library('image_lib'); 
			//$config = array();			 
			//$config['image_library'] = 'gd2';			 
			//$config['source_image'] = './uploads/convocatorias/'.$file_info['file_name'];
			//$config['create_thumb'] = FALSE;			 
			//$config['maintain_ratio'] = FALSE;
			//$config['quality'] = '100%'; 		 
			//$config['width'] = 1366;			 
			//$config['height'] = 700;			 
			//$this->image_lib->initialize($config);			 
			//$this->image_lib->resize();

            $titulo=strtoupper($this->input->post('titulo'));
	        $descripcion=$this->input->post('desc');
	        $resumen=$this->input->post('resumen');
	        $fechai=$this->input->post('fi');
	        $fechaf=$this->input->post('ff');
	        $tipo=$this->input->post('tipo_con');
			$data = array(
			'id_tipo_convocatoria' => $tipo,
			'titulo' => $titulo,
			'descripcion' => $descripcion,
			'resumen' => $resumen,
			'fecha_inicio' => $fechai,
			'fecha_final' => $fechaf,
			'archivo' => $file_info['file_name'],
			'estado' => 1,
			);
		$this->m->agregarconv($data);
		$this->session->set_flashdata('ok','Convocatoria Agregado Exitosamente');
		redirect('convocatorias/Convocatoria_modal');
          }
	}       
	

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('convocatorias/convocatoria_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'convo' => $this->m->trae($id),
			'tipocon' => $this->m->gettipo(),
			);
		$this->load->view($campo.'/convocatorias/editconv',$data);
	}

	public function editar(){
		if(empty($_FILES['fileimagens']['name'])){
			$id=$this->input->post('txtId');
			$titulo=strtoupper($this->input->post('titulo'));
	        $descripcion=$this->input->post('desc');
	        $resumen=$this->input->post('resumen');
	        $fechai=$this->input->post('fi');
	        $fechaf=$this->input->post('ff');
	        $tipo=$this->input->post('tipo_con');
			$data = array(
			'id_tipo_convocatoria' => $tipo,
			'titulo' => $titulo,
			'descripcion' => $descripcion,
			'resumen' => $resumen,
			'fecha_inicio' => $fechai,
			'fecha_final' => $fechaf,
			'estado' => 1,
			);
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Convocatoria Modificado Exitosamente');
		redirect('convocatorias/convocatoria_modal');
		}
		else{
		$config['upload_path']   = './uploads/convocatorias/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
        $config['max_size']      = 5048;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagens'))
          {
            redirect('convocatorias/convocatoria_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $id=$this->input->post('txtId');
            $titulo=strtoupper($this->input->post('titulo'));
	        $descripcion=$this->input->post('desc');
	        $resumen=$this->input->post('resumen');
	        $fechai=$this->input->post('fi');
	        $fechaf=$this->input->post('ff');
	        $tipo=$this->input->post('tipo_con');
			$data = array(
			'id_tipo_convocatoria' => $tipo,
			'titulo' => $titulo,
			'descripcion' => $descripcion,
			'resumen' => $resumen,
			'fecha_inicio' => $fechai,
			'fecha_final' => $fechaf,
			'archivo' => $file_info['file_name'],
			'estado' => 1,
			);
			$this->m->edita($data,$id);
			$this->session->set_flashdata('ok','Convocatoria Modificado Exitosamente');
			redirect('convocatorias/convocatoria_modal');
			}
        }
	}
}