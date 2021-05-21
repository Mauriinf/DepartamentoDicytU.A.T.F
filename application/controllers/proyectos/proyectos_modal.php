<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('proyectos_m', 'm');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'proyecto' => $this->m->listaproy(),
			'estrap' => $this->m->getproy(),
			'estrat' => $this->m->gettipo(),
			 );
		$this->load->view($campo.'/proyectos/proyectos',$data);
	}
	public function docente()
	{
		$campo = $this->session->campo;
		$data = array(
			'proyecto' => $this->m->listaproyuser(),
			'estrap' => $this->m->getproy(),
			'estrat' => $this->m->gettipo(),
			 );
		$this->load->view($campo.'/proyectos/proyectos_doc',$data);
	}
	public function estudiante()
	{
		$campo = $this->session->campo;
		$data = array(
			'proyectoest' => $this->m->listaproyest(),
			'estrap' => $this->m->getproy(),
			'estrat' => $this->m->gettipo(),
			 );
		$this->load->view($campo.'/proyectos/proyectos_est',$data);
	}
	public function sociedad()
	{
		$campo = $this->session->campo;
		$data = array(
			'proyectosocie' => $this->m->listaproysociedad(),
			'estrap' => $this->m->getproy(),
			'estrat' => $this->m->gettipo(),
			 );
		$this->load->view($campo.'/proyectos/proyectos_socie',$data);
	}
	public function proy()
	{
		$campo = $this->session->campo;
		$data = array(
			'proyecto' => $this->m->lista_inv(),
			'estrap' => $this->m->getproy(),
			'estrat' => $this->m->gettipo(),
			 );
		$this->load->view($campo.'/proyectos/proyectos_inv',$data);
	}

	public function combocarrera(){
		
		if($this->input->post('facultad_id'))
		{
			echo $this->m->combocarrera($this->input->post('facultad_id'));
		}
	}

	public function agregar(){
	          		$id_auto=$this->session->id;
		          	$titulo=mb_strtoupper($this->input->post('titulo'));
		          	$objetivo=$this->input->post('objetivog');
		          	$resumen=$this->input->post('resumen');
		          	$conclu=$this->input->post('conclu');
		          	$tipo=$this->input->post('tipo');
		          	$fac=$this->input->post('facultadp');
		          	$carre=$this->input->post('carrerap');
		          	$autor=mb_strtoupper($this->input->post('autor'));
		          	$gestion=$this->input->post('gestion');
		          	$tipos=$this->input->post('tipoinves');
		          	$tutor=mb_strtoupper($this->input->post('tutor'));
		          	$this->form_validation->set_rules('titulo','titulo','is_unique[trabajo_investigacion.titulo_investigacion]');
		if ($this->form_validation->run()) {
					$data = array(				
						'id_facultad' => $fac,
						'id_carrera' => $carre,
						'titulo_investigacion' => $titulo,
						'autor' => $id_auto,
						'tipo_investigador' => $tipo,
						'objetivo_general' => $objetivo,
						'resumen' => $resumen,
						'conclusiones' => $conclu,
						'fecha' => date('y-m-d'),
						//'imagen' => $file_info['file_name'],
						'nombre_autor' => $autor,
						'gestion' => $gestion,
						'visitas' => 0,
						//'tipo' => $tipos,
						'tutor' => $tutor,
						'tipo_investigacion' => $tipos,
						);
					$this->m->agregarproyecto($data);
					$this->session->set_flashdata('ok','Proyecto Agregado Exitosamente');
					redirect('proyectos/proyectos_modal');
					}
		else{
			$this->session->set_flashdata('oki','ERROR..!!! El valor ya Existe');
		redirect('proyectos/proyectos_modal');
		}
	}

	public function subir(){
		$mi_archivo = 'fileimagen';
		$config['upload_path']   = './uploads/proyectos/archivo/';
		$config['file_name'] = 'dicyt'.'_'.date('Y_m_d_H_i_s');
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size']      = 50000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($mi_archivo))
          {
          	$this->session->set_flashdata('ok','error');
            redirect('proyectos/proyectos_modal');
          }
          else
          {
          	$file_info= $this->upload->data();
			$id=$this->input->post('idS');
			$data = array(				
						'archivo' => $file_info['file_name'],
						);
			$this->m->subir($data,$id);
			$this->session->set_flashdata('ok','Archivo subido Exitosamente');
			redirect('proyectos/proyectos_modal');
		}
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('proyectos/proyectos_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'proyecto' => $this->m->trae($id),
			'estrap' => $this->m->getproy(),
			'estrat' => $this->m->gettipo(),
			'carrera'=> $this->m->getcarrera(),
			);
		$this->load->view($campo.'/proyectos/editproy',$data);
	}

	public function editar(){
		if(empty($_FILES['fileimagenn']['name'])){
					$id=$this->input->post('txtId');
					$titulo=strtoupper($this->input->post('titulo'));
		          	$objetivo=$this->input->post('objetivog');
		          	$resumen=$this->input->post('resumen');
		          	$conclu=$this->input->post('conclu');
		          	$tipo=$this->input->post('tipo');
		          	$fac=$this->input->post('facultadp');
		          	$carre=$this->input->post('carrerap');
		          	$autor=strtoupper($this->input->post('autor'));
		          	$gestion=$this->input->post('gestion');
		          	$tipos=$this->input->post('tipoinves');
		          	$tutor=strtoupper($this->input->post('tutor'));
					$data = array(				
						'id_facultad' => $fac,
						'id_carrera' => $carre,
						'titulo_investigacion' => $titulo,
						'tipo_investigador' => $tipo,
						'objetivo_general' => $objetivo,
						'resumen' => $resumen,
						'conclusiones' => $conclu,
						'nombre_autor' => $autor,
						'gestion' => $gestion,
						//'tipo' => $tipos,
						'tutor' => $tutor,
						'tipo_investigacion' => $tipos,

						);
					$this->m->editproyecto($data,$id);
					$this->session->set_flashdata('ok','Proyecto Modificado Exitosamente');
					redirect('proyectos/proyectos_modal');
		}
			else{
		$config['upload_path']   = './uploads/proyectos/imagen/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 2024;
        $config['max_height']    = 2008;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileimagenn'))
          {
          	$this->session->set_flashdata('ok','error');
            redirect('proyectos/proyectos_modal');
          }
          else
          {
          	$file_info= $this->upload->data();
          	$id=$this->input->post('txtId');
	          		$titulo=$this->input->post('titulo');
		          	$objetivo=$this->input->post('objetivog');
		          	$resumen=$this->input->post('resumen');
		          	$conclu=$this->input->post('conclu');
		          	$tipo=$this->input->post('tipo');
		          	$fac=$this->input->post('facultadp');
		          	$carre=$this->input->post('carrerap');
		          	$autor=$this->input->post('autor');
		          	$gestion=$this->input->post('gestion');
		          	$tipos=$this->input->post('tipos');
					$data = array(				
						'id_facultad' => $fac,
						'id_carrera' => $carre,
						'titulo_investigacion' => $titulo,
						'tipo_investigador' => $tipo,
						'objetivo_general' => $objetivo,
						'resumen' => $resumen,
						'conclusiones' => $conclu,
						'imagen' => $file_info['file_name'],
						'nombre_autor' => $autor,
						'gestion' => $gestion,
						'tipo' => $tipos,
						);
					$this->m->editproyecto($data,$id);
					$this->session->set_flashdata('ok','Proyecto Modificado Exitosamente');
					redirect('proyectos/proyectos_modal');
		}
	}
	}
}