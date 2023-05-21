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
		$this->load->view('Template/changePass');
		$this->load->view('cotizaciones/nwCotizacionCte');
		$this->load->view('cotizaciones/vwModals');
		$this->load->view('cotizaciones/allCotizaciones',$info);
		$this->load->view('Template/footer');
		
	}
	public function nwCotizacion(){
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Template/changePass');
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
		echo "aqui voy!";
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->CotizacionModel->nwCliente($data);
		print_r($result);
	}

	public function findCte(){
		$data = json_decode(file_get_contents("php://input"), true);
		print_r($data);	
	}

	public function searchData()
	    {
			$this->init('default');
	        $term = $this->input->get('term'); // Obtener el término de búsqueda desde la URL

	        // Realizar la consulta a la base de datos utilizando el término de búsqueda
	        $results = $this->db->like('RFC', $term)->get('vwallclients')->result();

	        // Devolver los resultados en formato JSON
	        echo json_encode($results);
	    }

}
 