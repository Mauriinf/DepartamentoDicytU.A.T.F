<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('usuarios_m', 'm');
		$this->load->model('proyectos_m', 'p');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'usuario' => $this->m->listausuario(),
			'estraf' => $this->m->getrol(),
			'estrap' => $this->p->getproy(),			
			 );		
		$this->load->view($campo.'/usuarios/usuario',$data);
	}

	public function agregar(){
		$config['upload_path']   = './uploads/user_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagen'))
          {
            redirect('administrador/usuarios_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $nombre=$this->input->post('nomu');
			$apat=$this->input->post('apat');
			$amat=$this->input->post('amat');
			$carnet=$this->input->post('ci');
			$direccion=$this->input->post('direc');
			$telefono=$this->input->post('telf');
			$email=$this->input->post('email');
			//$usuario=$this->input->post('usu');
			//$pass=$this->input->post('contra');
			$rol=$this->input->post('rol');
			$fac=$this->input->post('facultadp');
		    $carre=$this->input->post('carrerap');
		    $tipoinv=$this->input->post('RadioGroup1');
			$data = array(
			'nombre_completo' => $nombre,
			'apellido_pat' => $apat,
			'apellido_mat' => $amat,
			'usuario' => $nombre.' '.$apat,
			'contrasena' => base64_encode($carnet),
			'ci' => $carnet,
			'direccion' => $direccion,
			'telefono' => $telefono,
			'email' => $email,
			'rol_id' => $rol,
			'id_facultad' => $fac,
			'id_carrera' => $carre,
			'estado' => 1,
			'imagen' => $file_info['file_name'],
			'tipo_investigador' => $tipoinv,
			'gestion' => date('Y'),
			 );
		$this->m->agregarusu($data);
		$this->session->set_flashdata('ok','Agregado Exitosamente ');
		redirect('administrador/usuarios_modal');
          }
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('administrador/usuarios_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'usuario' => $this->m->getusu($id),
			'estra'=> $this->m->getrol(),
			'estrap' => $this->p->getproy(),
			'carrera'=> $this->p->getcarrera(),			
			 );

		$this->load->view($campo.'/usuarios/editusu',$data);
	}

	public function editar(){
		if(empty($_FILES['fileimagens']['name'])){
			$id=$this->input->post('txtId');
		$nombre=$this->input->post('nomu');
		$apat=$this->input->post('apat');
		$amat=$this->input->post('amat');
		$carnet=$this->input->post('ci');
		$direccion=$this->input->post('direc');
		$telefono=$this->input->post('telf');
		$email=$this->input->post('email');
		$usuario=$this->input->post('usu');
		$pass=$this->input->post('contra');
		$rol=$this->input->post('rol');
		$fac=$this->input->post('facultadp');
		$carre=$this->input->post('carrerap');
		$data = array(
			'nombre_completo' => $nombre,
			'apellido_pat' => $apat,
			'apellido_mat' => $amat,
			'usuario' => $usuario,
			'contrasena' => base64_encode($pass),
			'ci' => $carnet,
			'direccion' => $direccion,
			'telefono' => $telefono,
			'email' => $email,
			'rol_id' => $rol,
			'id_facultad' => $fac,
			'id_carrera' => $carre,
			'estado' => 1
			 );
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Usuario Modificado Exitosamente');
		redirect('administrador/usuarios_modal');
		}
		else{
		$config['upload_path']   = './uploads/user_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagens'))
          {
            redirect('administrador/usuarios_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $id=$this->input->post('txtId');
            $nombre=$this->input->post('nomu');
			$apat=$this->input->post('apat');
			$amat=$this->input->post('amat');
			$carnet=$this->input->post('ci');
			$direccion=$this->input->post('direc');
			$telefono=$this->input->post('telf');
			$email=$this->input->post('email');
			$usuario=$this->input->post('usu');
			$pass=$this->input->post('contra');
			$rol=$this->input->post('rol');
			$fac=$this->input->post('facultadp');
			$carre=$this->input->post('carrerap');
			$data = array(
			'nombre_completo' => $nombre,
			'apellido_pat' => $apat,
			'apellido_mat' => $amat,
			'usuario' => $usuario,
			'contrasena' => base64_encode($pass),
			'ci' => $carnet,
			'direccion' => $direccion,
			'telefono' => $telefono,
			'email' => $email,
			'rol_id' => $rol,
			'id_facultad' => $fac,
			'id_carrera' => $carre,
			'estado' => 1,
			'imagen' => $file_info['file_name'],
			 );
			$this->m->edita($data,$id);
			$this->session->set_flashdata('ok','Usuario Modificado Exitosamente');
			redirect('administrador/usuarios_modal');
			}
        }
	}
	public function editp($id){
		$campo = $this->session->campo;
		$data = array(
			'usuario' => $this->m->getusu($id),			
			 );
		$this->load->view($campo.'/usuarios/editper',$data);
	}
	public function editarper(){
		if(empty($_FILES['fileimagens']['name'])){
			$id=$this->input->post('txtId');
		$nombre=$this->input->post('nomu');
		$apat=$this->input->post('apat');
		$amat=$this->input->post('amat');
		$carnet=$this->input->post('ci');
		$direccion=$this->input->post('direc');
		$telefono=$this->input->post('telf');
		$email=$this->input->post('email');
		$usuario=$this->input->post('usu');
		$pass=$this->input->post('contra');
		$data = array(
			'nombre_completo' => $nombre,
			'apellido_pat' => $apat,
			'apellido_mat' => $amat,
			'usuario' => $usuario,
			'contrasena' => base64_encode($pass),
			'ci' => $carnet,
			'direccion' => $direccion,
			'telefono' => $telefono,
			'email' => $email,
			'estado' => 1
			 );
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Datos Modificados Exitosamente');
		redirect('panel');
		}
		else{
		$config['upload_path']   = './uploads/user_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagens'))
          {
            redirect('administrador/usuarios_modal');
          }
          else
          {
            $file_info= $this->upload->data();
            $id=$this->input->post('txtId');
            $nombre=$this->input->post('nomu');
			$apat=$this->input->post('apat');
			$amat=$this->input->post('amat');
			$carnet=$this->input->post('ci');
			$direccion=$this->input->post('direc');
			$telefono=$this->input->post('telf');
			$email=$this->input->post('email');
			$usuario=$this->input->post('usu');
			$pass=$this->input->post('contra');
			$data = array(
			'nombre_completo' => $nombre,
			'apellido_pat' => $apat,
			'apellido_mat' => $amat,
			'usuario' => $usuario,
			'contrasena' => base64_encode($pass),
			'ci' => $carnet,
			'direccion' => $direccion,
			'telefono' => $telefono,
			'email' => $email,
			'estado' => 1,
			'imagen' => $file_info['file_name'],
			 );
			$this->m->edita($data,$id);
			$this->session->set_flashdata('ok','Datos Modificados Exitosamente');
			redirect('panel');
			}
        }
	}
}