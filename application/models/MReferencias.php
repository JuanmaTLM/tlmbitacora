<?php
class MReferencias extends CI_Model
{
	

	public function init($dataBase){
		$this->db = $this->load->database($dataBase, TRUE);
	}

	public function allRefs(){
		$this->init('default');

		$result = $this->db->query("SELECT * FROM vwReferenciaCliente;");

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}
	public function refsAsigned($id){
		$this->init('default');

		$result = $this->db->query("SELECT * FROM vwReferenciaAtiende WHERE asignedId = " . $id);

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}
	public function userAsigned($idRef){
		$this->init('default');
		$result = $this->db->query("SELECT * FROM vwAsignacionUsuarios  WHERE eIdReferencia = " . $idRef['idRef']);
		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}

	public function changeStateRef($idRef){
		$this->init('default');
		$result = $this->db->query("CALL changeStateRef( " . $idRef.");");
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function myRefs($userId){
		$query ="SELECT * FROM vwReferenciaAtiende where asignedId = " . $userId; 
		$this->init('default');
		$result = $this->db->query($query);
		if($result){
			return $result->result_array();
		}else{
			return false;
		}

	}

	function  etClasGlosa(){
		$this->init('default');
		$fecha = date("Y-m-d");
		$hora = date("h:i:s");
		if(isset($_POST['eIdReferencia'])){
			$data = $_POST;
		}
		if(isset($_GET['eIdReferencia'])){
			$data = $_GET;
		}
		$cveGlosa = "TLMB23-".$data['eIdReferencia']."_CG";;
		$query1 = "SELECT asignedId, asignedUser, asignedName, asignedLName, asignedFName, asignedUserType FROM vwReferenciaAtiende WHERE eIdReferencia = ".$data['eIdReferencia'];
		$result =  $this->db->query($query1);
		$res = $result->result_array();
		$eidAtiende =  $res[0]['asignedId'];
		$query = "SELECT * FROM etClasificacion WHERE txtCveEtapa ='". $cveGlosa ."';";
		//echo $query;
		$result =  $this->db->query($query);
		$res = $result->num_rows();

		if($res == 0 ){
			$query = "INSERT INTO etClasificacion(fk_eIdReferencia, fk_eIdAtiende, txtCveEtapa ,feInicio, hrInicio, bActivo) VALUES (".$data['eIdReferencia'].",".$eidAtiende.",'".$cveGlosa."','".$fecha."','".$hora."',1);";
			$result =  $this->db->query($query);
			if($result){
				return true;
			}
			else {return false;}
		}else{
			return false;
		}
	}


	public function newReference(){
		$this->init('default');


		$fechaCorta = date("Y-m-d");
		$fechaHora = date("Y-m-d h:i:s");
		$userId = $_SESSION['user']['userId'];
		$data = $_POST;
		$fileBL = $_FILES['dctoBL']['name'];
		$fileFactura = $_FILES['dctoFactura']['name'];
		$fileListaEmp = $_FILES['dctoListaEmp']['name'];
		$nameBL= '/BL_' . $fileBL;
		$nameFactura= '/FACTURA_' . $fileFactura;
		$nameListaEmp= '/EMPAQUE_' . $fileListaEmp;

		$url_tempBL = $_FILES["dctoBL"]["tmp_name"];
		$url_tempFactura = $_FILES["dctoFactura"]["tmp_name"];
		$url_tempListaEmp = $_FILES["dctoListaEmp"]["tmp_name"];

		
		$query = "CALL insNewReference ('" . $data['txtCliente'] . "','" . $data['txtReferencia'] . "','" . $data['txtETA'] . "','" . $data['txtNaviera'] . "','" . $data['txtVessel'] . "','" . $data['txtVoyaje'] . "','" . $data['txtTerminal'] . "',".$userId.")";
		$result = $this->db->query($query);



		$query1 = "SELECT MAX(eIdReferencia) as id FROM catreferencias";
		$result1 = $this->db->query($query1);
		$res = $result1->result_array();
		$cve = "TLMB23-" . $res[0]['id'];
		$userType = $_SESSION['user']['IdType'];
		if($userType > 7 ){
			$query3 = "CALL insAsignacionAuth(" . $res[0]['id'] ."," . $userId . ");";
			$this->db->query($query3);
			$query = "UPDATE catreferencias SET bAssigned = 1 WHERE cveReferencia = '". $cve . "';" ;
			$this->db->query($query);

			
		}
		

		$url = dirname(__FILE__);
		$baseUrl = substr($url, 0, -18);
		$url_insert = $baseUrl ."assets/DCTOSREFERENCIAS/" . $cve;
		$url_targetBL = str_replace('\\', '/', $url_insert) . $nameBL;
		$url_targetFactura = str_replace('\\', '/', $url_insert) . $nameFactura;
		$url_targetListaEmp = str_replace('\\', '/', $url_insert) . $nameListaEmp;

		if (!file_exists($url_insert)) {
		    mkdir($url_insert, 0777, true);
		}
		move_uploaded_file($url_tempBL, $url_targetBL);

		move_uploaded_file($url_tempFactura, $url_targetFactura);

		move_uploaded_file($url_tempListaEmp, $url_targetListaEmp); 


		$query = "CALL insertBlFaEm ('" .$cve . "','" . $nameBL . "','" . $url_targetBL . "','" . $nameFactura . "','" . $url_targetFactura . "','" . $nameListaEmp . "','" . $url_targetListaEmp . "')";

		$result2 = $this->db->query($query);
		if($result2){
				return $result2;
		}else{
			return false;
		}
		
	}
	public function asignarRef(){
		$this->init('default');
		$data = $_POST;
		$query = "UPDATE catasignaciones SET fk_eIdAsignado = " . $data['userList'] . ", feActualizacion = now(), hrActualizacion = now() WHERE fk_eIdReferencia =". $data['txteIdRef']. ";" ;

		if($this->db->query($query)){
			$query = "UPDATE catreferencias SET bAssigned = 1 WHERE eIdReferencia =". $data['txteIdRef']. ";" ;
			if($this->db->query($query)){
				$query = "INSERT INTO etoperaciones(fk_eIdReferencia, fk_eIdAtiende, feInicio, hrInicio, bActivo) VALUES (" . $data['txteIdRef']."," . $data['userList'] . ",NOW(),NOW(), 1);" ;
				if($this->db->query($query))
					return true;
				else
					return false;
			}else
				return false;
		}
		else
			return false;
	}

	public function atenderRef(){
		$this->init('default');
		$data = file_get_contents("php://input");
		$data = json_decode($data);
		$userId = $_SESSION['user']['userId'];

		$query = "UPDATE catasignaciones SET fk_eIdAsignado = " . $userId. ", feActualizacion = now(), hrActualizacion = now() WHERE fk_eIdReferencia =". $data->ref. ";" ;
		 

		if($this->db->query($query)){
			$query = "UPDATE catreferencias SET bAssigned = b'1' WHERE eIdReferencia = ". $data->ref. ";";
			if($this->db->query($query))
				return 'true';
			else
				return 'false';
		}
		else {return 'false';}
	}

	public function getCtaGastos(){
		$this->init('default');
		if(isset($_POST['eIdReferencia'])){
			$data = $_POST['eIdReferencia'];
			
		}
		if(isset($_GET['eIdReferencia'])){
			$data = $_GET['eIdReferencia'];

		}
		$query = "SELECT eIdCuentaGasto,cveCtaGasto, fk_eIdReferencia FROM catCtaGastos WHERE fk_eIdReferencia = ".$data . ";";
		$result = $this->db->query($query);
		if($result){
			$res = $result->result_array();
			return $res[0];
		}
		else
			return false;
	}


	public function getReferencia(){
		$this->init('default');
		if(isset($_POST['eIdReferencia'])){
			$data = $_POST['eIdReferencia'];
			
		}
		if(isset($_GET['eIdReferencia'])){
			$data = $_GET['eIdReferencia'];

		}
		$query = "SELECT * FROM catreferencias WHERE eIdReferencia = ".$data . ";";
		$result = $this->db->query($query);
		$res = $result->result_array();
		return $res[0];

	}
	public function gastosFiles(){
		$query = "SELECT * FROM filesCuentaGastos";
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			return $result->result_array();
		}
		else{
			return false;
		}
	}
	public function getListGastos($data){
				$this->init('default');

		if ($data['cveCtaGasto'] != ''){
			
			$query = "SELECT * FROM vwCtaGastosList WHERE eIdCuentaGasto = " .$data['eIdCuentaGasto'];
			$result = $this->db->query($query);
			if($result->num_rows() > 0){
				return $result->result_array();
			}
			else{
				return false;
			}
		}
		else {
			return false;
		}
		

	}

