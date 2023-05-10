<style type="text/css">
	.flex-container{
		width: 95%;
		margin-left :2.5%;
		margin-right :2.5%
	}
	.desactived{
		display: none !important;
	}
	p{
		font-size: 10px !important;
	}
</style>
<div class="d-flex flex-wrap justify-content-center flex-column bg-light">
	<div class="d-flex flex-wrap justify-content-end "> 

					<div class="p-2">
						<a href="<?php echo site_url('listRef'); ?>" class="btn btn-sm btn-outline-primary" >Regresar</a>
					</div>


				</div>
	<div class="tab-pane fade show active" id="Completa" role="tabpanel" aria-labelledby="Completa-tab">
		
		<div class="d-flex flex-wrap justify-content-center bg-light">
			<div class="p-1 m-1 rounded border" style="height:100%;">
				<div class="d-flex flex-column">
					<div class="p-1 text-center">
						<h5>Menú <hr></h5>
					</div>
					
					<div class="p-1 " >
						<a href="<?php echo site_url('listRef'); ?>"><span class="fas fa-window-restore" title="Listado de referencias"></span> Listado de referencias</a>
					</div>
					<div class="p-1 "	id="allReferences">
						<a href="<?php echo site_url('myRefs'); ?>" ><span class="fas fa-user-alt" title="Mis referencias"></span> Mis referencias</a>
					</div>
					<div class="p-1 " id="refAsignadas">
						<a href="" data-toggle="modal" data-target="#modEmp"><span class="fas fa-users" title="Referencias Asignadas"></span> Referencias Asignadas</a>
					</div>

					<div class="p-1 text-center align-self-end">
						<p><hr></p>
						<p> Tracing Logistics Manzanillo &copy; 2023 </p>
					</div>
				</div>
			</div>


<script type="text/javascript">
	ocultar();
	function ocultar(){
		let userType = <?php echo $_SESSION['user']['IdType']; ?>;
		if(userType > 7){
			document.getElementById('allReferences').style.display='none';
			document.getElementById('refAsignadas').style.display='none';
		}else{
			document.getElementById('allReferences').style.display='flex';
			document.getElementById('refAsignadas').style.display='flex';
		}
	}
	function aRefs(){
		$('#modEmp').modal('show');
	}
</script>

<!-- The Modal -->
<div class="modal" id="modEmp">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Asignado a...</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
      	<div class="d-flex flex-wrap justify-content-center flex-column flex-container">
      		<div class="p-2 flex-fill">
      			<select id="assignedUser" class="form-control">
      				
      			</select>
      		</div>
      	</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" onclick="findRefsUser();">Siguiente <span class="far fa-arrow-alt-circle-right"></span></button>

        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
	let selAssigned = document.getElementById('assignedUser');
	fillAssigneds();
	let itemA = "<option value ='0'>Seleccione una opción...</option>";
	function fillAssigneds(){
		axios.get("<?php echo site_url('userAssigneds') ?>")
		  .then(function (response) {
		    assigneds = response.data;
		    for(var asigned of assigneds){
		    	itemA += '<option value="' + asigned.asignedId + '">' + asigned.asignedName + " " + asigned.asignedLName + '</option>' ;

		    }
		    selAssigned.innerHTML = itemA;

		  })
		  .catch(function (error) {
		    console.log(error);
		  });  
	}

	function findRefsUser(){
		if(selAssigned.value == 0){
			alert("Favor de seleccionar un usuario...");
		}else{
			window.location.href = "<?php echo site_url('refAssigned') ?>" + "?asignedId=" + selAssigned.value ; 
		}
	}
</script>