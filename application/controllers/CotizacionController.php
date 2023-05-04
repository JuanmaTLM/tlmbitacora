<?php
date_default_timezone_set('America/Monterrey'); 

if (!defined('BASEPATH'))
 exit('No direct script access allowed');

class CotizacionController extends CI_Controller {
	public function __construct() {
		parent::__construct();
	$this->load->model("CotizacionModel");

	}
	private function init($dataBase){
		$this->CotizacionModel->init($dataBase);
	}

	public function index(){
		$info['allCotizaciones']=  $this->CotizacionModel->allCotizaciones();
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('cotizaciones/allCotizaciones',$info);
		$this->load->view('cotizaciones/vwModals');
		$this->load->view('Template/footer');
		
	}
	public function nwCotizacion(){
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('cotizaciones/nwCotizacionCte');
		$this->load->view('Template/footer');
	}
	public function getCotizaciones(){
		$this->init('cotizaciones');
		$result = $this->CotizacionModel->allCotizaciones();
		print_r(json_encode($result));
	}

	public function getClients(){
		$this->init('cotizaciones');
		$result = $this->CotizacionModel->allClients();
		print_r($result);
	}


	public function newCotizacion(){
		$data = file_get_contents("php://input");
		$result = $this->CotizacionModel->nwCliente($data);
		print_r($result);
	}

}
 