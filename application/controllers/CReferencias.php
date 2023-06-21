<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CReferencias extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('MReferencias');
		$this->load->model('ClientsModel');
	}

	function listRef(){
		$userType = $_SESSION['user']['IdType'];
		$userId = $_SESSION['user']['userId'];
		$info['allCtes'] = $this->MReferencias->allCtesRef();
		if($userType >= 7){
		//$ref['allReferencias'] = $this->MReferencias->refsAsigned($userId);
		$info['allReferencias'] = $this->MReferencias->refsAsigned($userId);

		}else{
			//$ref['allReferencias'] = $this->MReferencias->allRefs();
			$info['allReferencias'] = $this->MReferencias->allRefs();

		}
		//$ref['allCtes'] = $this->MReferencias->allCtesRef();
		$info['allCtes'] = $this->MReferencias->allCtesRef();
		


		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Template/changePass');
		$this->load->view('Referencias/complete',$info);
		//$this->load->view('Referencias/vwHeadRefs');
		//$this->load->view('Referencias/vwListRef',$ref);
		//$this->load->view('Referencias/modCteNew');
		//$this->load->view('Referencias/vwAllRef');
		//$this->load->view('Referencias/vwReferencias',$info);
		//$this->load->view('Referencias/modAsignar');
		
		$this->load->view('Template/footer');
	}

	// ----------- Creación de método para paginar tabla  ------------------------------

	public function getAll() {
	  $config['base_url'] = base_url() . 'tu_controlador/tu_metodo';
	  $config['total_rows'] = $this->tu_modelo->total_registros();
	  $config['per_page'] = 10;

	  $this->pagination->initialize($config);

	  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	  $datos['registros'] = $this->tu_modelo->obtener_registros_paginados($config['per_page'], $page);

	  $this->load->view('tu_vista', $datos);
	}
	//----------------------------------------------------------------------------------

	function findUserAssigned(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MReferencias->userAsigned($data);
		//echo $result;
		return $result[0]['asignedUser'];
	}

	function changeStateRef(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MReferencias->changeStateRef($data);
		echo $result;
	}

	function userAssigneds(){
		$result = $this->MReferencias->userAssigneds();
		print_r(json_encode($result));
		//echo $result;

	}

	function newRef(){
		$result = $this->MReferencias->newReference();
		//echo $result;
		if($result != false){
			header("Location:" . site_url('listRef'));
			die();
		}
		else{
			echo $result;
		}
	}

	function myRefs(){
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Referencias/fillMyReferences');
		$this->load->view('Referencias/vwHeadRefs');
		$this->load->view('Referencias/vwMyReferences');
		$this->load->view('Referencias/modAsignar');
		$this->load->view('Template/footer');
	}

	function refAssigned(){
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Referencias/fillUserRefs');
		$this->load->view('Referencias/vwHeadRefs');
		$this->load->view('Referencias/vwMyReferences');
		$this->load->view('Referencias/modAsignar');
		$this->load->view('Template/footer');
	}

	function allMyRefs(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MReferencias->myRefs($data);
		print_r(json_encode($result)) ;
	}

	function atenderRef(){
		$result = $this->MReferencias->atenderRef();
		if($result){
			echo $result;
		}
		else{
			return false;
		}
	}

	function asignarRef(){
		$result = $this->MReferencias->asignarRef();
		if($result){
				header("Location:" . site_url('listRef'));
				die();
		}
		else{
			echo $result;
		}
	}

	

	

	
	function newGasto(){
		$result = $this->MReferencias->newGasto();
		if($result){
				header("Location:" . site_url('clasGlosa')."?eIdReferencia=". $result);
				die();
		}
		else{
			echo $result;
		}
	}
	function newDeposito(){
		$result = $this->MReferencias->newDeposito();
		if($result){
				header("Location:" . site_url('clasGlosa')."?eIdReferencia=". $result);
				die();
		}
		else{
			echo $result;
		}
	}

	function addDctoGasto(){
		$result = $this->MReferencias->addDctoGasto();
		if($result){
			header("Location:" . site_url('clasGlosa')."?eIdReferencia=". $result);
			die();
		}
		else{
			echo $result;
		}
	}
	function addDctoDeposito(){
		$result = $this->MReferencias->addDctoDeposito();
		if($result){
			header("Location:" . site_url('clasGlosa')."?eIdReferencia=". $result);
			die();
		}
		else{
			echo $result;
		}
	}

	function addClientRef(){
		$result = $this->MReferencias->addClientRef();
		if($result){
			header("Location:" . site_url('listRef'));
			die();
		}
		else{
			header("Location:" . site_url('listRef'));
			die();
		}
	}

	function fillClients(){
		$result = $this->MReferencias->allCtesRef();
		print_r(json_encode($result));
	}

	// CLASIFICACION Y GLOSA

	function clasGlosa(){
		$this->MReferencias->etClasGlosa();
		$infoRef['cuentaGastos'] =  $this->MReferencias->getCtaGastos();
		$infoRef['listaGastos'] =  $this->MReferencias->getListGastos($infoRef['cuentaGastos']);
		$infoRef['listaDepositos'] =  $this->MReferencias->getListDepositos($infoRef['cuentaGastos']);
		$infoRef['referencia'] =  $this->MReferencias->getReferencia();
		
		if ($this->MReferencias->getTotIngreso($infoRef['cuentaGastos'])) {
			$infoRef['totIngresos'] = $this->MReferencias->getTotIngreso($infoRef['cuentaGastos']);
		}else{
			$infoRef['totIngresos'] = 0;
		}
		
		if ($this->MReferencias->getTotEgreso($infoRef['cuentaGastos'])) {
			$infoRef['totEgresos'] = $this->MReferencias->getTotEgreso($infoRef['cuentaGastos']);
		}else{
			$infoRef['totEgresos'] = 0;
		}
		

		$infoRef['getPagados'] = $this->MReferencias->getPagados($infoRef['cuentaGastos']);
		$infoRef['getNoPagados'] = $this->MReferencias->getNoPagados($infoRef['cuentaGastos']);
		$infoRef['getTotDepositos'] = $this->MReferencias->getTotDepositos($infoRef['cuentaGastos']);
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Clasificacion/vwMain',$infoRef);
		$this->load->view('CuentaGastos/vwCtaGastos');
		$this->load->view('CuentaGastos/modAddDocument');
		$this->load->view('CuentaGastos/modAddGasto');
		$this->load->view('CuentaGastos/modAddDeposito');
		$this->load->view('CuentaGastos/modInfoGasto');
		$this->load->view('CuentaGastos/tblListaGastos');
		$this->load->view('Template/footer');

	}
	function mercaRefe(){
		$data = $_GET;
		$result = $this->MReferencias->getMercaList($data);
		$info['reference'] = $data;
		if(isset($result[0]['cveLMerca'])){
			$info['listaMercancia'] = $result[0];
			$data = $result[0]['cveLMerca'];
			$result = $this->MReferencias->getContMerca($data);
			if($result){
				$info['containers']=$result;
			}
		}
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Clasificacion/vwMainClasificacion',$info);
		$this->load->view('Clasificacion/modMercancias');
		$this->load->view('Clasificacion/modContainer');
		$this->load->view('Template/footer');
		
	}


	function getMercaList(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MReferencias->getMercaList($data);
		print_r($result);
	}

	function setMerca(){

		$result = $this->MReferencias->setMerca();
		print_r(json_encode($result));
	}

	function addContainer(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MReferencias->addContainer($data);
		if($result){
			echo true;
		}else{
			echo false;
		}	

	}

	function findContainerMerca(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MReferencias->getContainerMerca($data);
		if($result){
			print_r(json_encode($result));
		}else{
			echo false;
		}	
	}

	function setStatusCont(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MReferencias->setStatusCont($data);
		if($result){
			print_r(json_encode($result));
		}else{
			echo false;
		}
	}


	function vwReference(){
		$resultr = $this->MReferencias->vwReference();
		$resultd = $this->MReferencias->vwDocumentsRef();
		$info['reference'] = $resultr[0];

		$info['documents'] = $resultd[0];
		if($resultr && $resultd){
			$this->load->view('Template/head');
			$this->load->view('Template/Menu');
			$this->load->view('Referencias/vwReference',$info);
			$this->load->view('Referencias/modEditRef');
			$this->load->view('Template/footer');
		}else{
			echo false;
		}
	}

	function updateRef(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MReferencias->updateRef($data);
		if($result){
			echo true;
		}else{
			echo false;
		}
	}

}
