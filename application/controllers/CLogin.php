<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('MUsers');
		$this->load->model("ProvidersModel");

	}

	public function init($dataBase){
		$this->MUsers->init('default');
	}

	public function index()
	{
		$this->load->view('Login/vwLogin');
	}
	public function login(){
		$result = $this->MUsers->log_in();
		if(!$result){
			return false;
		}
		else{ 
			$user = [
				'userId' => $result[0]['userId'],
				'usuario' => $result[0]['Usuario'],
				'nombre' => $result[0]['Nombre_s'],
				'apellidos' => $result[0]['Apellidos'],
				'nombreCompleto' => $result[0]['NombreCompleto'],
				'userKind' => $result[0]['UserType'],
				'eIdUsr' => $result[0]['IdType'],
				'eMail' => $result[0]['Email']
			];
				$this->session->set_userdata($user);
				//return $result[0]['UserType'];
			//if ($result[0]['IdType'] == 1 || $result[0]['IdType'] == 2  || $result[0]['IdType'] == 3) {
					$this->load->view('Template/head');
					$this->load->view('Template/Menu');
					$this->load->view('Template/changePass');
					$this->load->view('dashboard/vwSubMenu');
					$this->load->view('Template/footer');

			//}elseif ($result[0]['IdType'] = 4) {
			//$info['allProviders'] = $this->ProvidersModel->getProviders($result[0]['IdType']);
			//$this->load->view('Template/head');
			//$this->load->view('Template/Menu');
			//$this->load->view('Providers/allProviders',$info);
			//$this->load->view('Providers/modNwProvider');
			//$this->load->view('Template/footer');
			//
				
		}
	}


	public function access(){
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Template/changePass');
		$this->load->view('Referencias/vwReferencias');
		$this->load->view('Template/footer');

	}

	public function log_out(){
		if(session_destroy()){
			$this->index();
			
			return true;
		}else{
			return false;
		}
	}


}
