<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientsController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ClientsModel');
	}

	public function index()
	{
		$info['allClients'] = $this->ClientsModel->allClients();

		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Clientes/vwPpalCtes');
		$this->load->view('Clientes/modNewCte');
		if(!$info['allClients']){
			$this->load->view('Clientes/vwListaClientes');
		}else{
			$this->load->view('Clientes/vwListaClientes',$info);
		}
		
		$this->load->view('Template/footer');

	}

	public function fillClients(){
		$result = $this->ClientsModel->allCtesRef();
		print_r(json_encode($result));
	}

	public function addClient(){
		if($this->ClientsModel->addClient()){
			if(isset($_POST['cteRef'])){
				header("Location:" . site_url('listRef'));
				die();
			}else{
				$this->index();
			}
		}
		else{

		}

	}

}
