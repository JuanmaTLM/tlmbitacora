<style type="text/css">
	.text-end{
		text-align: right;
	}
</style>
<!-- The Modal -->
<div class="modal fade" id="newFProv">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modTitFle"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<div class="row">
      		<div class="col-lg-7"></div>
      		<div class="col-lg-5">
      			<div class="form-group">
      			  <label for="eTipo">Tipo de flete:</label>
      				<select id="eTipo" class="form-select"></select>
      			</div>
      		</div>
      	</div>
        <div class="row">
        	<div class="col-lg-4">
        		<div class="form-group">
        		  <label for="txtOrigen">Origen:</label>
        		  <input type="text" class="form-control" id="txtOrigen" name="txtOrigen">
        		</div>
        	</div>
        	<div class="col-lg-4"><div class="form-group">
        		  <label for="txtDestino">Destino:</label>
        		  <input type="text" class="form-control" id="txtDestino" name="txtDestino">
        		</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="form-group">
        		  <label for="txtPrecio">Precio(MNX):</label>
        		  <input type="number" step="0.05" min="0.00" value="0.00" class="form-control text-end" id="txtPrecio" name="txtPrecio">
        		</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-lg-1"></div>
        	<div class="col-lg-4">
        		<div class="form-group">
        		  <label for="txtDistancia">Distancia(Km):</label>
        		  <input type="number" min="1" class="form-control text-end" id="txtDistancia" name="txtDistancia">
        		</div>
        	</div>
        	<div class="col-lg-6">
        		<div class="form-group">
        		  <label for="txtDescripcionF">Descripción:</label>
        		  <textarea type="text" class="form-control" id="txtDescripcionF" name="txtDescripcionF"></textarea>
        		</div>
        	</div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" id="btnSaveFlete" onclick="saveFlete(this.value);">Guardar</button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" onclick="cleanInputFlete();">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<?php 
		$provider = json_decode($provider);
		$services = json_decode($services);
		$fletes = json_decode($fletes);
	echo "<hr>";
		
 ?>
 <div class="mt-1 d-flex border border-black rounded flex-nowrap justify-content-center  ">
			<div class="p-2 ml-5">
				<a href="<?php echo site_url('providers'); ?>" class="form-control btn btn-outline-secondary"><span class="far fa-arrow-alt-circle-left"></span> Regresar</a>
			</div>
