<style type="text/css">
	.flex-container{
		width: 95%;
		margin-left :2.5%;
		margin-right :2.5%
	}
	.desactived{
		display: none !important;
	}
</style>
<div class="d-flex flex-wrap justify-content-center flex-column ">
	<div class="p-2 mt-2 d-flex flex-wrap justify-content-start bg-white"> 
		<div>
			<form action="<?php echo site_url('listRef'); ?>">
				<button type="submit" class="btn btn-outline-warning btn-sm"><<- Regresar </button>
			</form>
		</div>
	</div>
	<div class="mt-3 d-flex flex-wrap justify-content-center border border-black border-top-0 flex-column flex-container"> 
		<div class=" text-center">
			<h3>Referencia <?php echo $referencia['cveReferencia']; ?><hr></h3>
		</div>
		<div class="ml-auto mr-2">
			<label>RFCCliente: <strong><?php echo $referencia['fk_RFCCliente'];  ?></strong></label>
		</div>
	</div>
	<div class=" mt-3 d-flex flex-wrap justify-content-around flex-container bg-white rounded">
		<div class="p-2 mb-3 mt-2 rounded card">
			<button type="button" class="btn btn-outline-success" data-target="#modCtaGastos" data-toggle="modal">Cuenta de Gastos</button>
		</div> 
		<div class="p-2 mb-3 mt-2 rounded card">
			<button type="button" class="btn btn-outline-primary" onclick="goclasGlosa();">Clasificación de Mercancías</button>
		</div> 
	</div>
	<div class="d-flex flex-wrap justify-content-between flex-column flex-container bg-white">
		
	</div>

</div>
<script type="text/javascript">
    const cveRefMerca = "<?php echo $referencia['cveReferencia']; ?>";
    const idRefMerca = "<?php echo $referencia['eIdReferencia']; ?>";
	

	function goclasGlosa(){
		var url = "<?php echo site_url('mercaRefe') ?>";
		window.location.href = url +  "?cveReferencia="+cveRefMerca+"&eIdReferencia="+idRefMerca; 
	}
</script>