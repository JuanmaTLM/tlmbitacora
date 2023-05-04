<?php
date_default_timezone_set('America/Monterrey'); 


if (!defined('BASEPATH'))
 exit('No direct script access allowed');
class ProvidersModel extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	public function init($dataBase){
		$this->db = $this->load->database($dataBase, TRUE);
	}

	public function getProviders($idUser,$UserType){
		$this->init('providers');

		if ( $UserType > 0 && $UserType < 4) {
			$query = "SELECT * FROM vwlistempresassm ORDER BY IdProveedor DESC";
		}else{
			$query = "SELECT * FROM vwlistempresassm WHERE Autor = $idUser ORDER BY IdProveedor DESC";
		}
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}

	}
	

	public function getProviderData(){
		$idProvider = $_POST['eIdProvider'];
		$this->init('providers');
		$query = "SELECT * FROM vwlistempresas WHERE IdProveedor = $idProvider ";
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}

	}

	public function getProviderFletes(){
		$idProvider = $_POST['eIdProvider'];
		$this->init('providers');
		$query = "SELECT * FROM vwlistafletes WHERE idEmpresa = $idProvider ";
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}

	}
	public function getProviderServices(){
		$idProvider = $_POST['eIdProvider'];
		$this->init('providers');
		$query = "SELECT * FROM vwlistaservicios WHERE IdProveedor = $idProvider";
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}

	}
	

	public function addAddress($data){
		$this->init('providers');

		$date = date("Y-m-d h:i:s");
		$data = json_decode($data);
		$query = "INSERT INTO addresslist (txtStreet, txtOutNumber, txtInNumber, txtColony, txtCity, txtState, txtPostalCode, feCreatedAt, feUpdatedAt) VALUES (' $data->txtStreet', ' $data->txtOutNumber', ' $data->txtInNumber', ' $data->txtColony', ' $data->txtCity', ' $data->txtState', ' $data->txtPostalCode', '$date','$date');";
		$result = $this->db->query($query);
		$id = $this->db->insert_id();
		if($result)
		{
			return $id;		
		}
		else
		{
			return false;
		}
	}

	public function nwProvider($data){
		$this->init('providers');

		$date = date("Y-m-d h:i:s");
		$data = json_decode($data);
		$query = "INSERT INTO companieslist (fK_eIdAddress,fk_eIdCreatedFor, txtName, txtEmail, txtPhone, txtArea, txtSector, txtProviderType, feCreatedAt, feUpdatedAt) VALUES ($data->fk_eIdAddress,$data->userId, '$data->txtName', '$data->txtEmail', '$data->txtPhone', '$data->txtArea', '$data->txtSector', '$data->txtProviderType', '$date', '$date');";
		$result = $this->db->query($query);
		$id = $this->db->insert_id();

		

		if($result)
		{
			return $id;		
		}
		else
		{
			return false;
		}
	}


	public function editProvider($data){
		$this->init('providers');
		$query = "";
		$date = date("Y-m-d h:i:s");
		$data = json_decode($data);
		if(isset($data->IdProveedor))
			$info = $data->info;
		if(isset($data->fk_eIdAddress))
			$address = $data->address;

		$res = false;

		/*START ADDRESS

		UPDATE `dbserviceproviders`.`addresslist` SET `txtOutNumber`='1110' WHERE  `eIdAddress`=1;

		*/
		if(isset($address->txtStreet)){
			$query = "UPDATE addresslist SET txtStreet ='$address->txtStreet' WHERE eIdAddress = $data->fk_eIdAddress; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}

		if(isset($address->txtOutNumber)){
			$query = "UPDATE addresslist SET txtOutNumber ='$address->txtOutNumber' WHERE eIdAddress = $data->fk_eIdAddress; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($address->txtInNumber)){
			$query = "UPDATE addresslist SET txtInNumber ='$address->txtInNumber' WHERE eIdAddress = $data->fk_eIdAddress; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($address->txtColony)){
			$query = "UPDATE addresslist SET txtColony ='$address->txtColony' WHERE eIdAddress = $data->fk_eIdAddress; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($address->txtCity)){
			$query = "UPDATE addresslist SET txtCity ='$address->txtCity' WHERE eIdAddress = $data->fk_eIdAddress; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($address->txtState)){
			$query = "UPDATE addresslist SET txtState ='$address->txtState' WHERE eIdAddress = $data->fk_eIdAddress; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($address->txtPostalCode)){
			$query = "UPDATE addresslist SET txtPostalCode ='$address->txtPostalCode' WHERE eIdAddress = $data->fk_eIdAddress; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		
		/*
			END OF ADRESS
			START OF COMPANIES	
		*/

		if(isset($info->txtName)){
			$query = "UPDATE companieslist SET txtName ='$info->txtName' WHERE eIdCompany = $data->IdProveedor; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($info->txtEmail)){
			$query = "UPDATE companieslist SET txtEmail = '$info->txtEmail' WHERE eIdCompany = $data->IdProveedor; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($info->txtPhone)){
			$query = "UPDATE companieslist SET txtPhone = '$info->txtPhone' WHERE eIdCompany = $data->IdProveedor; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($info->txtArea)){
			$query = "UPDATE companieslist SET txtArea ='$info->txtArea' WHERE eIdCompany = $data->IdProveedor; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($info->txtSector)){
			$query = "UPDATE companieslist SET txtSector ='$info->txtSector' WHERE eIdCompany = $data->IdProveedor; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		if(isset($info->txtProviderType)){
			$query = "UPDATE companieslist SET txtProviderType ='$info->txtProviderType' WHERE eIdCompany = $data->IdProveedor; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}
		/*END OF COMPANIES*/
		if($res){
			if(isset($info)){
				$query = "UPDATE companieslist SET feUpdatedAt ='$date' WHERE eIdCompany = $data->IdProveedor; ";
				$result = $this->db->query($query);
				if($result)
				{
					$res = true;		
				}
				else
				{
					$res = false;
				}
			}
			if(isset($address))
			$query = "UPDATE addresslist SET feUpdatedAt ='$date' WHERE eIdAddress = $data->fk_eIdAddress; ";
			$result = $this->db->query($query);
			if($result)
			{
				$res = true;		
			}
			else
			{
				$res = false;
			}
		}

		return $res;
	}



	public function addServices($data){
		$this->init('providers');

		$date = date("Y-m-d h:i:s");
		$data = json_decode($data);
		$query = "INSERT INTO serviceslist (fk_eIdCompany, txtService, txtDescription, flPrice) VALUES ";
		foreach ($data as $service) {
			$query .= "($service->fk_eIdProvider, '$service->txtService', '$service->flPrice', '$service->txtDescripction'),";
		}
		$query = substr($query, 0, -1);
		$query .= ";";
		$result = $this->db->query($query);
		$id = $this->db->insert_id();
		return $result;
	}

	public function addFletes($data){
		$this->init('providers');

		$date = date("Y-m-d h:i:s");
		$data = json_decode($data);
		$query = "INSERT INTO freightslist (fk_eIdCompany, fk_eIdFreightType, txtOrigin, txtDestiny, flFreightPrice, txtDescFlete, eDistanceKm, feCreatedAt, feUpdatedAt) VALUES ";
		foreach ($data as $flete) {
			$query .= "($flete->fk_eIdProvider, $flete->fk_eIdFreightType, '$flete->txtOrigin', '$flete->txtDestiny', '$flete->flFreightPrice', '$flete->txtDescFlete', '$flete->eDistanceKm',  '$date', '$date'),";
		}
		$query = substr($query, 0, -1);
		$query .= ";";
		
		$result = $this->db->query($query);
		return $result;
	}


	public function getTypeFletes(){
		$this->init('providers');

		$query = "SELECT * FROM vwtiposfletes";

		$result = $this->db->query($query);
		
		return $result->result_array();
	}
	
}