</div>
<hr>
 <form action="<?php echo site_url('getProviderData'); ?>" method="POST">
 	<div class="container bg-light">
	 	<div class="d-flex flex-wrap justify-content-center align-items-center align-content-center">
	 		<div class="p-2"> 
	 			<ul class="nav nav-tabs">
	 			  <li class="nav-item">
	 			    <a class="nav-link active" data-toggle="tab" href="#home"><h5>Datos del Proveedor</h5></a>
	 			  </li>
	 			  <li class="nav-item">
	 			    <a class="nav-link" data-toggle="tab" href="#servicios"><h5>Servicios</h5></a>
	 			  </li>
	 			  <li class="nav-item">
	 			    <a class="nav-link" data-toggle="tab" href="#fletes"><h5>Fletes</h5></a>
	 			  </li>
	 			</ul>
	 		</div>
	 	</div>
	 	<div class="tab-content">
		  <div class="tab-pane active container" id="home">
		  	<div class="d-flex flex-wrap justify-content-end">
		  		<div class="p-2">
		  			<button type="button" class="btn btn-outline-primary btn-md" id="btnEditP" onclick="actSave();">Editar</button>
		  		</div>
		  		<div class="p-2">
		  			<button type="button" class="btn btn-outline-success btn-md" id="btnSaveP" value="<?php echo $provider[0]->IdProveedor; ?>" name="eIdProvider" onclick="saveProv(this.value);">Guardar</button>
		  		</div>
		  		<div class="p-2">
		  			<button type="button" class="btn btn-outline-danger btn-md" id="btnCancelP" onclick="actSave();">Cancelar</button>
		  		</div>
		  	</div>
		  	<div class="d-flex flex-wrap flex-column justify-content-center bg-transparent ">
		  		<div class="d-flex flex-wrap justify-content-around">
		  			<div class="p-2 flex-fill">
		  				<label for="edtxtName">Nombre:</label>
		  				<input class="form-control " type="text" name="edtxtName" id="edtxtName" value="<?php echo $provider[0]->Empresa; ?>" disabled>
		  			</div>
		  			<div class="p-2 flex-fill">
		  				<label for="edtxtEmail">Email:</label>
		  				<input class="form-control " type="text" name="edtxtEmail" id="edtxtEmail" value="<?php echo $provider[0]->Email; ?>" disabled>
		  			</div>
		  			<div class="p-2 ">
		  				<label for="edtxtTelefono">Telefono:</label>
		  				<input class="form-control " type="text" name="edtxtTelefono" id="edtxtTelefono" value="<?php echo $provider[0]->Telefono; ?>" disabled>
		  			</div>
		  		</div>
		  		<div class="d-flex flex-wrap justify-content-around">
		  			<div class="p-2 flex-fill">
		  				<label for="edtxtGiro">Giro:</label>
		  				<input class="form-control " type="text" name="edtxtGiro" id="edtxtGiro" value="<?php echo $provider[0]->Giro; ?>" disabled>
		  			</div>
		  			<div class="p-2 flex-fill">
		  				<label for="edtxtSector">Sector:</label>
		  				<input class="form-control " type="text" name="edtxtSector" id="edtxtSector" value="<?php echo $provider[0]->Sector; ?>" disabled>
		  			</div>
		  			<div class="p-2 flex-fill">
		  				<label for="edtxtTipoProveedor">TipoProveedor:</label>
		  				<input class="form-control " type="text" name="edtxtTipoProveedor" id="edtxtTipoProveedor" value="<?php echo $provider[0]->TipoProveedor; ?>" disabled>
		  			</div>
		  		</div>
		  		<div class="d-flex flex-wrap justify-content-around">

		  			<div class="p-2 flex-fill">
		  				<label for="edtxtCalle">Calle:</label>
		  				<input class="form-control " type="text" name="edtxtCalle" id="edtxtCalle" value="<?php echo $provider[0]->Calle; ?>" disabled>
		  			</div>
		  			<div class="p-2">
		  				<label for="edtxtNumExterior">NumExterior:</label>
		  				<input class="form-control " type="text" name="edtxtNumExterior" id="edtxtNumExterior" value="<?php echo $provider[0]->NumExterior; ?>" disabled>
		  			</div>
		  			<div class="p-2">
		  				<label for="edtxtNumInterior">NumInterior:</label>
		  				<input class="form-control " type="text" name="edtxtNumInterior" id="edtxtNumInterior" value="<?php echo $provider[0]->NumInterior; ?>" disabled>
		  			</div>
		  		</div>
		  		<div class="d-flex flex-wrap justify-content-around">
		  			<div class="p-2 flex-fill">
		  				<label for="edtxtColonia">Colonia:</label>
		  				<input class="form-control " type="text" name="edtxtColonia" id="edtxtColonia" value="<?php echo $provider[0]->Colonia; ?>" disabled>
		  			</div>
		  			<div class="p-2">
		  				<label for="edtxtCiudad">Ciudad:</label>
		  				<input class="form-control " type="text" name="edtxtCiudad" id="edtxtCiudad" value="<?php echo $provider[0]->Ciudad; ?>" disabled>
		  			</div>
		  			<div class="p-2 ">
		  				<label for="edtxtEstado">Estado:</label>
		  				<input class="form-control " type="text" name="edtxtEstado" id="edtxtEstado" value="<?php echo $provider[0]->Estado; ?>" disabled>
		  			</div>
		  			<div class="p-2 ">
		  				<label for="edtxtCodigoPostal">Código Postal:</label>
		  				<input class="form-control " type="text" name="edtxtCodigoPostal" id="edtxtCodigoPostal" value="<?php echo $provider[0]->CodigoPostal; ?>" disabled>
		  			</div>
		  		</div>
		  		<br>
		  		<br>
		  	</div>