	public function newGasto(){
		$this->init('default');
		$user = $_SESSION['user']['Usuario'];
		$fechaCorta = date("Y-m-d");
		$fechaHora = date("Y-m-d h:i:s");
		if(isset($_POST['txtConcept'])){
			$data= $_POST;
			$cveRef = trim($data['cveReferencia']);
			if(isset($_FILES['dctoPago'])){
				$file = $_FILES;
				$fileType = substr($file['dctoPago']['name'], -4);
				$fileName =  $data['txtConcept']."_".$data['txtNumFactura']. $fileType;
				$url_temp = $file["dctoPago"]["tmp_name"];
				$url = dirname(__FILE__);
				$baseUrl = substr($url, 0, -18);
				$url_insert = $baseUrl ."assets/DCTOSREFERENCIAS/".$cveRef ."/" .$data['cveCuentaGastos']."/";
				$url_insert = trim(str_replace('\\', '/', $url_insert));
				$url_target = $url_insert . $fileName;
				if (!file_exists($url_insert)) {
				    mkdir($url_insert, 0777, true);
				}
				if(move_uploaded_file($url_temp, $url_target)){
					$query ="INSERT INTO listgastos(txtAuthor,fk_eIdCtaGastos, txtGasto, txtValor, txtFileUrl, txtfileName,fePago, feCreacion, feModificacion,bPagado) VALUES ('".$user."',".$data['eIdCuentaGastos'].",'".$data['txtConcept']."',".$data['flPrice'].",'".$url_target."','".$fileName."','".$data['fePago']."','".$fechaHora."','".$fechaHora."',1)";
					$result = $this->db->query($query);
					if($result){
						return $data['eIdReferencia'];
					}
					else{
						return false;
					}
				}else{
					$query ="INSERT INTO listgastos(txtAuthor,fk_eIdCtaGastos, txtGasto, txtValor, fePago, feCreacion, feModificacion) VALUES ('".$user ."',".$data['eIdCuentaGastos'].",'".$data['txtConcept']."','".$data['flPrice']."','".$data['fePago']."','".$fechaHora."','".$fechaHora."')";
					$result = $this->db->query($query);
					if($result){

						return $data['eIdReferencia'];
					}
					else{
						return false;
					}
				}
				
			}
		}
	}

