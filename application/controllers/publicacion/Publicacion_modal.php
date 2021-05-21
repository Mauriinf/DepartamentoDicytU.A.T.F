<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion_modal extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('publicacion_m', 'm');
		$this->load->model('revista_m', 'rev');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$campo = $this->session->campo;
		$data = array(
			'publi' => $this->m->listapub(),
			'esti'=> $this->m->gettipo(),
			
			 );
		
		$this->load->view($campo.'/publicaciones/publicacion_modal',$data);
	}

	public function agregar(){
		$id_usuario = $this->session->id;
		$titulo=$this->input->post('titulo');
		$descripcion=$this->input->post('desc');
		$fecha=$this->input->post('fecha');
		$tipo=$this->input->post('tipo');
		$data = array(
			'titulo' => $titulo ,
			'fecha' => $fecha,
			'descripcion'=> $descripcion,
			'id_tipo_publi' => $tipo,
			'id_usuario' => $id_usuario,
			 );
		$this->m->agregarpubli($data);
		$this->session->set_flashdata('ok','Publicación Agregado Exitosamente ');
		redirect('publicacion/publicacion_modal');
	}

	public function eliminar(){
		$id=$this->input->post('idBor');
		$this->m->borrar($id);
		$this->session->set_flashdata('ok','Se Elimino Exitosamente');
		redirect('publicacion/publicacion_modal');
	}

	public function edit($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'publi' => $this->m->getpubli($id),
			'tipo'=> $this->m->gettipo(),			
			 );

		$this->load->view($campo.'/publicaciones/editpub',$data);
	}

	public function editar(){
		$id=$this->input->post('txtId');
		$titulo=$this->input->post('titulo');
		$descripcion=$this->input->post('desc');
		$id_tipo=$this->input->post('tipo');
		$data = array(
			'titulo' => $titulo ,
			'descripcion'=> $descripcion,
			'id_tipo_publi' => $id_tipo, );
		$this->m->edita($data,$id);
		$this->session->set_flashdata('ok','Publicacion Modificado Exitosamente');
		redirect('publicacion/publicacion_modal');
	}
	public function listarev($id)
	{
		$campo = $this->session->campo;
		$data = array(
			'revista' => $this->rev->listarevista($id),
			'id' => $id,		
			 );
		$this->load->view($campo.'/publicaciones/insert_img', $data);
	}
	public function agregarImage(){
		$id_pub=$this->input->post('txtId');
		$data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];
                $uploadPath = 'uploads/revistas/';
                $config['upload_path'] = $uploadPath;
                $config['file_name'] = 'dicyt_revista'.'_'.$id_pub.'_'.$_FILES['userFile']['name'];
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                //$config['min_width']     = 700;
        		//$config['min_height']    = 900;
        		//$config['max_width']     = 3700;
        		//$config['max_height']    = 3900;                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['id_publicacion'] = $id_pub;
                    $uploadData[$i]['nombre_foto'] = $fileData['file_name'];
                }
            }            
            if(!empty($uploadData)){
                $insert = $this->rev->insert($uploadData);
                $statusMsg = $insert?'Subido Exitosamente.':'Ocurrio un Problema';
                $this->session->set_flashdata('ok',$statusMsg);
            }
        }
        redirect('publicacion/publicacion_modal');	
	}
	public function agregarImageNoti(){
		$id_pub=$this->input->post('txtId');
		$mi_archivo = 'userFiles';
		$config['upload_path']   = './uploads/noticias/';
		$config['file_name'] = 'noticia'.'_'.date('Y_m_d_H_i_s');
        $config['allowed_types'] = 'gif|png|jpg|jpeg';
        $config['max_size']      = 50000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($mi_archivo))
          {
            redirect('publicacion/publicacion_modal');
          }
          else
          {
          	$file_info= $this->upload->data();
			$data = array(				
						'id_publi' => $id_pub,
						'nombre' => $file_info['file_name'],
						);
			$this->m->insertnoti($data,$id);
			$this->session->set_flashdata('ok','Imagen subido Exitosamente');
			redirect('publicacion/publicacion_modal');
		}	
	}
	public function subirA(){
		$id_pub=$this->input->post('txtId');
		$ca= date("YHs_");
		$nombre='revista';
			if(!empty($_FILES)){     
			    $upload_dir = "uploads/revistas/";
				$filetype =  $_FILES['file']['type'];
				$type = substr($filetype, (strpos($filetype,"/"))+1);
				$types=array("jpeg","gif","png","jpg");
				if(in_array($type, $types)){
				$fileName = ("$ca".$nombre.'.'.$type);
			    //$fileName = $_FILES['file']['name'];
			    $uploaded_file = $upload_dir.$fileName;    
			    if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){
			        //insert file information into db table
			        //$this->db->query("INSERT INTO fotos_publicaciones (id_publicacion, nombre_foto) VALUES ('".$id_pub."'','".$fileName."')");
					//mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
					$data = array('id_publicacion' => $id_pub ,
					'nombre_foto' => $fileName, );
					$this->rev->insert($data);	
			    }
			}}
			else{
				//echo "Solo imagenes jpg,png,gif";
				return 0;
			}
	}
}