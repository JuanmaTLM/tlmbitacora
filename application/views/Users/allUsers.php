

<div class="d-flex flex-wrap flex-column">
	<div class="d-flex flex-wrap justify-content-between "> 

					<div class="p-2">
						<a href="<?php echo site_url('dashboard'); ?>" class="btn btn-sm btn-outline-primary" >Regresar</a>
					</div>


				</div>
	<div class="mt-1 d-flex flex-wrap justify-content-end bg-light">
		<div class="p-2">
				<button type="button" class="btn btn-outline-success" onclick="addUser();">Agregar Usuario</button>
		</div>
	</div>
	<div class="mt-1 d-flex flex-wrap flex-column justify-content-center align-items-center align-content-center bg-light">
		<div class="p-2 flex-container flex-fill">
			<table class="table table-responsive p-2	" id="tblListadoUsuarios" >
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Usuario</th>
			        <th>Nombre Completo</th>
			        <th>Clave Empleado </th>
			        <th>Tipo de Usuario </th>
			        <th>Acciones</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php 
			      	foreach($allUsers as $user){
			      	?>
			      	<tr>
			      		<td> <?php echo $user['userID']; ?></td>
			      		<td> <?php echo $user['Usuario']; ?></td>
			      		<td> <?php echo $user['NombreCompleto']; ?></td>
			      		<td> <?php echo $user['CveEmpleado']; ?></td>
			      		<td> <?php echo $user['TipoUsuario']; ?></td>
			      		<td> 
			      			<button type="submit" class="btn btn-outline-primary btn-sm"> Información </button>
			      		</td>
			      	</tr>




			      <?php	}
			       ?>
			    </tbody>
			  </table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
    	$('#tblListadoUsuarios').DataTable({
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