</form>
		  </div>
		  <div class="tab-pane container" id="servicios">
		  	<div class="d-flex flex-wrap justify-content-end">
		  		<div class="p-2">
		  			<button type="button" class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#newService" onclick="disabledBtn();">Nuevo Servicio</button>
		  		</div>
		  	</div>
		  	<div class="d-flex flex-wrap justify-content-center flex-column">
		  				  	<table class="table table-hover" id="tblServicios">
		  					    <thead>
		  					      <tr>
		  					        <th>#</th>
		  					        <th>Servicio</th>
		  					        <th>Descripcion</th>
		  					        <th>Precio</th>
		  					        <th>Acciones</th>
		  					      </tr>
		  					    </thead>
		  					    <tbody>
		  					      

		  		  		<?php 
		  			  		if($services){
		  			  			$sr = true;
		  			  		  	$i = 1;
		  		  				foreach($services as $service){
		  		  					echo "<tr>";
		  		  			?>		
		  		  				<form action="#" method="POST">
		  					<?php 
		  		  					echo "<td>" . $i . "</td>";
		  		  					echo "<td>" . $service->Servicio . "</td>";
		  		  					echo "<td>" . $service->Descripcion . "</td>";
		  		  					echo "<td>" . $service->Precio . "</td>";
		  		  					echo "<td>";
		  		  			?>		
		  		  				<button type="button"   class="btn btn-outline-warning" onclick="delService('<?php echo $service->idServicio; ?>')">Borrar</button>
		  		  				<button type="button"   class="btn btn-outline-primary" onclick="edService('<?php echo $service->idServicio; ?>')">Editar</button>
		  					<?php 

		  		  					echo "</td>";
		  		  					echo "</form>";
		  		  					echo "</tr>";

		  		  					$i++;

		  		  				}
		  			  	?>		

		  				<?php

		  					}else if(!$services){
		  						$sr = 0;

		  		  		?>
		  		  		    <tr>
		  		  		      <h6>NO existen servicios a mostrar.</h6>
		  		  		    </tr>
	  		  			<?php

		  					}

		  		  		?>
		  		  		  </tbody>
		  		  		</table>

		  	</div>
		  	
		  </div>
		  <div class="tab-pane container" id="fletes">
		  			  	<div class="d-flex flex-wrap justify-content-end">
		  			  		<div class="p-2">
		  			  			<button type="button" class="btn btn-outline-primary btn-md" onclick="alert('En construcción...')";<?php //addModalFletes(0); ?>"  >Nuevo Flete</button>
		  			  		</div>
		  			  	</div>
		  			  	<div class="d-flex flex-wrap justify-content-center flex-column">
		  			  				  	<table class="table table-hover" id="tblFletes">
		  			  					    <thead>
		  			  					      <tr>
		  			  					        <th>#</th>
		  			  					        <th>Origen</th>
		  			  					        <th>Destino</th>
		  			  					        <th>Descripcion</th>
		  			  					        <th>Precio ($_MNX)</th>
		  			  					        <th>Distancia (Km)</th>
		  			  					        <th>Acciones</th>
		  			  					      </tr>
		  			  					    </thead>
		  			  					    <tbody>
		  			  					      

		  			  		  		<?php 
		  			  			  		if($fletes){
		  			  			  			$fl = true;
		  			  		  				foreach($fletes as $flete){
		  			  		  					echo "<tr>";
		  			  		  			?>		
		  			  		  				<form action="#" method="POST">
		  			  					<?php 
		  			  		  					echo "<td>" . $flete->idFlete . "</td>";
		  			  		  					echo "<td>" . $flete->Origen . "</td>";
		  			  		  					echo "<td>" . $flete->Destino . "</td>";
		  			  		  					echo "<td>" . $flete->Descripcion . "</td>";
		  			  		  					echo "<td>" . $flete->Precio . "</td>";
		  			  		  					echo "<td>" . $flete->Distancia . "</td>";
		  			  		  					echo "<td>";
		  			  		  			?>		
		  			  		  				<button type="button"  class="btn btn-outline-warning" value="">Borrar</button>
		  			  					<?php 

		  			  		  					echo "</td>";
		  			  		  					echo "</form>";
		  			  		  					echo "</tr>";

		  			  		  				}
		  			  			  	?>		

		  			  				<?php

		  			  					}else{
		  			  						$fl = 0;

		  			  		  		?>
		  			  		  		    <tr>
		  			  		  		      <h6>NO existen servicios a mostrar.</h6>
		  			  		  		    </tr>
		  		  		  			<?php

		  			  					}
		  			  		  		?>
		  			  		  		  </tbody>
		  			  		  		</table>

		  			  	</div>
		  			  	

		  </div>
		</div>

 	</div>
 
