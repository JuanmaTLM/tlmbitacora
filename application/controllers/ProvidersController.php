<?php
date_default_timezone_set('America/Monterrey'); 

if (!defined('BASEPATH'))
 exit('No direct script access allowed');

class ProvidersController extends CI_Controller {
	public function __construct() {
		parent::__construct();
	$this->load->model("MUsers");
	$this->load->model("ProvidersModel");

	}
	private function init($dataBase){
		$this->ProvidersModel->init($dataBase);
	}

	public function index(){
		$idUser = $_SESSION['user']['userId'];
		$UserType = $_SESSION['user']['IdType'];

		$info['allProviders'] = $this->ProvidersModel->getProviders($idUser,$UserType);
		$info['allUsers'] = $this->MUsers->getUsers();

		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Template/changePass');
		$this->load->view('Providers/allProviders',$info);
		$this->load->view('Providers/modNwProvider');
		$this->load->view('Template/footer');
		
	}

	

	public function getProviders(){
		$this->init('providers');
		$result = $this->ProvidersModel->getProviders();
		print_r(json_encode($result));
	}

	public function addService(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->addService($data);
		print_r($result);
	}

	public function delService(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->delService($data);
		print_r($result);
	}

	public function findService(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->findService($data);
		print_r(json_encode($result[0]));
	}

	public function editService(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->editService($data);
		print_r($result);
	}

	public function getProviderData(){
		$this->init('providers');
		$provider = $this->ProvidersModel->getProviderData();
		$fletes = $this->ProvidersModel->getProviderFletes();
		$services = $this->ProvidersModel->getProviderServices();
		$info['provider'] = json_encode($provider);
		$info['fletes'] =  json_encode($fletes);
		$info['services'] = json_encode($services);
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Providers/tblInfoProvider',$info);
		$this->load->view('Template/footer');

	}




	public function addAddress(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->addAddress($data);
		print_r($result);
	}

	public function nwProvider(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->nwProvider($data);
		echo $result;
	}

	public function editProvider(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->editProvider($data);
		//print_r( $result);
		echo $result;
	}

	public function addServices(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->addServices($data);
		//print_r($result);
		echo $result;
	}
	public function addFletes(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->addFletes($data);
		//print_r($result);
		echo $result;
	}


	public function getTypeFletes(){
		$this->init('providers');
		$data = file_get_contents("php://input");
		$result = $this->ProvidersModel->getTypeFletes();
		print_r(json_encode($result));
		//echo $result;
	}


}