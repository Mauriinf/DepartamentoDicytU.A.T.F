<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {
	public function __construct(){
		parent:: __construct();
	}
	public function index()
	{
		$this->load->model('portada_m', 'por');
		$this->load->model('convocatoria_m', 'con');
		$this->load->model('proyectos_m', 'pro');
		$this->load->model('facultades_m', 'fac');
		$this->load->model('becas_m', 'be');
		$this->load->model('publicacion_m', 'pu');
		$data = array(
			'convocatorias' => $this->con->listaconvus(),
			'proyectos' => $this->pro->listaproyuse(),
			'facultades' => $this->fac->listafacultad(),
			'proydoc' => $this->pro->listaproyusedoc(),
			'becas' => $this->be->listabeca(),
			'publi' => $this->pu->listapubuser(),
			'portada' => $this->por->listaportada(),		
			 );
		$this->load->view('user/index',$data);
	}
	public function contacto()
	{
		$this->load->view('user/contact');
	}
	public function recurso()
	{
		$this->load->model('recurso_m', 'recu');
		$data = array(
			'recurso' => $this->recu->listarecurso(),		
			 );
		$this->load->view('user/recursos',$data);
	}
	public function revista($id)
	{
		$this->load->model('revista_m', 'rev');
		$data = array(
			'revista' => $this->rev->listarevista($id),		
			 );
		$this->load->view('user/revista', $data);
	}
	public function historia()
	{
		$this->load->view('user/historia');
	}
	public function ligon()
	{
		$this->load->view('admin/admin/login');
	}
	public function mision()
	{
		$this->load->view('user/mision');
	}
	public function personal()
	{
		$this->load->model('personal_m', 'per');
		$data = array(
			'personal' => $this->per->listapersonal(),
			
			 );
		$this->load->view('user/personal',$data);
	}
	public function detalle($id,$cont)
	{
		$this->load->model('proyectos_m', 'de');
		$data = array(
			'deta' => $this->de->detallepro($id, $cont),
			
			 );
		$this->load->view('user/detalle', $data);
	}
	public function detalle_conv($id)
	{
		$this->load->model('convocatoria_m', 'conde');
		$data = array(
			'detalle' => $this->conde->listadetalle($id),
			);
		$this->load->view('user/detalle_conv',$data);
	}
	public function docente()
	{
		$this->load->model('proyectos_m', 'pro');		
		$data = array(
			'proyecto' => $this->pro->listaproyuser(),
			
			 );
		$this->load->view('user/inv_docente', $data);
	}
	public function proyectos()
	{
		$this->load->model('proyectos_m', 'pro');
		$data = array(
			'proyecto' => $this->pro->lista_inv(),
			 );
		$this->load->view('user/inv_gloval',$data);
	}
	public function estudiante()
	{
		$this->load->model('proyectos_m', 'pro');
		$data = array(
			'proest' => $this->pro->listaproyest(),
			
			 );
		$this->load->view('user/inv_estudiante', $data);
	}
	public function mostrartodo_est(){
		$this->session->unset_userdata('buscador');
		redirect(base_url().'User_controller/estudiante');	
	}
	public function busqueda_est(){
		$buscador=$this->input->post('busquedae');
		$this->session->set_userdata('buscador',$buscador);
		redirect(base_url().'User_controller/estudiante');
	}
	public function marco()
	{
		$this->load->view('user/marco_normativo');
	}
	public function sociedades()
	{
		$this->load->model('carreras_m','soci');
		$data = array(
			'pfac' => $this->soci->prufac(),
			'pcar' => $this->soci->prucar(),
			 );
		$this->load->view('user/soci_cientificas',$data);
	}
	public function convocatorias_investigacion()
	{
		$this->load->model('convocatoria_m', 'inves');
		$data = array(
			'investigacion' => $this->inves->convinves(),
			 );
		$this->load->view('user/convocatoria_inv',$data);
	}
	public function facultad($id)
	{
		$this->load->model('proyectos_m', 'facu');
		$data = array(
			'facultadd' => $this->facu->listafacul($id),
			'nomfacultadd' => $this->facu->nomfacul($id),
			'carreras' => $this->facu->nomcarre($id),
			);
		$this->load->view('user/ffccpp',$data);
	}
	public function carreras($idcarrera, $idfacultad)
	{
		$this->load->model('carreras_m', 'car');
		$this->load->model('proyectos_m', 'procar');
		$data = array(
			'carrera' => $this->procar->listaporcarrera($idcarrera),
			'nomcar' => $this->car->datocarrera($idcarrera),
			'nombrescarrera' => $this->car->getnomcar($idfacultad),
		 );
		$this->load->view('user/carreras', $data);
		
	}
	public function publicacion($id)
	{
		$this->load->model('publicacion_m', 'pub');
		$data = array(
			'publi' => $this->pub->lstpubli($id),
			'tipo' => $this->pub->tipo($id),
			 );
		$this->load->view('user/publicaciones',$data);
	}
	public function convenio($id)
	{
		$this->load->model('convenio_m', 'con');
		$data = array(
			'conve' => $this->con->lstcon($id),
			'tipo' => $this->con->tipo($id),
			 );
		$this->load->view('user/convenios',$data);
	}
	public function convocatoria_be()
	{
		$this->load->model('becas_m', 'be');
		$data = array(
			'becas' => $this->be->convbe(),
			 );
		$this->load->view('user/convo_beca',$data);
	}
	public function becadi()
	{
		$this->load->model('becas_m', 'be');
		$data =array(
			'becadi' => $this->be->listabeca(),
			);
		$this->load->view('user/becas',$data);
	}
	public function detalles($id)
	{
		$this->load->model('publicacion_m', 'pu');
		$data = array(
			'detalle' => $this->pu->listadetalle($id),
			'imagenes' => $this->pu->detalleimg($id),
			);
		$this->load->view('user/detalles',$data);
	}
	public function detalleconvenio($id)
	{
		$this->load->model('convenio_m', 'con');
		$data = array(
			'detalle' => $this->con->listadetalle($id),
			);
		$this->load->view('user/detalles_conve',$data);
	}
	public function detalle_be($id)
	{
		$this->load->model('becas_m', 'be');
		$data = array(
			'detalle' => $this->be->detallebeca($id),
			);
		$this->load->view('user/detalle_be',$data);
	}
	public function noticiaevento($id)
	{
		$idp = $id;
		$this->load->model('publicacion_m', 'pu');
		$data = array(
			'imagenes' => $this->pu->detalleimg($id),
			'id' =>$idp,
			);
		$this->load->view('user/img_noticias',$data);
	}
	public function email(){
		$mail=$this->input->post('email');
		$nombre=$this->input->post('name');
		$asunto=$this->input->post('subject');
		$mensaje=$this->input->post('message');
		$config = array( //"Array" changed to "array" 1/15/15        
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465, //465
            'smtp_user' => 'dicyt.uatf@gmail.com',
            'smtp_pass' => 'uatf2019',
            'mailtype' => 'text',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );        
        $this->load->library('email', $config); //$config        
        $this->email->set_newline("\r\n");        
        $this->email->from($mail,$nombre);        
        $this->email->to('miguel9820.dt@gmail.com');        
        $this->email->subject($asunto);        
        $this->email->message($mensaje);        
        // $this->email->send();        
        //echo $this->email->print_debugger();        
        if($this->email->send())
        {
        	$this->session->set_flashdata('ok','Se envio Exitosamente ');
			redirect('User_controller/contacto');
        }
        else
        {
            $this->session->set_flashdata('ok','Error No se envio ');
			redirect('User_controller/contacto');
        }
	}
	public function pdfdetalle($id,$cont)
	{
		$this->load->library('mypdf');
		$this->load->model('proyectos_m', 'de');
		//$html_content = '<h3 aling="center"> UNIVERSIDAD AUTONOMA "TOMAS FRIAS"</h3>';
		//$html_content .= $this->modelo->pdfdetalle($id);
		//$this->pdf->loadHtml($html_content);
		$data = array(
			'deta' => $this->de->detallepro($id,$cont),
			
			 );
		$this->mypdf->generate('user/detallepdf', $data, 'Detalle_Proyecto_Trabajo', 'A4', 'portrait');
		//$this->mypdf->generate('user/detallepdf', $data, 'laporan-mahasiswa', 'A4', 'landscape');
	}
}