<!--
NEW SERVICE MODAL
-->
<div class="modal fade" id="newService">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Nuevo servicio para <?php echo $provider[0]->Empresa; ?></h4>
        <button type="button" class="close" data-dismiss="modal" onclick="resetInputs();">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
        <div class="row">
        	<div class="col-lg-5">
        		<label for="txtServicio"> Nombre del Servicio:</label>
        		<div class="input-group mb-3">
        		  <input type="text" class="form-control  text-left"  id="txtServicio" name="txtServicio">
        		  
        		</div>
        	</div>
        	<div class="col-lg-5">
        		<label for="txtDescripcion"> Descripción:</label>
        		<div class="input-group mb-3">
        		  <textarea  rows="2" class="form-control text-justify"  id="txtDescripcion" name="txtDescripcion"></textarea>
        		</div>
        	</div>
        	<div class="col-lg-2">
        		<label for="txtPrecio"> Costo($MNX):</label>
        		<div class="input-group mb-3">
        		  <input type="number" min="0.05" step="0.05" class="form-control text-right"  id="txtPrecio" name="txtPrecio" value="0.00">
        		   
        		</div>
        	</div>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<div class="container clearfix">
	        <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal" onclick="resetInputs();">Cancelar</button>
	        <button type="button" class="btn btn-outline-success float-left" onclick="addService(<?php echo $provider[0]->IdProveedor; ?>);" id="btnNewService">Guardar</button>
	        <button type="button" class="btn btn-outline-primary float-left" onclick="editService(this.value);" id="btnEditService">Guardar</button>
	    </div>
    </div>
  </div>
