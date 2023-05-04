<?php

if (!defined('BASEPATH'))
 exit('No direct script access allowed');

class ControllerUsers extends CI_Controller {
	public function __construct() {
		parent::__construct();
	$this->load->model("MUsers");

	}
	public function init($dataBase){
		$this->MUsers->init('default');

	}
	public function index()
	{
		$info['allUsers'] = $this->MUsers->getUsers();
		$info['userTypes'] = $this->MUsers->getUserTypes();
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Users/allUsers',$info);
		$this->load->view('Users/newUser');
		$this->load->view('Template/footer');
	}

	public function addUser(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MUsers->postUser($data);
		echo $result;
		//print_r($result);
	}

	public function fillUsers (){
		$userType = json_encode($_SESSION['user']['IdType']);
		$result = $this->MUsers->allUsers($userType);
		if (!$result) {
			return false;
		}else{
			return $result;
		}
	}


}