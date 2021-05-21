<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
    }
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function database_backup()
	{
		$this->load->dbutil();
		$db_format=array('format'=>'zip','filename'=>'uatf_dicyt_backup.sql');
		$backup=& $this->dbutil->backup($db_format);
		$dbname='backup-on-'.date('Y_m_d_H_i_s').'.zip';
		$save='respaldo/'.$dbname;
		write_file($save,$backup);
		force_download($dbname,$backup);
	}
}
