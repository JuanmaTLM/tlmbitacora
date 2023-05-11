

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
			      			<button type="button" class="btn btn-outline-primary btn-sm" onclick="getInfo(<?php echo $user['userID']; ?>);"> Información </button>
			      			<?php if($user['uActivo'] == 1){
			      				echo '<button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeStatusU(' .$user['userID']. ',0);"> Desactivar </button>';
			      			}else{
			      				echo '<button type="button" class="btn btn-outline-warning btn-sm" onclick="changeStatusU(' .$user['userID']. ',0);"> Activar </button>';

			      			} ?>

			      			<button type="button" class="btn btn-outline-secondary btn-sm" onclick="resetPass(<?php echo $user['userID']; ?>,1);"> Reestablecer Contraseña </button>
			      			<button type="button" class="btn btn-outline-danger btn-sm" onclick="changeStatusU(<?php echo $user['userID']; ?>,1);"> Eliminar </button>
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

<script type="text/javascript">
	function changeStatusU(id,op){
		console.log("ID: " + id);
		console.log("OP:" + op);
		let url = "";
		if(op == 0){
			url = "<?php echo site_url('changeStatusUser') ?>";
			changeStatusUsr(url,id);
		}else{
			if(confirm("Seguro de eliminar al usuario?")){
				url = "<?php echo site_url('deleteUser') ?>";
				deleteUsr(url,id);
			}
		}
	}
	function changeStatusUsr(url,id){
		let user ={}; 
		user.id = id;
		axios.post(url,user).then(
		  function(res){
		        if (res.status == 200) {
		          if(res.data == 1){
		          	alert("Cambios Realizados Correctamente!")
		          	window.location.reload();
		          }else{
		          	alert("Cambios no realizados!")

		          }
		        }
		  }).catch(function(err){
		    alert(err);
		    console.log(err);
		  });
	}
	function deleteUsr(url,id){
		let user ={}; 
		user.id = id;
		axios.post(url,user).then(
		  function(res){
		        if (res.status == 200) {
		          if(res.data == 1){
		          	alert("Usuario Eliminado Correctamente!")
		          	window.location.reload();
		          }else{
		          	alert("Usuario NO Eliminado!")

		          }
		        }
		  }).catch(function(err){
		    alert(err);
		    console.log(err);
		  });
	}

	function resetPass(id){
		let data ={};
		data.userId = id;
		axios.post("<?php echo site_url('resetPass') ?>",data).then(
		  function(res){
		        if (res.status == 200) {
		        	console.log(res.data);
		          /*if(res.data == 1){
		          	alert("Contraseña Generada Correctamente!")
		          	window.location.reload();
		          }else{
		          	alert("Usuario NO Eliminado!")

		          }*/
		        }
		  }).catch(function(err){
		    alert(err);
		    console.log(err);
		  });
	}
</script>

