
<style type="text/css">
	input[type=text], input[type=file],input[type=date],input[type=number],input[type=email],input[type=password]{
	  border : none;
	  border-bottom: 1px solid black;

	}

</style>
<hr>
<div class="d-flex flex-wrap justify-content-center flex-column flex-container bg-white">
	<div class="d-flex flex-wrap justify-content-around bg-info p-2 rounded">
		<div>
			<a href="<?php echo site_url('dashboard'); ?>" class="btn btn-outline-light"> Regresar </a>
		</div>
		<div class="d-flex flex-wrap justify-content-end ">
			<div>
				<button class="btn btn-outline-light" onclick="actInputs();" id="edBtnEdit">  Editar </button>
			</div>
			<div>
				<a class="btn btn-outline-warning" href="javascript:location.reload()" id="edBtnCancel">  Cancelar </a>
			</div>
			<div>
				<button class="btn btn-outline-success" onclick="saveChangeRef(<?php echo $reference['eIdReferencia']; ?>);" id="edBtnSave">  Guardar </button>
			</div>
		</div>
	</div>
  <div class="d-flex flex-column justify-content-center">

  	<div class="d-flex align-items-around  ">

  	  <div class="input-group mb-3 p-1">
  	      <div class="input-group-prepend">
  	        <span class="input-group-text bg-primary text-white" >Referencia Agencia Aduanal</span>
  	      </div>
  	      <input autocomplete="off" id="edReferencia" type="text" class="form-control" name= "edReferencia" disabled value = "<?php echo $reference['txtReferenciaAD']  ?>">
  	  </div>

  	  <div class="input-group mb-3 p-1">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Cliente</span>
          </div>
          
          <input autocomplete="off" id="edCliente" type="text" class="form-control" name= "edCliente" placeholder="Cliente" list="listCtes" disabled value="<?php echo $reference['txtRFC']; ?>">
          <datalist id="listCtes">
            
          </datalist>
      </div>

  	</div>
  </div>
  <div class="d-flex align-items-around">
      <div class="input-group mb-3 p-1">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">ETA</span>
          </div>
          <input autocomplete="off" id="edETA" type="date" class="form-control" name= "edETA" disabled value="<?php echo $reference['txtETA'] ?>">
      </div>
      <div class="input-group mb-3 p-1">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Naviera</span>
          </div>
          <input autocomplete="off" id="edNaviera" type="text" class="form-control" name= "edNaviera"  disabled value="<?php echo $reference['txtNaviera']; ?>">
      </div>
      <div class="input-group mb-3 p-1">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Vessel</span>
          </div>
          <input autocomplete="off" id="edVessel" type="text" class="form-control " name= "edVessel" disabled value="<?php echo $reference['txtVessel']; ?>">
      </div>
  </div>
  <div class="d-flex align-items-around">
      <div class="input-group mb-3 p-1">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Voyaje</span>
          </div>
          <input autocomplete="off" id="edVoyaje" type="text" class="form-control " name= "edVoyaje" disabled value="<?php echo $reference['txtVoyaje']; ?>"	>
      </div>
      <div class="input-group mb-3 p-1">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Terminal</span>
          </div>
          <input autocomplete="off" id="edTerminal" type="text" class="form-control " name= "edTerminal" disabled value="<?php echo $reference['txtTerminal']; ?>">
      </div>
  </div>
	<div class="d-flex flex-wrap justify-content-around">
		<div style="width:32.5%;height:auto" class="mb-1 rounded p-1 border border-black">
			<div class="d-flex flex-wrap justify-content-center">
				<div class="p-1">
					<h6>BL <hr></h6>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-center">
				<div class="flex-fill rounded">
					<embed id="blRef" name="blRef" type="application/pdf" style="width: 100%; height:680px;" src="<?php 
					if( $documents['urlBL'] != '' && $documents['urlBL'] != null)
						echo base_url().$documents['urlBL'];


					?>"/>
				</div>
			</div>
		</div>
		<div style="width:32.5%;height:auto" class="mb-1 rounded p-1 border border-info">
			<div class="d-flex flex-wrap justify-content-center">
				<div class="p-1">
					<h6>FACTURA <hr></h6>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-center">
				<div class="flex-fill rounded">
					<embed id="blRef" name="blRef" type="application/pdf" style="width: 100%; height:680px;" src="<?php 
					if( $documents['URLFactura'] != '' && $documents['URLFactura'] != null)
						echo base_url().$documents['URLFactura'];


					?>"/>
				</div>
			</div>
		</div>
		<div style="width:32.5%;height:auto" class="mb-1 rounded p-1 border border-warning">
			<div class="d-flex flex-wrap justify-content-center">
				<div class="p-1">
					<h6>LISTA DE EMPAQUE<hr></h6>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-center">
				<div class="flex-fill rounded">
					<embed id="blRef" name="blRef" type="application/pdf" style="width: 100%; height:680px;" src="<?php 
					if( $documents['urlEmpaques'] != '' && $documents['urlEmpaques'] != null)
						echo base_url().$documents['urlEmpaques'];


					?>"/>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	const edBtnEdit= document.getElementById('edBtnEdit');
	const edBtnCancel= document.getElementById('edBtnCancel');
	const edBtnSave= document.getElementById('edBtnSave');

	const edReferencia= document.getElementById('edReferencia');
	const edCliente= document.getElementById('edCliente');
	const edETA= document.getElementById('edETA');
	const edNaviera= document.getElementById('edNaviera');
	const edVessel= document.getElementById('edVessel');
	const edVoyaje= document.getElementById('edVoyaje');
	const edTerminal= document.getElementById('edTerminal');


	window.onload= function (){
		initBtns();
	}
	function initBtns (){
		edBtnEdit.style.display = 'flex';
		edBtnCancel.style.display = 'none';
		edBtnSave.style.display = 'none';
	}

	function actInputs(){
		edReferencia.disabled = false;
		edCliente.disabled = false;
		edETA.disabled = false;
		edNaviera.disabled = false;
		edVessel.disabled = false;
		edVoyaje.disabled = false;
		edTerminal.disabled = false;
		edBtnEdit.style.display = 'none';
		edBtnCancel.style.display = 'flex';
		edBtnSave.style.display = 'flex';
	}
	function deactInputs(){
		edReferencia.disabled = true;
		edCliente.disabled = true;
		edETA.disabled = true;
		edNaviera.disabled = true;
		edVessel.disabled = true;
		edVoyaje.disabled = true;
		edTerminal.disabled = true;
		edBtnEdit.style.display = 'flex';
		edBtnCancel.style.display = 'none';
		edBtnSave.style.display = 'none';
	}

	function saveChangeRef(id){
		console.log(id);
		let data ={};
		data.eIdReferencia = id;
		data.txtReferencia = edReferencia.value;
		data.txtCliente = edCliente.value;
		data.txtETA = edETA.value;
		data.txtNaviera = edNaviera.value;
		data.txtVessel = edVessel.value;
		data.txtVoyaje = edVoyaje.value;
		data.txtTerminal = edTerminal.value;
		deactInputs();
		sendChanges(data);
	}

	function sendChanges(data){
		axios.post("<?php echo site_url('updateRef'); ?>" ,data).then(
		function(res){
          if (res.status == 200) {
            console.log(res.data);
            if(res.data){
            	alert("Datos Actualizados!");
            	window.location.href ="<?php echo site_url('listRef'); ?>";
            }
          }
      	}).catch(function(err){
          alert(err);
          console.log(err);
      	});
	}
</script>