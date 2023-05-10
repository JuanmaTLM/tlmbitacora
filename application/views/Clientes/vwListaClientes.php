<style type="text/css">

	table{
		width: 100% !important;
	}
	.info{
		font-size: 1.3vh;
	}
</style>
<div id="divClientsList" class=" mt-2 d-flex flex-wrap justify-content-center flex-container bg-white rounded "> 
	<div class="p-2">
		<table class="table table-hover" id="tblClientes">
		   <thead>
		     <tr>
		       <th>#</th>
		       <th>Nombre/Razón Social</th>
		       <th>RFC</th>
		       <th>Datos de Contacto</th>
		       <th>Dirección</th>
		       <th>Acciones</th>
		     </tr>
		   </thead>
		   <tbody>
		   	<?php 
		   	if(isset($allClients)){
		   		$i = 0;
		   		foreach($allClients as $client){
		   			
		   			$i++;


 			?>
 			<tr>
 			  <td><?php echo $i; ?></td>
 			  <td><?php

 			  		if($client['Tipo'] == 1){
 			  			echo $client['NombreCompleto'];
 			  		}else{
 			  			echo $client['txtRazonSocial'];
 			  		}
 			   	  	
 			   	  ?>
 			  </td>
 			  <td><?php echo $client['RFC']; ?></td>
 			  <td><button type="button" class="btn btn-outline-dark btn-sm" data-toggle="collapse" data-target="#contactData_<?php echo $i; ?>">Datos de Contacto</button>
 			  	<div id="contactData_<?php echo $i; ?>" class="collapse">
 			  		<div class="d-flex flex-wrap justify-content-start flex-column">
 			  			<div >
 			  				<label class="info"><strong>Teléfono:</strong> <?php echo $client['Telefono'] ?></label>
 			  			</div>
 			  			<div >
 			  				<label class="info"><strong>Email:</strong> <?php echo $client['Email'] ?></label>
 			  			</div>
 			  		</div>
 			  	</div>

 			  </td>
 			  <td><button type="button" class="btn btn-outline-dark btn-sm" data-toggle="collapse" data-target="#contactDir_<?php echo $i; ?>">Dirección</button>
 			  <div id="contactDir_<?php echo $i; ?>" class="collapse">
		  		<div class="d-flex flex-wrap justify-content-start flex-column">
		  			<div >
		  				<label class="info"><strong>Calle:</strong> <?php echo $client['Calle'] ?></label>
		  			</div>
		  			<div >
		  				<label class="info"><strong>Colonia:</strong> <?php echo $client['Colonia'] ?></label>
		  			</div>
		  			<div >
		  				<label class="info"><strong>#_Exterior:</strong> <?php echo $client['NumExt'] ?></label>
		  			<?php if($client['NumInt'] != '' || $client['NumInt'] != NULL){ ?>
		  				<label class="info"><strong>#Interior:</strong> <?php echo $client['NumInt'] ?></label>
		  			<?php } ?>
		  			</div>
		  			<div>
		  				<label class="info"><strong>CodigoPostal:</strong> <?php echo $client['CodigoPostal'] ?></label>
		  			</div>
		  			<div >
		  				<label class="info"><strong>Ciudad:</strong> <?php echo $client['Ciudad'] ?></label>
		  			</div>
		  			<div >
		  				<label class="info"><strong>Estado:</strong> <?php echo $client['Estado'] ?></label>
		  			</div>
		  			<div >
		  				<label class="info"><strong>Pais:</strong> <?php echo $client['Pais'] ?></label>
		  			</div>
		  			
		  		</div>
		  	</div>	
			  </td>
 			  <td>
 			  	<?php if($client['EstatusC'] == 1){ ?>
 			  		<button type="button" class="btn btn-outline-primary"><i class='fas fa-eye'></i></button>
 			  	<?php }else{ ?>
 			  		<button type="button" class="btn btn-outline-warning"><i class='far fa-eye-slash'></i></button>
 			  	<?php 	} ?>

 			  </td>
 			</tr>
			
		   	<?php
		   		}

		   	}
		   	 ?>
		    
		   </tbody>
		 </table>
	</div>
	

</div>

<script type="text/javascript">

	$(document).ready( function () {
    	$('#tblClientes').DataTable({
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
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