	public function getTotIngreso($cveCta){
		$query = "SELECT sum(flTotal) as TotalDepositos FROM vwDepositosList WHERE  eIdCuentaGasto =" .$cveCta['eIdCuentaGasto'];
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			$tot  = $result->result_array();
			return $tot[0];
		}
		else{
			return false;
		}

	}

	public function getPagados($cveCta){
		$query = "SELECT count(*) as Pagados FROM vwCtaGastosList where bPagado = 1 AND eIdCuentaGasto = " .$cveCta['eIdCuentaGasto'];
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			$tot  = $result->result_array();
			return $tot[0];
		}
		else{
			return false;
		}
	}

	public function getNoPagados($cveCta){
		$query = "SELECT count(*) as NoPagados FROM vwCtaGastosList where bPagado = 0 AND eIdCuentaGasto = " .$cveCta['eIdCuentaGasto'];
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			$tot  = $result->result_array();
			return $tot[0];
		}
		else{
			return false;
		}
	}

	public function getTotDepositos($cveCta){
		$query = "SELECT count(*) as TotalDepositos FROM vwDepositosList where  eIdCuentaGasto = " .$cveCta['eIdCuentaGasto'];
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			$tot  = $result->result_array();
			return $tot[0];
		}
		else{
			return false;
		}
	}


	public function getTotEgreso($cveCta){
		$query = "SELECT sum(txtValor) as TotalPagos FROM vwCtaGastosList WHERE bPagado = 1 AND eIdCuentaGasto =" .$cveCta['eIdCuentaGasto'];
		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			$tot  = $result->result_array();
			return $tot[0];
		}
		else{
			return false;
		}
	}


	public function getListDepositos($data){
				$this->init('default');

		if ($data['cveCtaGasto'] != ''){
			
			$query = "SELECT * FROM vwDepositosList WHERE eIdCuentaGasto = " .$data['eIdCuentaGasto'];
			$result = $this->db->query($query);
			if($result->num_rows() > 0){
				return $result->result_array();
			}
			else{
				return false;
			}
		}
		else {
			return false;
		}
		

	}

	public function newDeposito(){
		$this->init('default');
		$user = $_SESSION['user']['Usuario'];
		$fechaCorta = date("Y-m-d");
		$fechaHora = date("Y-m-d h:i:s");
		if(isset($_POST['txtDConcept'])){
			$data= $_POST;
			$cveRef = trim($data['cveReferencia']);
			if(isset($_FILES['dctoDep'])){
				$file = $_FILES;
				$fileType = substr($file['dctoDep']['name'], -4);
				$fileName =  $data['txtDConcept']. $fileType;
				$url_temp = $file["dctoDep"]["tmp_name"];
				$url = dirname(__FILE__);
				$baseUrl = substr($url, 0, -18);
				$url_insert = $baseUrl ."assets/DCTOSREFERENCIAS/".$cveRef ."/" .$data['cveCuentaGasto']."/".$data['txtDConcept']."s/";
				$url_insert = trim(str_replace('\\', '/', $url_insert));
				$url_target = $url_insert . $fileName;
				if (!file_exists($url_insert)) {
				    mkdir($url_insert, 0777, true);
				}
				if(move_uploaded_file($url_temp, $url_target)){

					$query ="INSERT INTO listdepositos(fk_eIdCtaGastos, txtConcepto,txtAuthor, txtMoneda,  cveReferenciaBanco, txtFDepUrl, txtFDepName, feDeposito,flValorCambio, flTotal,feCreatedAt, feUpdatedAt) VALUES (".$data['eIdCuentaGasto'].",'".$data['txtDConcept']."','".$user."','".$data['txtMoneda']."','".$data['txtRefBanco']." ','".$url_target."','".$fileName."','".$data['fePago']."',".$data['flValorCambio'].",".$data['flDTotal'].",'".$fechaHora."','".$fechaHora."')";
					$result = $this->db->query($query);
					if($result){
						return $data['eIdReferencia'];
					}
					else{
						return false;
					}
				}else{
					$query ="INSERT INTO listdepositos(fk_eIdCtaGastos, txtConcepto,txtAuthor, txtMoneda,  cveReferenciaBanco,feDeposito,flValorCambio, flTotal,feCreatedAt, feUpdatedAt) VALUES (".$data['eIdCuentaGasto'].",'".$data['txtDConcept']."','".$user."','".$data['txtMoneda']."','".$data['txtRefBanco']." ','".$data['fePago']."',".$data['flValorCambio'].",".$data['flDTotal'].",'".$fechaHora."','".$fechaHora."')";
					$result = $this->db->query($query);
					if($result){
						return $data['eIdReferencia'];
					}
					else{
						return false;
					}
				}
				
			}
		}
	}
	public function addDctoGasto(){
		$this->init('default');

		$user = $_SESSION['user']['Usuario'];
		$fechaCorta = date("Y-m-d");
		$fechaHora = date("Y-m-d h:i:s");
		
		if(isset($_POST)){
			$data= $_POST;
			$cveRef = trim($data['cveReferencia']);
			if(isset($_FILES['dctoPago'])){
				$file = $_FILES;
				$fileType = substr($file['dctoPago']['name'], -4);
				$fileName = "pago_".$fechaCorta.$fileType;
				$url_temp = $file["dctoPago"]["tmp_name"];
				$url = dirname(__FILE__);
				$baseUrl = substr($url, 0, -18);
				$query = "SELECT  txtGasto FROM listgastos WHERE eIdLiGastos = ". $data['eIdGasto'];
				$result = $this->db->query($query);
				if($result->num_rows() >0){
					$res = $result->result_array();
					$concepto = $res[0]['txtGasto'];
				}
				$url_insert = $baseUrl ."assets/DCTOSREFERENCIAS/".$cveRef ."/" .$data['cveCuentaGastos']."/";
				$url_insert = trim(str_replace('\\', '/', $url_insert));
				$url_target = $url_insert . $fileName;
				if (!file_exists($url_insert)) {
				    mkdir($url_insert, 0777, true);
				}
				if(move_uploaded_file($url_temp, $url_target)){
					$query ="UPDATE listgastos SET bPagado  = 1 ,  txtFileUrl='".$url_target."',txtfileName='".$fileName."',fePago='".$data['fePago']."',feModificacion='".$fechaHora."' WHERE eIdLiGastos=".$data['eIdGasto'];
					$result = $this->db->query($query);
					if($result){
						return $data['eIdReferencia'];
					}
					else{
						return false;
					}
				}else{
					return false;
				}
			}
		}
	}
	public function addDctoDeposito(){
		$user = $_SESSION['user']['Usuario'];
		$fechaCorta = date("Y-m-d");
		$fechaHora = date("Y-m-d h:i:s");
		
		if(isset($_POST['txtRefBanco'])){
			$data= $_POST;
			$cveRef = trim($data['cveReferencia']);
			if(isset($_FILES['dctoDep'])){
				$file = $_FILES;
				$fileType = substr($file['dctoDep']['name'], -4);
				$fileName = "deposito_".$fechaCorta.$fileType;
				$url_temp = $file["dctoDep"]["tmp_name"];
				$url = dirname(__FILE__);
				$baseUrl = substr($url, 0, -18);
				$query = "SELECT  txtConcepto FROM listdepositos WHERE eIdDeposito = ". $data['eIdDeposito'];
				$result = $this->db->query($query);
				if($result->num_rows() >0){
					$res = $result->result_array();
					$concepto = $res[0]['txtConcepto'];
				}
				$url_insert = $baseUrl ."assets/DCTOSREFERENCIAS/".$cveRef ."/" .$data['cveCuentaGastos']."/".$concepto."s/";
				$url_insert = trim(str_replace('\\', '/', $url_insert));
				$url_target = $url_insert . $fileName;
				if (!file_exists($url_insert)) {
				    mkdir($url_insert, 0777, true);
				}
				if(move_uploaded_file($url_temp, $url_target)){
					$query ="UPDATE listdepositos SET txtDocAuthor='".$user."', cveReferenciaBanco='".$data['txtRefBanco']."',txtFDepUrl='".$url_target."',txtFDepName='".$fileName."',feUpdatedAt='".$fechaHora."' WHERE  	eIdDeposito =".$data['eIdDeposito'];
					$result = $this->db->query($query);
					if($result){
						return $data['eIdReferencia'];
					}
					else{
						return false;
					}
				}else{
					return false;
				}
			}
		}

	}


	public function addClientRef(){
		$this->init('default');
		$data = $_POST;
		if($data['optradio'] == 0){
			$query = "INSERT INTO catclientes (eType,txtNombreCliente,txtApellidos,txtEmail,txtTelefono,txtRFC,txtCURP) VALUES (". $data['optradio'] . ",'" . $data['txtCteName'] . "','" . $data['txtCteLName'] . "','" . $data['txtCteEmail'] . "','" . $data['txtCtePhone'] . "','" . $data['txtCteRFC'] . "','" . $data['txtCteCURP'] . "')";

		}else{
			$query = "INSERT INTO catclientes (eType,txtRazonSocial,txtEmail,txtTelefono,txtRFC) VALUES (". $data['optradio'] . ",'" . $data['txtRazonSocial'] . "','" . $data['txtCteEmail'] . "','" . $data['txtCtePhone'] . "','" . $data['txtCteRFC'] . "')";

		}
		$result = $this->db->query($query);
		if($result){
			return true;

		}else{
			return false;
		}
	}	
	public function allCtesRef(){
		$this->init('default');

		$result = $this->db->query("SELECT * FROM vwctesref;");

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}	

	public function userAssigneds(){
		$this->init('default');

		$query ="SELECT * FROM vwAsignacionUsuarios";

		$result = $this->db->query($query);

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
		

	}

	public function getMercaList($data){
		$this->init('default');
	
		$cveMerca = $data['cveReferencia'] . "_LM";
		$query = "SELECT * FROM vwMercaRef WHERE cveReferencia = '" . $data['cveReferencia'] ."';";
		$result = $this->db->query($query);
		if($result->num_rows() > 0 ){
			return $result->result_array();
		}
		if($result->num_rows() == 0 ){

		}
		else{
			return false;

		}

	}

	public function setMerca(){
		$fechaCorta = date("Y-m-d");
		$fechaHora = date("Y-m-d h:i:s");
		
		
		if(isset($_FILES['mercaPhoto'])) $file = $_FILES['mercaPhoto'];
		if(isset($_POST['txtMerca'])) $post = $_POST;

		$info=[$file,$post];
		$info['fileType'] = substr($file['name'], -4);
		$info['fileName'] = $post['txtMerca'].$info['fileType'];
		$info['url_temp'] = $file["tmp_name"];
		$info['url'] = dirname(__FILE__);
		$urlFile = "assets/DCTOSREFERENCIAS/".$post['txtCveCont']."/";
		$info['baseUrl'] = substr($info['url'] , 0, -18);
		$info['url_insert'] =$info['baseUrl'] .$urlFile;
		$info['url_insert'] = trim(str_replace('\\', '/', $info['url_insert']));
		$info['url_target'] = $info['url_insert'] . $info['fileName'];
		$uriFile = $urlFile.$info['fileName'];
		if (!file_exists($info['url_insert'])) {
			    mkdir($info['url_insert'], 0777, true);
			   
		}else{
			$info['message'] ="CARPETA YA EXISTE!!";
		}
		if(move_uploaded_file($info['url_temp'], $info['url_target'])){
			$query = "CALL insertNewMerca ('".$post['txtCveCont']."','".$post['txtMerca']."','".$post['txtBultos']."','".$post['txtFracc']."','".$uriFile."','".$fechaHora."')";
			$result = $this->db->query($query);
			if($result){
				return true;

			}else{
				return false;
			}
		}else{
			return false;

		}


			

			
		
	}

	public function getContMerca($data){
		$this->init('default');

		$query = "SELECT * FROM vwContainerReference WHERE cveLMerca = '". $data ."'";

		$result = $this->db->query($query);
		if($result->num_rows() > 0 ){
			return $result->result_array();
		}
		else{
			return false;

		}

	}

	//CONTENEDORES 

	/*
	[txtContenedor] => 1
	   [txtTam] => 1
	   [txtTip] => 1
	   [txtPedimento] => 1
	   [eIdMerca] => 1
	*/

	public function addContainer($data){
		$query = "CALL insNewContainer (".$data['eIdMerca'].",'".$data['txtContenedor']."','".$data['txtPedimento']."','".$data['txtTam']."','".$data['txtTip']."');";
		$result = $this->db->query($query);
		if($result){
			return true;
		}
		else{
			return false;

		}
	}

	public function getContainerMerca($data){
		$query="SELECT * FROM vwMercaContainer WHERE eIdContenedor =" . $data['eIdContainer'];
		$query2="SELECT txtContenedor, txtPedimento, txtTamaño, txtTipo, bAbierto FROM catcontenedores WHERE eIdContenedor =" . $data['eIdContainer'];
		

		$result = $this->db->query($query);
		if($result->num_rows() > 0){
			$res['allMercancias'] = $result->result_array();
		}else{
			$res['allMercancias'] = false;
		}
		$result2 = $this->db->query($query2);

		if($result2->num_rows() > 0 ){
			$item = $result2->result_array();
			$res['containerData'] = $item[0]; 
		}else{
			$res['containerData'] = false;
		}

		return $res ;

	}

	public function setStatusCont($data){
		$query = "CALL changeStatusCont(" . $data['contId'] . ");";

		$result = $this->db->query($query);
		if($result){
			return true;
		}else{
			return false;
		}
	}
}
