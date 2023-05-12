<?php 
class MUsers extends CI_Model 
{
	
	public function init($dataBase){
		$this->db = $this->load->database($dataBase, TRUE);
	}
	
	public function getUserData($data){
		$query = "SELECT * FROM vwuserdata WHERE userID =" . $data['userId'];
		$result = $this->db->query($query);
		if($result){
			$res = $result->result_array();
			return $res[0];
		}
		else{
			return false;
		} 
	}
	public function login($user, $password){
		$query ="SELECT * FROM vwuseractivenw WHERE Usuario = '$user' AND Pass = '$password'";
		//echo $query;
		$result = $this->db->query($query);

		if($result->num_rows() > 0){
			return $result->row_array();
		}else{
			return false;
		}

 
	}
	public function changePass($data){
		$userId = $_SESSION['user']['userId'];
		$pass = md5($data['nwPsw']);
		$query = "CALL changePass(" . $userId. ",'" . $pass."');";
		$result = $this->db->query($query);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function editUser($data){
		$fechaHora = date("Y-m-d h:i:s");
		$query= "CALL udtUser (".$data['userId'].",".$data['personId'].",'".$data['txtNickName']."',".$data['fk_eUserType'].",'".$data['txtUserFName']."','".$data['txtUserLName']."','".$data['txtPhone']."','".$data['txtEmail']."','".$fechaHora."');";
		$result = $this->db->query($query);
		if($result) return true;
		else return false;
	}

	public function log_in($data){
		$this->init('default');
		$user = $data['email'];
		$pass = md5($data['psw']);
	
		$query ="SELECT * FROM vwuseractivenw WHERE Usuario = '$user' AND Pass = '$pass'";

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
	$fechaCorta = date("Y-m-d");
		$fechaHora = date("Y-m-d h:i:s");
	//print_r($data);
		$fk_eIdUserType = $data['fk_eUserType'];
		$txtNickName = $data['txtNickName'];
		$txtUserFName = $data['txtUserFName'];
		$txtUserLName = $data['txtUserLName'];
		$txtCveEmpleado = $data['txtNickName'];
		$txtPhone = $data['txtPhone'];
		$txtEmail = $data['txtEmail'];
	

		$query= "CALL inserNewUser2 ('$txtUserFName','$txtUserLName','$txtPhone' ,'$txtNickName' ,'$txtEmail' ,'$fechaHora' ,$fk_eIdUserType);";
		$result = $this->db->query($query);

		if($result){
			return true;
		}else{
			return false;
		}
	}	
	public function changeStatusUser($data){
		$query = "CALL changeStatusUser(".$data['id'].");";

		$result = $this->db->query($query);

		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function deleteUser($data){
		$query = "CALL deleteUser(".$data['id'].");";

		$result = $this->db->query($query);

		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function resetPass($data){
		$query = "CALL resetPass(".$data['userId'].");";
		return $query;
		$result = $this->db->query($query);

		if($result){
			return true;
		}else{
			return false;
		}
	}



	

}