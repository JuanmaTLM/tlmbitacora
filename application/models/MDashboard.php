<?php 
class MDashboard extends CI_Model 
{
	
	public function init($dataBase){

		$this->db = $this->load->database($dataBase, TRUE);
	
	}
	

	public function index(){
	
		print_r($_SESSION);

	}



	

}