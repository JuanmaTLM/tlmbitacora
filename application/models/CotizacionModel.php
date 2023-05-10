<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
class CotizacionModel extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	public function init($dataBase){
		$this->db = $this->load->database($dataBase, TRUE);
	}

	public function allCotizaciones(){
		$this->init('cotizaciones');
		$result = $this->db->get("vwallcotizaciones")->result_array();
		return $result;

	}

	public function allClients(){
		$this->init('cotizaciones');
		$result = $this->db->get("vwallclients")->result_array();
		return $result;

	}

	public function nwCliente($data){
		$this->init('cotizaciones');
		$limit = 10;
		$offset= 10;
		$eId = 0;
		$data = json_decode($data);
		//return $data->txtRFC;

		//

		//$query = $this->db->get_where('catclientes', array('txtRFC' => $data['txtRFC']), $limit, $offset);

		$this->db->select('eIdCliente');
		$this->db->from('catclientes');
		$this->db->where('txtRFC',  $data->txtRFC);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			$result = $query->result_array();
			return print_r($result[0]);
		}else{
			if($this->db->insert('catclientes',$cliente)){
				return $this->db->insert_id();
			}else{
				return false;
			}
		}


	}	

	public function newCotizacion($data){
		$this->init('cotizaciones');
		return print_r($data);
		/*$cotizacion = array(
			'fk_eIdCliente' => $data['idCte'],
			'fk_eIdEstatus' => $data['idStatus'],
			'feEmision' => $data['fechaEmision'],
			'txtProyecto' => $data['txtProyecto'],
			'txtVigencia' => $data['txtVigencia'],
			'txtMoneda' => $data['txtMoneda'],
			'txtTipoCambio' => $data['txtTipoCambio'],
			'txtDiasCredito' => $data['txtDiasCredito'],
			'flSubtotal' => $data['flSubtotal'],
			'flIVA' => $data['flIVA'],
			'flRetencion' => $data['flRetencion'],
			'flTotal' => $data['flTotal']
		);
		if($this->db->insert('catcotizaciones',$cotizacion)){
			$id = $this->db->insert_id();
			$services = $data['services'];
			foreach ($services as $service ) {
				if(!($this->newServicio($service))){
					return false;
					break;
				}
			}
		}
		else{
			return false;
		}*/

	}

	public function newCliente($data){
		/*
		INSERT INTO `catclientes`(`eIdCliente`, `txtNombreCliente`, `txtEmail`, `txtTelefono`, `txtRFC`, `feCreacion`, `feActualizacion`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
		*/
		$this->init('cotizaciones');
		$cliente = array(
			'txtNombreCliente' => $data['txtNombreCliente'],
			'txtEmail' => $data['txtEmail'],
			'txtTelefono' => $data['txtTelefono'],
			'txtRFC' => $data['txtRFC']
		);
		if($this->db->insert('catclientes',$cliente)){
			return $this->db->insert_id();
		}else{
			return false;
		}

	}

	public function newServicio($data){
		/*
	INSERT INTO `detcotizaciones`(`eIdDetalle`, `fk_eIdCotizacion`, `flCantidad`, `txtDescripcion`, `flPrecioUnitario`, `flPorcentajeIVA`, `flMontoIva`, `flPorcentajeRetencion`, `flMontoRetencion`, `flImporte`, `feCreacion`, `feActualizacion`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]')
		*/
		$this->init('cotizaciones');
		$servicio = array(
			'fk_eIdCotizacion' => $data['fk_eIdCotizacion'],
			'flCantidad' => $data['flCantidad'],
			'txtDescripcion' => $data['txtDescripcion'],
			'flPrecioUnitario' => $data['flPrecioUnitario'],
			'flPorcentajeIVA' => $data['flPorcentajeIVA'],
			'flMontoIva' => $data['flMontoIva'],
			'flPorcentajeRetencion' => $data['flPorcentajeRetencion'],
			'flMontoRetencion' => $data['flMontoRetencion'],
			'flImporte' => $data['flImporte']
		);
		if($this->db->insert('detcotizaciones',)){
			return true;
		}else{
			return false;
		}

	}
}