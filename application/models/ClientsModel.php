<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
class ClientsModel extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	public function init($dataBase){
		$this->db = $this->load->database($dataBase, TRUE);
	}


	public function allClients(){
		$this->init('cotizaciones');

		$result = $this->db->query("SELECT * FROM vwallclients;");

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}

	public function allCtesRef(){
		$this->init('cotizaciones');

		$result = $this->db->query("SELECT * FROM vwctesref;");

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}

	public function addClient(){
		$this->init('cotizaciones');
		$data = $_POST;
		if($data['optradio'] == 0){
			$query = "INSERT INTO catclientes (eType,txtNombreCliente,txtApellidos,txtEmail,txtTelefono,txtRFC,txtCURP) VALUES (". $data['optradio'] . ",'" . $data['txtCteName'] . "','" . $data['txtCteLName'] . "','" . $data['txtCteEmail'] . "','" . $data['txtCtePhone'] . "','" . $data['txtCteRFC'] . "','" . $data['txtCteCURP'] . "')";

			echo $query;
		}else{
			$query = "INSERT INTO catclientes (eType,txtRazonSocial,txtEmail,txtTelefono,txtRFC) VALUES (". $data['optradio'] . ",'" . $data['txtRazonSocial'] . "','" . $data['txtCteEmail'] . "','" . $data['txtCtePhone'] . "','" . $data['txtCteRFC'] . "')";

			echo $query;
		}

		$result = $this->db->query($query);

		if($result){
			$id = $this->db->insert_id();
			$query2 = "INSERT INTO catdirecciones(fk_eIdCte, txtCalle, txtColonia, txtNumExt, txtNumInt,eCodigoPostal, txtCiudad, txtEstado, txtPais)  VALUES (" . $id . ", '" . $data['txtCteStreet'] . "','" . $data['txtCteCol'] . "','" . $data['txtCteExt'] . "','" . $data['txtCteInt'] . "'," . $data['txtCteCP'] . ",'" . $data['txtCteCity'] . "','" . $data['txtCteState'] . "','" . $data['txtCteCountry'] . "');";
			$result2 = $this->db->query($query2);
			if($result2){
				return true;
			}else{
				return false;
			}
		}
		else{
			return false;
		}
	}
}