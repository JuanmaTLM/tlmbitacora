<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('MDashboard');
	}

	public function index()
	{
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Template/changePass');
		$this->load->view('dashboard/vwSubMenu');
		$this->load->view('Template/footer');

	}

}
