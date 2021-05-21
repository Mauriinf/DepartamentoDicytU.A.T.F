<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensajes_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('usuarios_m', 'm');
		$this->load->model('mensajes_m', 's');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'entrada' => $this->s->vermensajes($this->session->id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),
			
			 );
		//die(var_export($data));
			$this->load->view($campo.'/mensajes/mensajes',$data);		
	}

	public function ver($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'dato' => $this->s->vermesa($id),
			'dato1' => $this->s->actues($id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),
			);
		$this->load->view($campo.'/mensajes/ver',$data);
	}

	public function verI($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'dato' => $this->s->vermesaI($id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),
			);
		$this->load->view($campo.'/mensajes/verI',$data);
	}
	
	public function nuevo()
	{
		$campo = $this->session->campo;
		$data = array(
			'destinatarios' => $this->m->getusuari($this->session->id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),
			
			 );
		$this->load->view($campo.'/mensajes/nuevo',$data);
	}

	public function guardar()
	{
		if(empty($_FILES['attachment']['name'])){
			$id_emi=$this->session->id;
			$id_remi=$this->input->post('destinatario');
			$titu=$this->input->post('asunto');
			$men=$this->input->post('mensaje');
			$data = array(
				'id_emisor' => $id_emi ,
				'id_remitente' => $id_remi ,
				'titulo'=> $titu,
				'mensaje' => $men ,
				'fecha'=> date('Y-m-d H:i:s'),
				'leido' => '0',
				'eliminado'=> '0',
				 );
			$this->s->agregarmensaje($data);
			$this->session->set_flashdata('ok','Mensaje Enviado Exitosamente ');
			redirect('mensajes/mensajes_modal');
		}
		else{
		$config['upload_path']   = './uploads/mensajes/';
        $config['allowed_types'] = 'doc|docx|zip|rar|pdf';
        $config['max_size']      = 32000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('attachment'))
          {
            redirect('mensajes/mensajes_modal');
          }
          else
          {
          	$file_info= $this->upload->data(); 
			$id_emi=$this->session->id;
			$id_remi=$this->input->post('destinatario');
			$titu=$this->input->post('asunto');
			$men=$this->input->post('mensaje');
			$data = array(
				'id_emisor' => $id_emi ,
				'id_remitente' => $id_remi ,
				'titulo'=> $titu,
				'mensaje' => $men ,
				'fecha'=> date('Y-m-d H:i:s'),
				'archivo' => $file_info['file_name'],
				'leido' => '0',
				'eliminado'=> '0',
				 );
			$this->s->agregarmensaje($data);
			$this->session->set_flashdata('ok','Mensaje Enviado Exitosamente ');
			redirect('mensajes/mensajes_modal');
		}
		}
	}

	public function enviados()
	{
		$campo = $this->session->campo;
		$data = array(
			'entrada' => $this->s->verenviados($this->session->id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),			
			 );
		$this->load->view($campo.'/mensajes/enviados',$data);
	}
	
	public function eliminados()
	{
		$campo = $this->session->campo;
		$data = array(
			'entrada' => $this->s->vereliminados($this->session->id),
			'cuenta' => $this->s->contar($this->session->id),
			'cuentaen' => $this->s->contaren($this->session->id),
			'cuentael' => $this->s->contarel($this->session->id),			
			 );
		$this->load->view($campo.'/mensajes/eliminados', $data);
	}

	public function delete(){
		$idmensaje=$this->input->post('idmensaje');
		if($idmensaje >0){
			foreach ($_POST['idmensaje'] as $idmes) {
				 $this->s->delete($idmes);
			}
			redirect('mensajes/mensajes_modal');
		}
		else{
			echo '<script type="text/javascript">
           alert ("No Selecciono Ningun Mensaje para Eliminar..!!");
            history.go(-1);
           </script>';
		}		
	}

	public function borrar(){
		$idmensaje=$this->input->post('idmensaje');
		if($idmensaje >0){
			foreach ($_POST['idmensaje'] as $idmes) {
				 $this->s->borraeli($idmes);
			}
			redirect('mensajes/mensajes_modal');
		}
		else{
			echo '<script type="text/javascript">
           alert ("No Selecciono Ningun Mensaje para Eliminar..!!");
            history.go(-1);
           </script>';
		}		
	}
}