</div>




 <script type="text/javascript">
 	let fletes = <?php echo $fl; ?>;
 	let services = <?php echo $sr; ?>;
 	window.onload = function(){
 		console.log (fletes);
 		console.log (services);
 		if(fletes == 0){
 			alert("Agregar Fletes!");
 		}else{
 			fillFletes();
 		}
 		if(services == 0){
 			alert("Agregar Servicios!");
 		}else{
 			fillServices();
 		}
		btnCancelProvider.style.display ='none';
 		btnSaveProvider.style.display ='none';
 		edtxtName.disabled = true;
 		edtxtEmail.disabled = true;
 		edtxtTelefono.disabled = true;
 		edtxtGiro.disabled = true;
 		edtxtSector.disabled = true;
 		edtxtTipoProveedor.disabled = true;
 		edtxtCalle.disabled = true;
 		edtxtNumExterior.disabled = true;
 		edtxtNumInterior.disabled = true;
 		edtxtColonia.disabled = true;
 		edtxtCiudad.disabled = true;
 		edtxtEstado.disabled = true;
 		edtxtCodigoPostal.disabled = true;


 	};

 	let btnNewService= document.getElementById('btnNewService');
 	let btnEditService = document.getElementById('btnEditService');

 	function disabledBtn(){
 		if(btnNewService.style.display = 'none')
 			btnNewService.style.display = 'block';
 		if(btnEditService.style.display = 'block')
 			btnEditService.style.display = 'none';

 	}

 	function enabledBtn(){
 		if(btnNewService.style.display = 'block')
 			btnNewService.style.display = 'none';
 		if(btnEditService.style.display = 'none')
 			btnEditService.style.display = 'block';

 	}

 	const btnEditProvider = document.getElementById('btnEditP');
 	const btnSaveProvider = document.getElementById('btnSaveP');
 	const btnCancelProvider = document.getElementById('btnCancelP');
 	const edtxtName = document.getElementById('edtxtName');
 	const edtxtEmail = document.getElementById('edtxtEmail');
 	const edtxtTelefono = document.getElementById('edtxtTelefono');
 	const edtxtGiro = document.getElementById('edtxtGiro');
 	const edtxtSector = document.getElementById('edtxtSector');
 	const edtxtTipoProveedor = document.getElementById('edtxtTipoProveedor');
 	const edtxtCalle = document.getElementById('edtxtCalle');
 	const edtxtNumExterior = document.getElementById('edtxtNumExterior');
 	const edtxtNumInterior = document.getElementById('edtxtNumInterior');
 	const edtxtColonia = document.getElementById('edtxtColonia');
 	const edtxtCiudad = document.getElementById('edtxtCiudad');
 	const edtxtEstado = document.getElementById('edtxtEstado');
 	const edtxtCodigoPostal = document.getElementById('edtxtCodigoPostal');

 	
 	function actSave(){
 		if(btnSaveProvider.style.display == 'none'){
			btnSaveProvider.style.display ='block';
			btnCancelProvider.style.display ='block';
 			btnEditProvider.style.display ='none';
 			edtxtName.disabled = false;
 			edtxtEmail.disabled = false;
 			edtxtTelefono.disabled = false;
 			edtxtGiro.disabled = false;
 			edtxtSector.disabled = false;
 			edtxtTipoProveedor.disabled = false;
 			edtxtCalle.disabled = false;
 			edtxtNumExterior.disabled = false;
 			edtxtNumInterior.disabled = false;
 			edtxtColonia.disabled = false;
 			edtxtCiudad.disabled = false;
 			edtxtEstado.disabled = false;
 			edtxtCodigoPostal.disabled = false;
 		}else{
 			btnSaveProvider.style.display ='none';
			btnCancelProvider.style.display ='none';
 			btnEditProvider.style.display ='block';
 			edtxtName.disabled = true;
 			edtxtEmail.disabled = true;
 			edtxtTelefono.disabled = true;
 			edtxtGiro.disabled = true;
 			edtxtSector.disabled = true;
 			edtxtTipoProveedor.disabled = true;
 			edtxtCalle.disabled = true;
 			edtxtNumExterior.disabled = true;
 			edtxtNumInterior.disabled = true;
 			edtxtColonia.disabled = true;
 			edtxtCiudad.disabled = true;
 			edtxtEstado.disabled = true;
 			edtxtCodigoPostal.disabled = true;
 		}
 	}
 	function fillFletes(){
	 		$('#tblFletes').DataTable({
	 			language:{
	 				processing : "En curso...",
	 				search : "Buscar:",
	 				lengthMenu: "Agrupar de _MENU_ items",
	 				info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
	 				infoEmpty: "NO existen datos...",
	 				infoFiltered : "(filtrando de _MAX_ elementos en total)",
	 				infoPostFix: "",
	 				//loadingRecords "Cargando...",
	 				zeroRecords: "No se encontraron datos con tu búsqueda.",
	 				emptyTable : "NO hay datos disponibles en la tabla.",
	 				paginate:{
	 					first: "Primero",
	 					previous : "Anterior",
	 					next: "Siguiente",
	 					last: "Último"
	 				},
	 				
	 			}
	 		});
	 	}
 	function fillServices(){
	 		$('#tblServicios').DataTable({
	 			language:{
	 				processing : "En curso...",
	 				search : "Buscar:",
	 				lengthMenu: "Agrupar de _MENU_ items",
	 				info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
	 				infoEmpty: "NO existen datos...",
	 				infoFiltered : "(filtrando de _MAX_ elementos en total)",
	 				infoPostFix: "",
	 				//loadingRecords "Cargando...",
	 				zeroRecords: "No se encontraron datos con tu búsqueda.",
	 				emptyTable : "NO hay datos disponibles en la tabla.",
	 				paginate:{
	 					first: "Primero",
	 					previous : "Anterior",
	 					next: "Siguiente",
	 					last: "Último"
	 				},
	 				
	 			}
	 		});
	 	}
    	
    	
    	

 	let editP = {};

	function saveProv(id){
		let provider = <?php print_r(json_encode($provider[0])); ?>;
		let cnt = 0;
		let ad = 0;
		let info = {};
		let address = {};
		
		
		if(edtxtName.value != provider.Empresa ){
			editP.IdProveedor = provider.IdProveedor;
			info.txtName = edtxtName.value;
			cnt++;
		}
		if(edtxtEmail.value != provider.Email ){
			editP.IdProveedor = provider.IdProveedor;
			info.txtEmail = edtxtEmail.value;
			cnt++;
		}
		if(edtxtTelefono.value != provider.Telefono ){
			editP.IdProveedor = provider.IdProveedor;
			info.txtPhone = edtxtTelefono.value;
			cnt++;
		}
		if(edtxtGiro.value != provider.Giro ){
			editP.IdProveedor = provider.IdProveedor;
			info.txtArea = edtxtGiro.value;
			cnt++;
		}
		if(edtxtSector.value != provider.Sector ){
			editP.IdProveedor = provider.IdProveedor;
			info.txtSector = edtxtSector.value;
			cnt++;
		}
		if(edtxtTipoProveedor.value != provider.TipoProveedor ){
			editP.IdProveedor = provider.IdProveedor;
			info.txtProviderType = edtxtTipoProveedor.value;
			cnt++;
		}
		if(edtxtCalle.value != provider.Calle ){
			editP.fk_eIdAddress = provider.IdDireccion;
			ad++;
			address.txtStreet = edtxtCalle.value;
			cnt++;
		}
		if(edtxtNumExterior.value != provider.NumExterior ){
			editP.fk_eIdAddress = provider.IdDireccion;
			ad++;
			address.txtOutNumber = edtxtNumExterior.value;
			cnt++;
		}
		if(edtxtNumInterior.value != provider.NumInterior ){
			editP.fk_eIdAddress = provider.IdDireccion;
			ad++;
			address.txtInNumber = edtxtNumInterior.value;
			cnt++;
		}
		if(edtxtColonia.value != provider.Colonia ){
			editP.fk_eIdAddress = provider.IdDireccion;
			ad++;
			address.txtColony = edtxtColonia.value;
			cnt++;
		}
		if(edtxtCiudad.value != provider.Ciudad ){
			editP.fk_eIdAddress = provider.IdDireccion;
			ad++;
			address.txtCity = edtxtCiudad.value;
			cnt++;
		}
		if(edtxtEstado.value != provider.Estado ){
			editP.fk_eIdAddress = provider.IdDireccion;
			ad++;
			address.txtState = edtxtEstado.value;
			cnt++;
		}
		if(edtxtCodigoPostal.value != provider.CodigoPostal ){
			editP.fk_eIdAddress = provider.IdDireccion;
			ad++;
			address.txtPostalCode = edtxtCodigoPostal.value;
			cnt++;
		}
		let bandI = false ;
		let bandA = false ;
		if(cnt > 0 ){
			editP.info = info;
			bandI = true;
		}
		if(ad > 0 ){
			bandI = true;
			editP.address = address;
		}
		if(bandI || bandA){
			editProvider();
		}else{
			actSave();
		}
		
	}

	function editProvider(){
		axios.post("<?php echo site_url('editProvider'); ?>" ,editP).then(
			function(res){
	          if (res.status == 200) {
	            if(res.data){
	            	alert("Datos Actualizados!");
	             window.location.reload();
	            }
	          }
	      	}).catch(function(err){
	          alert(err);
	          console.log(err);
	      	});
	}

	let txtServicio = document.getElementById('txtServicio');
	let txtDescripcion = document.getElementById('txtDescripcion');
	let txtPrecio = document.getElementById('txtPrecio');
	function editService(id){
		let obj = {};
		obj.eId = id;
		obj.txtServicio = txtServicio.value;
		obj.txtDescripcion = txtDescripcion.value;
		obj.txtPrecio = txtPrecio.value;
		axios.post("<?php echo site_url('editService'); ?>" ,obj).then(
			function(res){
	          if (res.status == 200) {
	            if(res.data){
		            alert("Servicio Actualizado Correctamente!");
		            window.location.reload();
		        }
	          }
      	}).catch(function(err){
          alert(err);
          console.log(err);
      	});
	}
	function edService(id){
		let obj = {};
		obj.eIdService = id;
		axios.post("<?php echo site_url('findService'); ?>" ,obj).then(
			function(res){
	          if (res.status == 200) {
	            if(res.data){
	            	enabledBtn();
	            	let data = res.data;
	            	btnEditService.value = data.eIdService;
	            	txtServicio.value=data.txtService;
	            	txtDescripcion.value =data.txtDescription;
	            	txtPrecio.value =data.flPrice;
	            	$('#newService').modal('show');
	            }
	          }
      	}).catch(function(err){
          alert(err);
          console.log(err);
      	});
	}
	function resetInputs(){
		txtServicio.value = '';
		txtDescripcion.value = '';
		txtPrecio.value = '0.00';

	}

	function addService(id){
		let band = 0;
		let obj = {};
		obj.IdProveedor = id;
		if(txtServicio.value !=''){
			obj.servicio = txtServicio.value;
		}else{
			alert("Completar el nombre del servicio");
			txtServicio.focus();
			return;
		}
		if(txtDescripcion.value !=''){
			obj.descripcion = txtDescripcion.value;
		}else{
			alert("Completar la descripción del servicio");
			txtDescripcion.focus();
			return;
		}
		if(txtPrecio.value !='0.00'){
			obj.precio = txtPrecio.value;
		}else{
			alert("Completar el precio del servicio");
			txtPrecio.focus();
			return;
		}
			axios.post("<?php echo site_url('addService'); ?>" ,obj).then(
				function(res){
		          if (res.status == 200) {
		            if(res.data){
		            	alert("Servicio Agregado!");
		             window.location.reload();
		            }
		          }
		      	}).catch(function(err){
		          alert(err);
		          console.log(err);
		      	});
	}
	function delService(id){
		let obj = {};
		obj.eIdProveedor = id;
		if(confirm("Desea eliminar el servicio?")){
			axios.post("<?php echo site_url('delService'); ?>" ,obj).then(
				function(res){
		          if (res.status == 200) {
		            if(res.data){
		            	alert("Servicio Eliminado!");
		             window.location.reload();
		            }
		          }
		      	}).catch(function(err){
		          alert(err);
		          console.log(err);
		      	});
		}
	}


	//FLETES
	 function addModalFletes(opt){
	 		switch(opt){
	 			case 0:
	 			cleanInputFlete();
	 			fillFletesTypes();
	 			$('#newFProv').modal('show');
	 		}
	 }

	 let txtOrigen = document.getElementById('txtOrigen');
	 let txtDestino = document.getElementById('txtDestino');
	 let txtPrecioF = document.getElementById('txtPrecio');
	 let txtDistancia = document.getElementById('txtDistancia');
	 let txtDescripcionF = document.getElementById('txtDescripcionF');
	 let eTipo = document.getElementById('eTipo');
	 let modTitFle = document.getElementById('modTitFle');
	 let btnSaveFlete = document.getElementById('btnSaveFlete');

	 function cleanInputFlete(){
	 		btnSaveFlete.value = true;
	 		modTitFle.innerHTML ="Nuevo Flete"
	 		txtOrigen.value = "";
	 		txtDestino.value = "";
	 		txtPrecioF.value = "0.00";
	 		txtDistancia.value = "";
	 		txtDescripcionF.value = "";
	 		eTipo.value = '0';
	 }
	 function fillFletesTypes(){
	 			axios.get("<?php echo site_url('getFletesTypes'); ?>").then(
	 				function(res){
	 		          if (res.status == 200) {
	 		            if(res.data){
	 		            	let data = res.data;
	 		            	let item ='<option value = "0">Seleccione opción</option>';
	 		            	for(dat of data){
	 		            		item +='<option title ="'+dat.txtFDescription+'" value = "'+dat.eIdFType+'">'+dat.txtFType+'</option>';
	 		            	}
										eTipo.innerHTML = item;	 		            	
	 		            }
	 		          }
	 		      	}).catch(function(err){
	 		          alert(err);
	 		          console.log(err);
	 		      	});
	 }
	 function saveFlete(op){
	 		let obj = {};

	 		if(eTipo.value != '0'){
	 			obj.eTipo = eTipo.value;
	 		}else{
	 			alert("Agregar un Tipo de Flete");
	 			eTipo.focus();
	 			return;
	 		}

	 		if(txtOrigen.value != ''){
	 			obj.txtOrigen = txtOrigen.value;
	 		}else{
	 			alert("Agregar un Origen");
	 			txtOrigen.focus();
	 			return;
	 		}

	 		if(txtDestino.value != ''){
	 			obj.txtDestino = txtDestino.value;
	 		}else{
	 			alert("Agregar un Destino");
	 			txtDestino.focus();
	 			return;
	 		}

	 		if(txtPrecioF.value != '0.00'){
	 			obj.txtPrecioF = txtPrecioF.value;
	 		}else{
	 			alert("Agregar un Precio");
	 			txtPrecioF.focus();
	 			return;
	 		}

 			obj.txtDistancia = txtDistancia.value;
 			obj.txtDescripcionF = txtDescripcionF.value;

	 		if(op){ 
	 				axios.post("<?php echo site_url('addFlete'); ?>" ,obj).then(
	 					function(res){
	 			          if (res.status == 200) {
	 			            if(res.data){
	 			            	console.log(res.data);
	 			            	//alert("Flete agregado correctamente!");
	 			             //window.location.reload();
	 			            }
	 			          }
	 			      	}).catch(function(err){
	 			          alert(err);
	 			          console.log(err);
	 			      	});
	 		}
	 		else{alert("Editar");}
	 }
 </script>

 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	