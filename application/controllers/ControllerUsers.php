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
		$this->load->view('Template/changePass');
		$this->load->view('Users/newUser',$info);
		$this->load->view('Users/allUsers');
		$this->load->view('Template/footer');
	}

	public function addUser(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MUsers->postUser($data);
		echo $result;
		//print_r($result);
	}

	public function changePass(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MUsers->changePass($data);
		echo $result;
		//print_r($result);
	}

	public function getUserData(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MUsers->getUserData($data);
		//echo $result;
		print_r(json_encode($result));
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
	public function editUser(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MUsers->editUser($data);
		echo $result;
		//print_r(json_encode($result));
	}


}