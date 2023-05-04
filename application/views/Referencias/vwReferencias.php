<style type="text/css">
  input[type=text], input[type=file],input[type=date],input[type=number],input[type=email],input[type=password]{
    border : none;
    border-bottom: 1px solid black;

  }



</style>

<!-- Modal Nuevo -->
 <div class="modal fade bg-primary" id="addNewRef">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
        <div class="d-flex flex-container" style="width:100%">
          <div class="p-1  flex-fill">
            <h4 class="modal-title ">Agregar nueva referencia </h4>
          </div>
         <div class="p-1">
           <h6 id="fecha"></h6>
         </div>

         </div>
       </div>

       <!-- Modal body -->
       <div class="modal-body">
        <form action="<?php echo site_url('newRef'); ?>" method="POST" id = "frmNewReference" enctype="multipart/form-data">
          <div class="tab-pane fade show active" id="Generales" role="tabpanel" aria-labelledby="Generales-tab">
              <div class="d-flex flex-column justify-content-center">

              	<div class="d-flex align-items-around  ">

              	  <div class="input-group mb-3 p-1">
              	      <div class="input-group-prepend">
              	        <span class="input-group-text bg-primary text-white" >Referencia Agencia Aduanal</span>
              	      </div>
              	      <input autocomplete="off" id="txtReferencia" type="text" class="form-control" name= "txtReferencia" placeholder="#Referencia">
              	  </div>

              	  <div class="input-group mb-3 p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">Cliente</span>
                      </div>
                      
                      <input autocomplete="off" id="txtCliente" type="text" class="form-control" name= "txtCliente" placeholder="Cliente" list="listCtes">
                      <datalist id="listCtes">
                        
                      </datalist>
                  </div>

              	</div>

              </div>
              <div class="d-flex align-items-around">
                  <div class="input-group mb-3 p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">ETA</span>
                      </div>
                      <input autocomplete="off" id="txtETA" type="date" class="form-control" name= "txtETA">
                  </div>
                  <div class="input-group mb-3 p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">Naviera</span>
                      </div>
                      <input autocomplete="off" id="txtNaviera" type="text" class="form-control" name= "txtNaviera" placeholder="Naviera">
                  </div>
                  <div class="input-group mb-3 p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">Vessel</span>
                      </div>
                      <input autocomplete="off" id="txtVessel" type="text" class="form-control " name= "txtVessel" placeholder="Vessel">
                  </div>
              </div>
              <div class="d-flex align-items-around">
                  <div class="input-group mb-3 p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">Voyaje</span>
                      </div>
                      <input autocomplete="off" id="txtVoyaje" type="text" class="form-control " name= "txtVoyaje" placeholder="Voyaje">
                  </div>
                  <div class="input-group mb-3 p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">Terminal</span>
                      </div>
                      <input autocomplete="off" id="txtTerminal" type="text" class="form-control " name= "txtTerminal" placeholder="Terminal">
                  </div>
              </div>
             
              <div class="d-flex flex-wrap justify-content-end">
                  <div class="p-1  ml-3">
                    <label ><strong>BL: </strong></label>
                  </div>
                  <div class=" p-1 flex-fill">
                      <input autocomplete="off" type="file"  name= "dctoBL" id="dctoBL" style="width: 90%; margin-right: 10%;" accept=".xml,.pdf,.xls,.xlsx,.csv">
                  </div>
              </div>
               <div class="d-flex flex-wrap justify-content-end">
                  <div class="p-1 ml-3">
                    <label ><strong>Factura: </strong></label>
                  </div>
                  <div class=" p-1 flex-fill">
                      <input autocomplete="off" type="file"  name= "dctoFactura" id="dctoFactura" style="width: 90%; margin-right: 10%;" accept=".xml,.pdf,.xls,.xlsx,.csv">
                  </div>
              </div>
               <div class="d-flex flex-wrap justify-content-end">
                  <div class="p-1 ml-3">
                    <label ><strong>Lista Empaque: </strong></label>
                  </div>
                  <div class=" p-1 flex-fill">
                      <input autocomplete="off" type="file" name= "dctoListaEmp" id="dctoListaEmp" style="width: 90%; margin-right: 10%;" accept=".xml,.pdf,.xls,.xlsx,.csv">
                  </div>
              </div>
          </div>
          <br>
       <!-- Modal footer -->
        <div class="modal-footer">
             <button id="btnSave" type="submit" class="btn btn-outline-primary btn-lg"><span class="fa fa-save"></span></button>
          </form>
             <button type="button" class="btn btn-outline-danger" data-dismiss="modal" onclick="resetForm();"><span class="fa fa-cancel"></span>Cancelar</button>
        </div>
        

    </div>
   </div>
 </div>
</div>

<script type="text/javascript">
  const clientLists = document.getElementById('listCtes');

  function fillCtes(){
    let item ='';
    axios.get("<?php echo site_url('fillClientsref'); ?>").then(
      function(res){
            if (res.status == 200) {
              if(res.data){
                var clientsList = res.data;
                console.log(clientsList);
                for(let client of clientsList){

                  if(client.NombreCompleto != null){
                    item += "<option value='" + client.RFC + "'>" + client.NombreCompleto + "</option>";
                  }else{
                    item += "<option value='" + client.RFC + "'>" + client.txtRazonSocial + "</option>";                   
                  }
                }
              clientLists.innerHTML =  item;
              }
            }
          }).catch(function(err){
            alert(err);
            console.log(err);
          });
  }

  const frmNwReference = document.getElementById('frmNewReference');
  function resetForm(){
    frmNwReference.reset();

  }

  window.onload = function (){
      fillCtes();
      date = new Date();
      year = date.getFullYear();
      month = date.getMonth() + 1;
      day = date.getDate();
      if (day < 10) {
        day = "0" + day;
        month = "0" + month;
      }
      document.getElementById("fecha").innerHTML = day + "/" + month + "/" + year;
  }
</script>