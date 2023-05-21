<!-- The Modal -->
<div class="modal" id="addCte">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Información Completa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="d-flex flex-wrap justify-content-end">
            <div class="p-1 ">
              <button type="submit" class="btn btn-outline-success" id="btnSaveUPD" onclick="saveCte();">Guardar</button>
            </div>
            <div class="p-1 ">
              <button type="button" class="btn btn-outline-info" id="btnEditCte" onclick="edit();">Editar</button>
            </div>
            <div class="p-1 ">
              <button type="button" class="btn btn-outline-warning" id="btnClose" onclick="closeMod();">Cancelar</button>
            </div>


          </div>
       <form action="<?php echo site_url('udtClient'); ?>" method="POST" id="frmNewCte">
        <input type="hidden" name="idCte" id="idCte">
       	<div class="d-flex flex-wrap justify-content-center flex-container flex-column">
       		<div class="d-flex flex-wrap justify-content-center">
       			<div class="p-1 flex-fill text-center">
       				<div class="form-check-inline">
       				  <label class="form-check-label">
       				    <input type="radio" class="form-check-input" id="optradio0" name="optradio" onchange="nameCompany(this.value);" value="0" checked>Nombre Completo
       				  </label>
       				</div>
       				
       			</div>
       			<div class="p-1 flex-fill text-center">
       				<div class="form-check-inline">
       				  <label class="form-check-label">
       				    <input type="radio" class="form-check-input" id="optradio1" name="optradio" onchange="nameCompany(this.value);" value ="1">Razón Social
       				  </label>
       				</div>
       			</div>
       			
       		</div>
       		<div id="RazonSocial" style="display: none;">
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

       		


       	</div>
       	 
       </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="btnCancel">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  const modAddCte = document.getElementById('addCte');
  const fName = document.getElementById('CteName');
  const fRSocial = document.getElementById('RazonSocial');
  const cteRFC = document.getElementById('txtCteCURP');


  let edradio0 = document.getElementById('optradio0');
  let edradio1 = document.getElementById('optradio1');
  let edRazonSocial = document.getElementById('txtRazonSocial');
  let edCteName = document.getElementById('txtCteName');
  let edCteLName = document.getElementById('txtCteLName');
  let edCteRFC = document.getElementById('txtCteRFC');
  let edCteCURP = document.getElementById('txtCteCURP');
  let edCtePhone = document.getElementById('txtCtePhone');
  let edCteEmail = document.getElementById('txtCteEmail');
  let edCteStreet = document.getElementById('txtCteStreet');
  let edCteCol = document.getElementById('txtCteCol');
  let edCteExt = document.getElementById('txtCteExt');
  let edCteInt = document.getElementById('txtCteInt');
  let edCteCP = document.getElementById('txtCteCP');
  let edCteCity = document.getElementById('txtCteCity');
  let edCteState = document.getElementById('txtCteState');
  let edCtCountrye = document.getElementById('txtCtCountrye');
  let idCte = document.getElementById('idCte');


  let btnSaveUPD = document.getElementById('btnSaveUPD');
  let btnCancel= document.getElementById('btnCancel');
  let btnEditCte = document.getElementById('btnEditCte');
  let btnClose = document.getElementById('btnClose');
  

  window.onload = function () {
    closeMod();  

    fName.setAttribute("class","d-flex flex-wrap justify-content-center");
    fRSocial.setAttribute("class","desactived");

  }

  function nameCompany(op){
    if(op == 0 ){
      fName.setAttribute("class","d-flex flex-wrap justify-content-center");
      fRSocial.setAttribute("class","desactived");

    }else{
      fName.setAttribute("class","desactived");
      fRSocial.setAttribute("class","d-flex flex-wrap justify-content-center");
    }


  }
   function verCliente(id){
    closeMod(); 
    $.ajax({
        url: '<?php echo site_url('searchData'); ?>',
        method: 'GET',
        data: { term: id },
        dataType: 'json',
        success: function(response) {
            if (response.length == 1 ) {
                $.each(response, function(index, item) {
                  
                  if(item.Tipo == 0){
                    edradio0.checked = true;
                    edradio1.checked = false;
                    nameCompany(0);
                  }else{
                    edradio0.checked = false;
                    edradio1.checked = true;
                    nameCompany(1);
                  }
                  edRazonSocial.value = item.txtRazonSocial;
                  edCteName.value = item.txtNombreCliente;
                  edCteLName.value = item.txtApellidos;
                  edCteRFC.value = item.RFC;
                  edCteCURP.value = item.CURP;
                  edCtePhone.value = item.Telefono;
                  edCteEmail.value = item.Email;
                  edCteStreet.value = item.Calle;
                  edCteCol.value = item.Colonia;
                  edCteExt.value = item.NumExt;
                  edCteInt.value = item.NumInt;
                  edCteCP.value = item.CodigoPostal;
                  edCteCity.value = item.Ciudad;
                  edCteState.value = item.Estado;
                  edCtCountrye.value = item.Pais;
                  idCte.value = item.eIdCliente;

                  
                });
            } else {
              alert("Hay más de un registro...");                                
            }
        }
    });
    
    $("#addCte").modal('show');
    
  }
  function edit(){  
    edradio0.disabled = false;
    edradio1.disabled = false;
    edRazonSocial.disabled = false;
    edCteName.disabled = false;
    edCteLName.disabled = false;
    edCteRFC.disabled = false;
    edCteCURP.disabled = false;
    edCtePhone.disabled = false;
    edCteEmail.disabled = false;
    edCteStreet.disabled = false;
    edCteCol.disabled = false;
    edCteExt.disabled = false;
    edCteInt.disabled = false;
    edCteCP.disabled = false;
    edCteCity.disabled = false;
    edCteState.disabled = false;
    edCtCountrye.disabled = false;
    btnSaveUPD.style.display = 'flex';
    btnEditCte.style.display = 'none';
    btnClose.style.display = 'flex';
    btnCancel.disabled = true;

  }
  function closeMod(){
    btnCancel.disabled = false;

     btnSaveUPD.style.display = 'none';
    btnEditCte.style.display = 'flex';
    btnClose.style.display = 'none';

    edradio0.disabled = true;
    edradio1.disabled = true;
    edRazonSocial.disabled = true;
    edCteName.disabled = true;
    edCteLName.disabled = true;
    edCteRFC.disabled = true;
    edCteCURP.disabled = true;
    edCtePhone.disabled = true;
    edCteEmail.disabled = true;
    edCteStreet.disabled = true;
    edCteCol.disabled = true;
    edCteExt.disabled = true;
    edCteInt.disabled = true;
    edCteCP.disabled = true;
    edCteCity.disabled = true;
    edCteState.disabled = true;
    edCtCountrye.disabled = true;
  }
  function saveCte(){
    document.getElementById('frmNewCte').submit();
  }
</script>