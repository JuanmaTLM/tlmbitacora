<?php 
	//print_r($reference);
 ?>
<br>
<style type="text/css">
	button.btnItems{
		border : none !important;
	}
</style>
<div class="p-2 mt-2 d-flex flex-wrap justify-content-start bg-white"> 
		<div>
			<form action="<?php echo site_url('clasGlosa');?>" method="POST">
				<button type="submit" class="btn btn-outline-warning btn-sm" name="eIdReferencia" value="<?php echo $reference['eIdReferencia'] ;  ?>"><<- Regresar </button>
			</form>
		</div>
	</div>
<div class="d-flex flex-column flex-container bg-white rounded" id="sectionGenerales">
	<div class="d-flex flex-wrap justify-content-center">
		<div class="p-2 text-center">
			<h2 class="text-center">
				Listado de mercancías de referencia # <?php echo $reference['cveReferencia'] ?> <hr>
			</h2>
		</div>
	</div>
</div>
<hr>
<div class="d-flex flex-column flex-container bg-secondary rounded" id="sectionContainers">
	<div class="d-flex flex-wrap justify-content-between ">
		<div class="m-1 p-2 border rounded bg-light" id="menuLateral" style="width:23%">
			<div class="d-flex flex-column justify-content-center ">
				<div class="p-2 text-center flex-fill">
					<button class="btn btn-outline-dark btnItems" data-toggle="modal" data-target="#modContainer">Agregar Contenedor</button> 
				</div>
				<div class="p-2 text-center flex-fill">
					<button class="btn btn-outline-dark btnItems">Listado Mercancías / Contenedor</button> 
				</div>
				<div class="p-2 text-center flex-fill">
					<button class="btn btn-outline-dark btnItems">Listado Mercancías / Pedimento</button> 
				</div>
				<div class="p-2 text-center align-items-end">
					<p><hr></p>
					<p style="font-size: 10px;"> Tracing Logistics Manzanillo &copy; 2023 </p>
				</div>
					
				
			</div>
		</div>
		<div class="m-1 p-1 border rounded bg-light" id="listadoContenedores"style="width:75%">
			<div class="d-flex flex-wrap justify-content-center">
				<div class="p-2">
					<h4>
						Contenedores de Mercancías  <?php echo $listaMercancia['cveLMerca'] ?> <hr>
					</h4>
				</div>
			</div>

			<div class="d-flex flex-wrap justify-content-between">
				<style type="text/css">
					.text-submenu{
						font-size: 11px !important;
					}
				</style>
			
			<?php 
				if(isset($containers)){
					foreach ($containers as $container) {
						//print_r($container);
				?>

				<div class="p-2 m-1 border rounded bg-primary"  style="width: 32%;">
					<div class="card bg-white" style="width: 100%;">
					  <div class="card-body">
					  	<div class="d-flex flex-wrap justify-content-end">
					  		<?php if($container['bAbierto']){ ?>

					  			<button  type="button" class="btn btn-outline-warning btn-sm" style="border:none !important;" title="Contenedor Abierto" onclick="changeClose(<?php echo $container['eIdContenedor']; ?>)"><span style="font-size: 1em;" class="fas fa-unlock-alt"></span></button>
					  			
					  		<?php }else{?>
					  		
					  			<button class="btn btn-outline-danger btn-sm" style="border:none !important;" title="Contenedor Cerrado "><span style="font-size: 1em;" class="fas fa-lock"onclick="changeClose(<?php echo $container['eIdContenedor']; ?>)"></span></button>

					  		<?php }?>
					  		
					  	</div>
					    <h5 class="card-title "><strong><?php echo $container['txtContenedor']; ?></strong></h5>
					    <h6 class="card-subtitle mb-2 text-muted text-submenu"># de Pedimento: <strong> <?php echo $container['txtPedimento']; ?></strong> </h6>
					    <p class="card-text">
					      <br>
					      Tamaño : <strong><?php echo $container['txtTamaño']; ?></strong><br>
					      Tipo : <strong><?php echo $container['txtTipo']; ?></strong>	
					    </p>
					    <div class="text-center">
					    	<button class="btn btn-outline-primary btn-sm" onclick="viewMerca(<?php echo $container['eIdContenedor']; ?>);"><span class="" >Ver Mercancías</span></button>
					    </div>
					    
					  </div>
					</div>
				</div>



				<?php 
					}
				}else{

				}

			 ?>
			
			</div> 
		</div>


	</div>
</div>

<script type="text/javascript">
	frmback
	function changeClose(contId){
		console.log(contId);
		let cnt = {}; 
		cnt.contId = contId;
		axios.post("<?php echo site_url('changeStatusCont'); ?>" ,cnt).then(
		  function(res){
		        if (res.status == 200) {
		         if(res.data){
		            window.location.reload();
		          }else{
		           alert("Generar Mercancías para esta Referencia");
		          }
		        }
		  }).catch(function(err){
		    alert(err);
		    console.log(err);
		  });
	}
</script>