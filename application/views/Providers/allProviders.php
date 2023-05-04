
<section class="d-flex flex-column ">
	
	<div class="mt-1 d-flex border border-black rounded flex-nowrap justify-content-between align-items-center align-content-center bg-light ">
		<div class="d-flex flex-wrap justify-content-start "> 

					<div class="p-2">
						<a href="<?php echo site_url('dashboard'); ?>" class="btn btn-sm btn-outline-primary" >Regresar</a>
					</div>


				</div>


		<div class="d-flex flex-wrap justify-content-end "> 

			

			<div class="p-2">
				<button class="btn btn-sm btn-outline-success" onclick="modNwProvider()">Agregar Proveedor</button>
			</div>

		</div>

	</div>
	

	<div class="mt-1  d-flex rounded flex-wrap flex-container  justify-content-center  bg-light">
		<div class="text-center border border-black rounded" >
			<br>
		<table class="table table-responsive p-2	" id="tblListadoEmpresas" >
		    <thead>
		        <tr >
		            <th>#</th>
		            <th>Empresa</th>
		            <th>Tipo</th>
		            <th>Giro</th>
		            <th>Sector</th>
		            <th>Acciones</th>
		        </tr>
		    </thead>
		    <style type="text/css">
		    	.liContact{
		    		font-size: .8vw;
		    	}
		    </style>
		    <tbody >
		    	<?php 
		    		$usuario = "";
		    		if($allProviders){
		    			$i = 1;
		    			foreach ($allProviders as $provider ) {
		    				foreach ($allUsers as $user) {
		    					if($user['userID'] == $provider['Autor']){
		    						$usuario = $user;
		    					}
		    				}

		    			
		    				echo '<tr>';
			    				echo '<form action= '. site_url('getProviderData') .' method="POST">';
									echo '<td>'.$provider["IdProveedor"].'</td>';
									echo '<td>'.$provider["Empresa"].'</td>';
									echo '<td>'.$provider["TipoProveedor"].'</td>';
									echo '<td>'.$provider["Giro"].'</td>';
									echo '<td>'.$provider["Sector"].'</td>';
									echo '<td>';
										echo '<div class="d-flex flex-wrap justify-content-around">';
											echo '<div class="p-1">';
												echo '<button type="submit" class="btn btn-outline-secondary btn-sm" name="eIdProvider"  value ="'.$provider["IdProveedor"].'">Información</button>';
											echo '</div>';
										echo '</div>';
									echo '</td>';
								echo "</form>";
							echo '</tr> ';
							
							$i++;
		    			}

		    		}else{


		    	 ?>

		       <tr>
		       	<form action="<?php echo site_url('getProviderData') ?>" method="POST">
		       		<td>1</td>
		       		<td>Empresa de Ejemplo</td>
		       		<td>Transportista</td>
		       		<td>Transporte Terrestre</td>
		       		<td>Alimentario</td>
		       		<td>
		       			<button type="success" class="btn btn-outline-secondary" name="eIdProvider" value="0">Información</button>
		       		</td>
		       	</form>
		       </tr> 
<?php 		    		

} ?>		        
		        
		        
		    </tbody>
		</table>
	</div>
		<div class="d-flex	flex-wrap flex-container justify-content-center">
			<div class="p-2 flex-fill">
				<ul class="pagination pagination-lg pager" id="developer_page"></ul>
				
			</div>
		</div>
	</div>


	</div>
</section>
<script type="text/javascript">
	const allProviders = <?php print_r(json_encode($allProviders)) ?>;

	$(document).ready( function () {
    	$('#tblListadoEmpresas').DataTable({
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

	function edProvider(id){
		for(var provider of allProviders){
			if(provider.IdProveedor  == id){
				modEdit(provider);
				break;
			}
		}
	}




	function vwContact(id){
		for(var provider of allProviders){
			if(provider.IdProveedor  == id){
				modContact(provider);
				break;
			}
		}
	}
	
	


</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
