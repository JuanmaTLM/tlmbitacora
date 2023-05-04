<section class="d-flex flex-column ">
	<div class="mt-1 d-flex border border-black rounded flex-nowrap justify-content-end align-items-center align-content-center bg-light ">
		
<div class="d-flex flex-wrap justify-content-start "> 

			<div class="p-2">
				<a href="<?php echo site_url('dashboard'); ?>" class="btn btn-sm btn-outline-primary" >Regresar</a>
			</div>


		</div>
		<div class="p-2  d-flex flex-wrap justify-content-end "> 

			<div class="">
				<button class="btn btn-sm btn-outline-success" onclick="newCot()">Nueva Cotización</button>
				<a href="<?php echo site_url('nwCotizacion') ?>" class="btn btn-sm btn-outline-success">Cotización Cliente</a>
			</div>

		</div>


	</div>
	<div class="mt-1  d-flex rounded flex-wrap  justify-content-center align-items-center align-content-center bg-light ">
		<div class="text-center container ">
		<table class="table table-responsive" id="listadoCotizaciones">
		    <thead>
		        <tr >
		            <th>#</th>
		            <th>Cliente</th>
		            <th>Fecha de Emisión</th>
		            <th>Proyecto</th>
		            <th>Vigencia</th>
		            <th>Moneda</th>
		            <th>Tipo de Cambio</th>
		            <th>Días de Crédito</th>
		            <th>Subtotal</th>
		            <th>IVA</th>
		            <th>Retencion</th>
		            <th>Total</th>
		            <th>Acciones</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    	
		    	$i = 1;
		    	 foreach ($allCotizaciones as $cotizacion) {
		    		?>
		    	<tr>
			        <td><?php echo $cotizacion['IdCot'] ?></td>
	                <td>
	                	<a data-toggle="collapse" href="#dataClient_<?php echo $i; ?>">
	                		<?php echo $cotizacion['NombreCompleto'] ?>
	                	</a>
	                	<div id="dataClient_<?php echo $i; ?>" class="panel-collapse collapse">
	        			    <ul class="list-group">
	        			        <li class="list-group-item">Email: <?php echo $cotizacion['Email'] ?></li>
	        			        <li class="list-group-item">Telefono: <?php echo $cotizacion['Telefono'] ?></li>
	        			        <li class="list-group-item">RFC: <?php echo $cotizacion['RFC'] ?></li>
	        			    </ul>
	        		    </div>
	            	</td>
			        <td><?php echo $cotizacion['feEmision'] ?> </td>
			        <td><?php echo $cotizacion['txtProyecto'] ?> </td>
			        <td><?php echo $cotizacion['txtVigencia'] ?> </td>
			        <td><?php echo $cotizacion['txtMoneda'] ?> </td>
			        <td><?php echo $cotizacion['txtTipoCambio'] ?></td>
			        <td><?php echo $cotizacion['txtDiasCredito'] ?> </td>
			        <td><?php echo $cotizacion['flSubtotal'] ?> </td>
			        <td><?php echo $cotizacion['flIVA'] ?> IVA</td>
			        <td><?php echo $cotizacion['flRetencion'] ?> </td>
			        <td><?php echo $cotizacion['flTotal'] ?> Total</td>
			        <td><button type="button" class="btn btn-outline-info btn-sm" title="Generar PDF"></button></td>
		    	</tr>
		        
		       <?php $i++;	 } ?> 
		    </tbody>
		</table>
	</div>
		
	</div>


	</div>
</section>


<script type="text/javascript">

	$(document).ready( function () {
    	$('#listadoCotizaciones').DataTable({
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
    			//aria:
    			//		sortAscending ": active para ordenar la columna en orden Ascendente",
    			//		sortDescending ": active para ordenar la columna en orden Descendente"
    		}
    	});

	} );


</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
