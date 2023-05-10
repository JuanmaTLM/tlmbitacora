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
		  			<button type="button" class="btn btn-outline-primary btn-md">Nuevo Servicio</button>
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
		  		  				foreach($services as $service){
		  		  					echo "<tr>";
		  		  			?>		
		  		  				<form action="#" method="POST">
		  					<?php 
		  		  					echo "<td>" . $service->idServicio . "</td>";
		  		  					echo "<td>" . $service->Servicio . "</td>";
		  		  					echo "<td>" . $service->Descripcion . "</td>";
		  		  					echo "<td>" . $service->Precio . "</td>";
		  		  					echo "<td>";
		  		  			?>		
		  		  				<button type="button"   class="btn btn-outline-warning" value="">Borrar</button>
		  					<?php 

		  		  					echo "</td>";
		  		  					echo "</form>";
		  		  					echo "</tr>";

		  		  				}
		  			  	?>		

		  				<?php

		  					}else{

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
		  			  			<button type="button" class="btn btn-outline-primary btn-md">Nuevo Flete</button>
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
 

 <script type="text/javascript">

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

 	window.onload = function(){
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
 	$(document).ready( function () {
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
    	

	} );
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
 </script>

 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	