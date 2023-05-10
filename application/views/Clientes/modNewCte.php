<!-- The Modal -->
<div class="modal" id="addCte">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Nuevo Cliente</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
       <form action="<?php echo site_url('addClient'); ?>" method="POST" id="frmNewCte">

       	<div class="d-flex flex-wrap justify-content-center flex-container flex-column">
       		<div class="d-flex flex-wrap justify-content-center">
       			<div class="p-1 flex-fill text-center">
       				<div class="form-check-inline">
       				  <label class="form-check-label">
       				    <input type="radio" class="form-check-input" name="optradio" onchange="nameCompany(this.value);" value="0" checked>Nombre Completo
       				  </label>
       				</div>
       				
       			</div>
       			<div class="p-1 flex-fill text-center">
       				<div class="form-check-inline">
       				  <label class="form-check-label">
       				    <input type="radio" class="form-check-input" name="optradio" onchange="nameCompany(this.value);" value ="1">Razón Social
       				  </label>
       				</div>
       			</div>
       			
       		</div>
       		<div id="RazonSocial" style="display: none;">
       		<!--<div class="d-flex flex-wrap justify-content-center" id="RazonSocial" style="display: none;">-->
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Razón Social:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtRazonSocial" id="txtRazonSocial" >
   				  	</div>
       			</div>
       		</div>
       		<div id="CteName" >
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Nombre(s):</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteName" id="txtCteName" >
   				  	</div>
       			</div>
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Apellido(s):</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteLName" id="txtCteLName" >
   				  	</div>
       			</div>

       		</div>
       		<div class="d-flex flex-wrap justify-content-around">
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">RFC:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteRFC" id="txtCteRFC" maxlength="13"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
   				  	</div>
       			</div>
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">CURP:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteCURP" id="txtCteCURP" maxlength="18"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
   				  	</div>
       			</div>
       			
       			
       		</div>
       		<div class="d-flex flex-wrap justify-content-around">
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Teléfono:</span>
       				    </div>
       				    <input type="number" class="form-control" name="txtCtePhone" id="txtCtePhone" required maxlength="10">
   				  	</div>
       			</div>
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Email:</span>
       				    </div>
       				    <input type="email" class="form-control" name="txtCteEmail" id="txtCteEmail">
   				  	</div>
       			</div>
       		</div>
       		
       		<div class="d-flex flex-wrap justify-content-start">
       			<div>
       				<h4>Domicilio <hr>	</h4>
       			</div>

       		</div>

       		<div class="d-flex flex-wrap justify-content-center">
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Calle:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteStreet" id="txtCteStreet" >
   				  	</div>
       			</div>
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Colonia:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteCol" id="txtCteCol" >
   				  	</div>
       			</div>
       		</div>

       		<div class="d-flex flex-wrap justify-content-center">
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">#_Exterior:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteExt" id="txtCteExt" maxlength="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
   				  	</div>
       			</div>

       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">#_Interior:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteInt" id="txtCteInt" maxlength="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
   				  	</div>
       			</div>

       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Código Postal:</span>
       				    </div>
       				    <input type="number" class="form-control" name="txtCteCP" id="txtCteCP" >
   				  	</div>
       			</div>

       		</div>


       		<div class="d-flex flex-wrap justify-content-center">
       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Ciudad:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteCity" id="txtCteCity" >
   				  	</div>
       			</div>

       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">Estado:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteState" id="txtCteState" >
   				  	</div>
       			</div>

       			<div class="p-1 flex-fill">
       				<div class="input-group mb-3">
       				    <div class="input-group-prepend">
       				      <span class="input-group-text">País:</span>
       				    </div>
       				    <input type="text" class="form-control" name="txtCteCountry" id="txtCtCountrye" >
   				  	</div>
       			</div>

       		</div>

       		<div class="d-flex flex-wrap justify-content-center">
       			<div class="p-1 ">
       				<button type="submit" class="btn btn-outline-success">Guardar</button>
       			</div>


       		</div>


       	</div>
       	 
       </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  const modAddCte = document.getElementById('addCte');
  const fName = document.getElementById('CteName');
  const fRSocial = document.getElementById('RazonSocial');
  const cteRFC = document.getElementById('txtCteCURP');
  

  window.onload = function () {
    fName.setAttribute("class","d-flex flex-wrap justify-content-center");
    fRSocial.setAttribute("class","desactived");

  }

  function nameCompany(op){
    if(op == 0 ){
      fName.setAttribute("class","d-flex flex-wrap justify-content-center");
      fRSocial.setAttribute("class","desactived");
      cteRFC.disabled = false;

    }else{
      fName.setAttribute("class","desactived");
      fRSocial.setAttribute("class","d-flex flex-wrap justify-content-center");
      cteRFC.disabled = true;
    }


  }
</script>