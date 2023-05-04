<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MUsers');
	}
 
	public function index(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('home');
		}
		else{
			$this->load->view('Login/vwLogin');
		}
	}
 
	public function login(){
		//load session library
		$this->load->library('session');
 
		$email = $_POST['email'];
		$password = md5($_POST['password']);
 
		$data = $this->MUsers->login($email, $password);
		if($data){
			$this->session->set_userdata('user', $data);
			print_r($data);
			if($data['IdType'] > 0  &&  $data['IdType'] <= 3){
				redirect('listRef');
			}else if($data['IdType'] = 5 && $data['IdType']){
				redirect('listRef');
			}
			
		}
		else{
			header('location:'.base_url().$this->index());
			$this->session->set_flashdata('error','Invalid login. User not found');
		} 
	}
 
	public function home(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
			$this->load->view('Login/vwLogin');
		}
		else{
			redirect('/');
		}
 
	}
 
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}
 
}