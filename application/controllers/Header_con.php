<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_con extends CI_Controller {
	public function __construct(){
		parent:: __construct();
	}
	public function index()
	{
		$this->load->model('facultades_m', 'fac');
		$data = array(
			'facultades' => $this->fac->listafacultad(),			
			 );
		$this->load->view('user/header',$data);
	}
	
}