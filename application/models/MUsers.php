<?php 
class MUsers extends CI_Model 
{
	
	public function init($dataBase){
		$this->db = $this->load->database($dataBase, TRUE);
	}
	

	public function login($user, $password){
		$query ="SELECT * FROM vwusersactive WHERE Usuario = '$user' AND Pass = '$password'";
		//echo $query;
		$result = $this->db->query($query);

		if($result->num_rows() > 0){
			return $result->row_array();
		}else{
			return false;
		}

 
	}


	public function log_in($data){
		$this->init('default');
		$user = $data[''];
		$pass = md5($data['psw']);
	
		$query ="SELECT * FROM vwusersactive WHERE Usuario = '$user' AND Pass = '$pass'";

		$result = $this->db->query($query);

		if($result->num_rows() > 0){
				return $result->result_array();
			}else{
				return false;
			}
	}

	public function getUsers(){
		$this->init('default');
		$query= "SELECT * FROM  vwuserdata";
		$result = $this->db->query($query);

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}	
	public function allUsers($userType){
		$this->init('default');
		if($userType  > 2){
			$query= "SELECT * FROM  vwuserdata WHERE userType >=". $userType ;
		}else{
			$query= "SELECT * FROM  vwuserdata";
		}
		$result = $this->db->query($query);

		if($result->num_rows() > 0){
			print_r(json_encode($result->result_array()));
		}else{
			return false;
		}
	}

	public function getUserTypes(){
		$this->init('default');
		$query= "SELECT * FROM  vwusertypelist";
		$result = $this->db->query($query);

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}	
public function postUser($data){
	$this->init('default');
	//print_r($data);
		$fk_eIdUserType = $data['fk_eUserType'];
		$txtNickName = $data['txtNickName'];
		$txtUserFName = $data['txtUserFName'];
		$txtUserLName = $data['txtUserLName'];
		$txtCveEmpleado = $data['txtCveEmpleado'];
		

		$query= "CALL insNewUser($fk_eIdUserType, '$txtNickName','$txtUserFName','$txtUserLName','$txtCveEmpleado' );";
		$result = $this->db->query($query);

		if($result){
			return true;
		}else{
			return false;
		}
	}	




	

}