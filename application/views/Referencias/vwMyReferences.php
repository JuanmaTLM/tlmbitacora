
			<div class="flex-fill">
				
				<div class="d-flex flex-wrap justify-content-center mb-5 p-2 rounded  bg-primary ">
					
					<div class="p-1 flex-container">
						<div class=" p-2 d-flex flex-column table-responsive bg-white rounded " >
						  <table class="table text-center " id="tblReferencias">
						    <thead class="text-center">
						      <tr>
						        <th scope="col" class="text-center">ReferenciaTLM</th>
						        <th scope="col" class="text-center">Referencia Agencia Aduanal</th>
						        <th scope="col" class="text-center">Fecha</th>
						        <th scope="col" class="text-center">Cliente</th>
						        <th scope="col" class="text-center">ETA</th>
						        <th scope="col" class="text-center">Naviera</th>
						        <th scope="col" class="text-center">Acciones</th>
						      </tr>
						    </thead>
						    <tbody id="refList">
						     
						    </tbody>
						  </table>
						</div>

					</div>
				</div>
			</div>
			
		</div>
		
		
	</div>
</div>

<script type="text/javascript">
	const tableReferences = document.getElementById('refList');
	fillmyRefs(tableReferences);

	$(document).ready( function () {
    	$('#tblReferencias').DataTable({
    		language:{
    			processing : "En curso...",
    			search : "Buscar:",
    			lengthMenu: "Agrupar de _MENU_ items",
    			info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
    			infoEmpty: "",
    			infoFiltered : "(filtrando de _MAX_ elementos en total)",
    			infoPostFix: "",
    			zeroRecords: "",
    			emptyTable : "",
    			paginate:{
    				first: "Primero",
    				previous : "Anterior",
    				next: "Siguiente",
    				last: "Último"
    			},
    			
    		}
    	});

	} );


	function seguimiento(idRef){
		window.location.href = "<?php echo site_url('clasGlosa') ?>" + "?eIdReferencia=" + idRef ;
		
	}



</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>