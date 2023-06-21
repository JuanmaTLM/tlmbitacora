
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
</style><!-- The Modal -->
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

