<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('calendario_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}	
	}

	public function index()
	{
		$campo = $this->session->campo;
		$this->load->view($campo.'/calendario/calendario_modal');
	}

	public function geteventos(){		
		$r = $this->m->geteventos();
		echo json_encode($r);
	}
	public function geteventosdir(){		
		$r = $this->m->geteventosdir();
		echo json_encode($r);
	}

	public function guardar(){
		$nombre=$this->input->post('nomeven');
		$feini=$this->input->post('fini');
		$fefin=$this->input->post('ffin');
		$nuevafecha = strtotime ( '+1 day' , strtotime ( $fefin ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		$color=$this->input->post('fondo');
		$url=$this->input->post('link');
		$data = array(
			'titulo' => $nombre,
			'fecha_inicio' => $feini,
			'fecha_final' => $nuevafecha,
			'color' => $color,
			'link' => $url,
			'color_texto' => '#FFFFFF',
			'id_usuario' => $this->session->id,
			);
		$this->m->agregar($data);
		$this->session->set_flashdata('ok','Evento Agregado Exitosamente');
		redirect('calendario/calendario_modal');
	}

	public function lista()
	{
		$campo = $this->session->campo;
		$data = array(
			'eventos' => $this->m->listaeventos(),
			 );
		$this->load->view($campo.'/calendario/calendario_lista', $data);
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('calendario/calendario_modal/lista');
	}

	public function ver($ide){

		$campo = $this->session->campo;
		$data = array(
			'eventos' => $this->m->infoeventos($ide,$this->session->id),
			'eve' => $this->m->infodeta($ide),
			 );
		$this->load->view($campo.'/calendario/ver', $data);
	}

	public function subir(){
		$config['upload_path']   = './uploads/avances/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size']      = 100024;
        //$config['max_width']     = 2024;
        //$config['max_height']    = 2008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagen'))
          {
            redirect('calendario/calendario_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $idavan=$this->input->post('iddet');
	        $idusu=$this->session->id;
	        $fecha=date('y-m-d');
			$data = array(
			'id_avance' => $idavan,
			'id_usuario' => $idusu,
			'archivo' => $file_info['file_name'],
			'fecha'=>$fecha,
			'puntage'=>0,
			'estado' => 1,
			);
		$this->m->agregardeta($data);
		$this->session->set_flashdata('ok','Archivo Subido Exitosamente');
		redirect('calendario/calendario_modal');
          }
	}
	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'event' => $this->m->getevent($id),			
			 );

		$this->load->view($campo.'/calendario/calendarioedit',$data);
	}
	public function editar(){
		$id=$this->input->post('txtId');
		$nombre=$this->input->post('nomeven');
		$feini=$this->input->post('fini');
		$fefin=$this->input->post('ffin');
		$nuevafecha = strtotime ( '+1 day' , strtotime ( $fefin ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		$color=$this->input->post('fondo');
		$url=$this->input->post('link');
		$data = array(
			'titulo' => $nombre,
			'fecha_inicio' => $feini,
			'fecha_final' => $nuevafecha,
			'color' => $color,
			'link' => $url,
			'color_texto' => '#FFFFFF', );
		$this->m->edita($data, $id);
		$this->session->set_flashdata('ok','Evento Modificado Exitosamente');
		redirect('calendario/calendario_modal');
	}
}