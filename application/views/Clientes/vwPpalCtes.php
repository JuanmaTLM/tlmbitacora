<style type="text/css">
	.flex-container{
		width: 90%;
		margin-left :5%;
		margin-right :5%
	}
	.desactived{
		display: none !important;
	}
</style>
<div id="divPpalCtes" class="d-flex flex-wrap justify-content-around bg-light">
	<div class="p-1"> 
		<form action="<?php echo site_url('dashboard'); ?>">
		<button type="submit" class="btn btn-outline-warning btn-sm"><<- Regresar </button>
			
		</form>
	</div>
	<div class="p-1"> 
		<button type="button" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#addCte">Agregar Cliente</button>
	</div>
</div>





