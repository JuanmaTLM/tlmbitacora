<?php  ?>
<style type="text/css">
	.card{
	  border-radius: 8px;
	  border: 1px solid #cccccc;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	  padding: 5px;
	  box-sizing: border-box;
	  width: 200px;
	  height: 200px;
	  transition: all linear 200ms;
	}
</style>

<div class="d-flex flex-wrap justify-content-center align-items-center align-content-center bg-white mt-2"> 
	<div class="m-2 " id="mnuUsers">
		<form action="<?php echo site_url('users') ?>" method="POST">
			
			<button type="submit" class="btn btn-lg btn-outline-primary	">Usuarios</button>
		</form>
	</div>
	<div class="m-2 " id="mnuCotizaciones">
		<form action="<?php echo site_url('cotizaciones') ?>" method="POST">
			
			<button type="submit" class="btn btn-lg btn-outline-success">Cotizaciones</button>
		</form>	
	</div>
	<div class="m-2 " id="mnuProviders">
		<form action="<?php echo site_url('providers') ?>" method="POST">
			<button type="submit" class="btn btn-lg btn-outline-warning">Proveedores de Servicios</button>
		</form></div>
	<div class="m-2 " id="mnuReferences">
		<form action="<?php echo site_url('listRef') ?>" method="POST">
			<button type="submit" class="btn btn-lg btn-outline-warning">Bitácora</button>
		</form>
	</div>

	<div class="m-2 " id="mnuClientes">
		<form action="<?php echo site_url('allClients') ?>" method="POST">
			<button type="submit" class="btn btn-lg btn-outline-secondary">Clientes</button>
		</form>
	</div>


</div>

<script type="text/javascript">
	const userType = <?php echo $_SESSION['user']['IdType'];  ?>;
	const opUsers = document.getElementById('mnuUsers');
	const opCotizaciones = document.getElementById('mnuCotizaciones');
	const opProviders = document.getElementById('mnuProviders');
	const opReferences = document.getElementById('mnuReferences');
	const opClientes = document.getElementById('mnuClientes');
	window.onload = function(){
		opUsers.style.display = 'none';
		opCotizaciones.style.display = 'none';
		opProviders.style.display = 'none';
		opReferences.style.display = 'none';
		opClientes.style.display = 'none';
		if(userType >= 1 && userType <=3 ){
			opUsers.style.display = 'block';
			opCotizaciones.style.display = 'block';
			opProviders.style.display = 'block';
			opReferences.style.display = 'block';
			opClientes.style.display = 'block';

		}else if( userType == 4 ){
			opProviders.style.display = 'block';

		}else{
			alert("NO tiene acceso a esta interfaz!");
			redirect('log_out');
		}
	}
</script>

