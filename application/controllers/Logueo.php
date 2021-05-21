<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logueo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("usuarios_m");
	}

	public function index(){
		if ($this->session->userdata("login")) {
			redirect(base_url()."panel");
		}
		else{
			$this->load->view("admin/login");
		}
	}

	public function login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$res = $this->usuarios_m->login($username, base64_encode($password));
		if (!$res) {
			$this->session->set_flashdata("error", "El Usuario y/o Contraseña son Incorrectos");
			echo '<script>alert ("El Usuario y/o Contraseña son Incorrectos");
           		window.location="'.base_url().'";</script>';
		}
		else{
			$data = array(
				'id' => $res->id_usuario ,
				'nombre'=>$res->nombre_completo,
				'ap_pat'=>$res->apellido_pat,
				'ap_mat'=>$res->apellido_mat,
				'ci' =>$res->ci,
				'dir'=>$res->direccion,
				'telf'=>$res->telefono,
				'mail'=>$res->email,
				'cont'=>$res->contrasena,
				'usu'=>$res->usuario,
				'rol'=>$res->rol_id,
				'facultad'=>$res->id_facultad,
				'carrera'=>$res->id_carrera,
				'img'=>$res->imagen,
				'campo'=>$res->nombre,
				'login'=>TRUE );
			if ($res->nombre=='admin') {
				$this->session->set_userdata($data);
				redirect(base_url()."panel");
			}
			if ($res->nombre=='director') {
				$this->session->set_userdata($data);
				redirect(base_url()."panel/admin");
			}
			if ($res->nombre=='usuario') {
				$this->session->set_userdata($data);
				redirect(base_url()."panel/usuario");
			}
			if ($res->nombre=='coordinador') {
				$this->session->set_userdata($data);
				redirect(base_url()."panel/coordinador");
			}

		}
	}

	public function cerrar(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
