<style type="text/css">
  input: required {
  background-color: red;
}
</style>

<!-- The Modal -->
<div class="modal" id="modNwProvider">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar Proveedor de Servicios</h4>
      
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <ul class="nav nav-tabs" id="tabProvider" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Datos Generales</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Datos de Contacto</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="fletes-tab" data-toggle="tab" href="#fletes" role="tab" aria-controls="fletes" aria-selected="false">Fletes</a>
          </li>

        </ul>
        <div class="tab-content" id="myTabContent">


          <!--DATOS GENERALES DE LA EMPRESA-->
          
          <div class="tab-pane fade show active " id="general" role="tabpanel" aria-labelledby="general-tab">
            
            <div class="d-flex flex-container flex-column">


                <div class="p-2">
                    <input required type="text" class="form-control" placeholder="Nombre de la Empresa" name="txtProviderName" id="txtProviderName">
                </div>


                <div class="d-flex flex-wrap justify-content-around align-items-center align-content-center">
                   

                   <div class="p-2 flex-fill">
                      <input required type="text" class="form-control" placeholder="Giro" name="txtGiro" id="txtGiro">
                  </div>
                  <div class="p-2 flex-fill">
                      <input required type="text" class="form-control" placeholder="Sector" name="txtSector" id="txtSector">
                  </div>
                </div>
                 
                <div class="p-2">
                    
                    <input required type="text" class="form-control" placeholder="Tipo de empresa" name="txtProviderType" id="txtProviderType" list="typesPList">

                    <datalist id="typesPList">
                      
                    </datalist>

                </div>

              </div>               

          </div>


          <!-- DATOS DE CONTACTO -->

          <div class="tab-pane fade show " id="contact" role="tabpanel" aria-labelledby="contact-tab">
            
            <div class="d-flex flex-wrap flex-container flex-column">

               <div class="p-2">
                 <input required type="text" name="txtCalle" id="txtCalle" class="form-control" placeholder="Calle" > 
               </div>
               
            </div>

            <div class="d-flex flex-wrap flex-container justify-content-around">
               <div class="p-2 flex-fill">
                 <input required type="text" name="txtNumExt" id="txtNumExt" class="form-control" placeholder="Número Exterior" > 
              </div>
                <div class="p-2 flex-fill">
                 <input required type="text" name="txtNumInt" id="txtNumInt" class="form-control" placeholder="Número Interior" > 
               </div>
               <div class="p-2 flex-fill">
                 <input required type="number" name="txtCP" id="txtCP" class="form-control" placeholder="Código Postal"> 
               </div>
              
            </div>

            <div class="d-flex flex-wrap justify-content-around">
               <div class="p-2 flex-fill">
                 <input required type="text" name="txtColonia" id="txtColonia" class="form-control" placeholder="Colonia" > 
               </div>
               <div class="p-2 ">
                 <input required type="text" name="txtCiudad" id="txtCiudad" class="form-control " placeholder="Ciudad" > 
               </div>
                <div class="p-2 ">
                 <input required type="text" name="txtEstado" id="txtEstado" class="form-control " placeholder="Estado" > 
               </div>
               
            </div>
            <hr>

             <div class="d-flex flex-wrap flex-container justify-content-around">
               <div class="p-2">
                 <input required type="text" name="txtPhone" id="txtPhone" class="form-control" placeholder="Teléfono" > 
              </div>
                <div class="p-2 flex-fill">
                 <input required type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Correo Electróni" > 
               </div>
              
            </div>               

          </div>          

          <!-- SERVICIOS -->


          <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">

            <div class="d-flex flex-wrap justify-content-around align-items-center align-content-center">
                <div class="p-2 flex-fill">
                <label required class="form-control-input" for="txtService">Servicio:</label>
                  <input required type="text" name="txtService" id="txtService" class="form-control" placeholder="Nombre del Servicio">
                </div>


                <div class="p-2">
                <label required class="form-control-input"   for="txtCosto">Precio ($_MXN):</label>
                  <input required type="number" min="1.00" step="0.05" name="txtCosto" id="txtCosto" class="form-control" placeholder="Costo Ej 13.50">
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-center">

                <div class="p-2 flex-fill">
                <label required class="form-control-input"   for="txtDescService">Descripción:</label>
                  <textarea rows="4"  type="text" name="txtDescService" id="txtDescService" class="form-control" placeholder="Detalle del Servicio"></textarea>
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-end">
                
                <div class="p-2">
                    
                    <button  class="btn btn-outline-primary" onclick="nwServices();" title="Agregar Servicio"><span class="fa fa-plus"></span></button>

                </div>

            </div>

            <div class="d-flex flex-wrap border-top-0 border-black">
              <table class="table table-hover" id="tblServices">
                  <thead class="text-center" style="overflow:scroll;">
                    <tr>
                      <th>#</th>
                      <th>Nombre </th>
                      <th >Descripción</th>
                      <th> Costo </th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody id="servicesList" style="overflow: scroll; text-align: center;">
                    <tr><td><------- </td>
                    <td>Agregar </td>
                    <td> nuevo</td>
                    <td> Servicio </td>
                    <td> -------></td>
                    </tr>
                  </tbody>
                </table>
              
             
            </div>

          </div>


          <!-- FLETES -->



          <div class="tab-pane fade" id="fletes" role="tabpanel" aria-labelledby="fletes-tab">
            
            <div class="d-flex flex-wrap justify-content-around align-items-center align-content-center">
              
                <div class="p-2 flex-fill">
                <label required class="form-control-input"   for="txtOrigen">Origen:</label>
                  <input required type="text" name="txtOrigen" id="txtOrigen" class="form-control" placeholder="Origen" >
                </div>


                <div class="p-2 flex-fill">
                <label required class="form-control-input"   for="txtDestiny">Destino:</label>

                  <input required type="text" name="txtDestiny" id="txtDestiny" class="form-control" placeholder="Destino">

                </div>

                
            </div>
            <div class="d-flex flex-wrap justify-content-around align-items-center align-content-center">
             
              <div class="p-2 " class="d-flex flex-wrap justify-content-around align-items-center align-content-center">
                <label required class="form-control-input"   for="txtDistance">Distancia (Km):</label>

                  <input required type="number" min="1" step="0.05" name="txtDistance" id="txtDistance" class="form-control"  title="Distancia entre origen y destino en Km " placeholder="Distancia (Km)">

                </div>


                <div class="p-2 ">
                <label required class="form-control-input"   for="txtCostoFlete">Precio ($_MXN):</label>

                  <input required type="number" min="1.00" step="0.10" name="txtCostoFlete" id="txtCostoFlete" class="form-control" placeholder="Costo del Flete">

                </div>


                <div class="p-2 flex-fill">
                <label required class="form-control-input"   for="fk_eIdFreightType">Tipo de Flete:</label>

                  <select class="form-control" required  id="listFletesTypes" name="listFletesTypes">

                  
                  </select>

                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-center">

                <label required class="form-control-input"   for="txtDescFlete">Descripción:</label>
                <div class="p-2 flex-fill">
                  <textarea rows="4"  type="text" name="txtDescFlete" id="txtDescFlete" class="form-control" placeholder="Detalle del Flete"></textarea>
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-end">
                
                <div class="p-2">
                    
                    <button  class="btn btn-outline-primary" onclick="nwFletes();" title="Agregar Servicio"><span class="fa fa-plus"></span></button>

                </div>



            </div>

            <div class="d-flex flex-wrap border-top-0 border-black">
              <table class="table table-hover" id="tblServices">
                  <thead class="text-center">
                    <tr>
                      <th>#</th>
                      <th>Origen</th>
                      <th >Destino</th>
                      <th> Distancia (Km) </th>
                      <th> Costo ($)</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody id="fletesList" style="overflow: scroll; text-align: center;">
                    <tr><td><-- </td>
                    <td>Agregar </td>
                    <td> nuevo</td>
                    <td> Flete </td>
                    <td> -----</td>
                    <td> ---></td>
                    </tr>
                  </tbody>
                </table>

          </div>
        </div>

        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" onclick="addProvider();">Agregar</button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  fillListFletesTypes();

  $("#modNwProvider").on('hide.bs.modal', function(){
      cleanInputs(); 
    });

let services = new Array();
let service = new Array();

let fletes = new Array();
let flete = new Array();

let txtName = document.getElementById('txtProviderName');
let txtArea = document.getElementById('txtGiro');
let txtSector = document.getElementById('txtSector');
let txtProviderType = document.getElementById('txtProviderType');
let txtCalle = document.getElementById("txtCalle");
let txtColonia = document.getElementById("txtColonia");
let txtNumExt = document.getElementById("txtNumExt");
let txtNumInt = document.getElementById("txtNumInt");
let txtCP = document.getElementById("txtCP");
let txtCiudad = document.getElementById("txtCiudad");
let txtEstado = document.getElementById("txtEstado");
let txtPhone = document.getElementById("txtPhone");
let txtEmail = document.getElementById("txtEmail");
let fk_eIdFreightType = document.getElementById("listFletesTypes");


let txtService = document.getElementById('txtService');
let txtCosto = document.getElementById('txtCosto');
let txtDescService = document.getElementById('txtDescService');

let txtOrigen = document.getElementById('txtOrigen');
let txtDestiny = document.getElementById('txtDestiny');
let txtCostoFlete = document.getElementById('txtCostoFlete');
let txtDistance = document.getElementById('txtDistance');
let txtDescFlete = document.getElementById('txtDescFlete');

let tblservicesList = document.getElementById('servicesList');
let tblFletesList = document.getElementById('fletesList');

function nwFletes(){
  var flete = {
    txtOrigin : txtOrigen.value,
    txtDestiny : txtDestiny.value,
    eDistanceKm : txtDistance.value,
    flFreightPrice :  txtCostoFlete.value,
    txtDescFlete: txtDescFlete.value,
    fk_eIdFreightType : fk_eIdFreightType.value
  };

  fletes.push(flete);


  txtOrigen.value = '';
  txtDestiny.value = '';
  txtCostoFlete.value = '';
  txtDistance.value = '';
  txtDescFlete.value = '';
  fillTblFlete();
}

function nwServices(){
  var service = {
    txtService : txtService.value,
    flPrice : txtCosto.value,
    txtDescripction : txtDescService.value
  };
  

  services.push(service);


  txtService.value = '';
  txtCosto.value = '';
  txtDescService.value = '';
  fillTable();



}

function fillTable(){
  
  var itemtb= " ";
  tblservicesList.innerHTML = itemtb;
  var numServ = 1 ;

  if(services.length > 0){
    for(var dato of services){
       itemtb += "<tr>";

       itemtb += "<td>";

         itemtb += numServ;
       
       itemtb += "</td>";


       itemtb += "<td>";

         itemtb += dato.txtService;
       
       itemtb += "</td>";


       itemtb += "<td>";

         itemtb += dato.txtDescripction ;

       itemtb += " </td>";


       itemtb += "<td>";

         itemtb += dato.flPrice;

       itemtb += "</td>";

        
       itemtb += "<td>";

       itemtb += "<button type='button' class='btn btn-outline-danger btn-md' id = '";

       itemtb += numServ;

       itemtb += "' onclick = 'delService(this.id);'>Borrar</button>";

       itemtb += "</td>";

      
       itemtb += "</tr>";

       tblservicesList.innerHTML = itemtb;
       numServ++;
     }

    
     
  } else if(services.length == 0){
     
    numServ = 0;
    itemtb += "<tr><td><-- </td>";
    itemtb += "<td>Agregar </td>";
    itemtb += "<td> nuevo</td>";
    itemtb += "<td> Flete </td>";
    itemtb += "<td> -----</td>";
    itemtb += "<td> ---></td>";
    itemtb += "</tr>";
    tblservicesList.innerHTML = itemtb;
    


  } 

}

function fillTblFlete(){
   var itemtb= " ";
  tblFletesList.innerHTML = itemtb;

  var numFlete = 1 ;
  if (fletes.length > 0) {
    for(var dato of fletes){
      itemtb += "<tr>";

      itemtb += "<td>";

        itemtb += numFlete;
      
      itemtb += "</td>";


      itemtb += "<td>";

        itemtb += dato.txtOrigin;
      
      itemtb += "</td>";


      itemtb += "<td>";

        itemtb += dato.txtDestiny ;

      itemtb += " </td>";


      itemtb += "<td>";

        itemtb += dato.eDistanceKm;

      itemtb += "</td>";


      itemtb += "<td>";

        itemtb += dato.flFreightPrice;

      itemtb += "</td>";

       
      itemtb += "<td>";

      itemtb += "<button type='button' class='btn btn-outline-danger btn-md' id = '";

      itemtb += dato.numFlete;

      itemtb += "' onclick = 'delFlete(this.id);'>Borrar</button>";

      itemtb += "</td>";

     
      itemtb += "</tr>";

      tblFletesList.innerHTML = itemtb;
      numFlete++;
    }
      
  }else if(fletes.length == 0){
    
    

    numFlete = 0;
    itemtb += "<tr><td><-- </td>";
    itemtb += "<td>Agregar </td>";
    itemtb += "<td> nuevo</td>";
    itemtb += "<td> Flete </td>";
    itemtb += "<td> -----</td>";
    itemtb += "<td> ---></td>";
    itemtb += "</tr>";
    tblFletesList.innerHTML = itemtb;
  }
}




const typeList = document.getElementById("typesPList");
typesPList();
function modNwProvider(){
  $('#modNwProvider').modal('show');
  document.getElementById('general-tab').class="nav-link active";

  services = new Array();
  fletes = new Array();
  fillTable();
  fillTblFlete();


}
var provider={};
var providerContact={};

function addProvider(){

    if (txtName.value =='') {
      alert("Debe escribir el Nombre de la Empresa");
    }
    if (txtArea.value =='') {
      alert("Debe escribir el giro de la empresa ej. Agencia Aduanal");
    }
    if (txtSector.value =='') {
      alert("Debe escribir el Sector");
    }
    if (txtProviderType.value =='') {
      alert("Debe escribir el Tipo de Empresa");
    }
    
    if (txtCalle.value =='') {
      alert("Debe escribir la calle del domicilio de la empresa");
    }
    if (txtColonia.value =='') {
      alert("Debe escribir la colonia del domicilio de la empresa");
    }
    if (txtNumExt.value =='') {
      alert("Debe escribir el Número Exterior del domicilio de la empresa");
    }
    if (txtCP.value =='') {
      alert("Debe escribir el Código Postal del domicilio de la empresa");
    }
    if(services == "" && fletes == ""){
    alert("Favor de Agregar al menos un servicio/flete para continuar...")

    }
    else{
      //console.log(services);
      //console.log(fletes);
    
      provider.txtName = txtName.value;
      provider.txtArea = txtArea.value;
      provider.txtSector = txtSector.value;
      provider.txtProviderType = txtProviderType.value;
      provider.txtPhone =txtPhone.value;
      provider.txtEmail =txtEmail.value;
      provider.userId = <?php echo $_SESSION['user']['userId'] ?>;

      providerContact.txtStreet = txtCalle.value;
      providerContact.txtColony = txtColonia.value;
      providerContact.txtOutNumber = txtNumExt.value;
      providerContact.txtInNumber = txtNumInt.value;
      providerContact.txtPostalCode = txtCP.value;
      providerContact.txtCity = txtCiudad.value;
      providerContact.txtState = txtEstado.value;

      addAddress();

      console.log(provider.userId);

      //cleanInputs();
  }

}



function addAddress()
{
  axios.post("<?php echo site_url('nwAddress') ?>", providerContact
  ).then(function(res){

      if (res.status == 200) {

        if(res.data != false){
          provider.fk_eIdAddress = res.data;
          nwProvider();
        }
      }

    }).catch(function(err){

      alert(err);
    });
}

function nwProvider(){
  axios.post("<?php echo site_url('nwProvider') ?>", provider
  ).then(function(res){

      if (res.status == 200) {

        if(res.data != false){
          if(services != ""){
            
            insertServices(res.data);

          }else if(fletes != ""){
            
            insertFletes(res.data);

          }
          else{
            alert("Seleccionar al menos 1 servicio/flete");
          }
          
          
        }
      }

    }).catch(function(err){

      alert(err);
    });

}

function insertServices(idProvider){
  
  for (var service of services) {
    service.fk_eIdProvider = idProvider;
  }
  axios.post("<?php echo site_url('nwServices') ?>", services
  ).then(function(res){

      if (res.status == 200) {

        if(res.data != false){
          if(fletes != ""){
            insertFletes(idProvider);

          }
          else{
            window.location ="<?php echo site_url('providers') ?>";
          }
        }
      }

    }).catch(function(err){

      alert(err);
    });

}
 function insertFletes(idProvider){
  for (var flete of fletes) {
    flete.fk_eIdProvider = idProvider;

  }

  axios.post("<?php echo site_url('nwFletes') ?>", fletes
  ).then(function(res){

      if (res.status == 200) {
           
        let itemtblC ="";
        if(res.data != false){
          console.log(res.data);
          if(res.data){
            window.location ="<?php echo site_url('providers') ?>";
          }
        }
        else{
            alert("Seleccionar al menos 1 servicio/flete");
        }
      }

    }).catch(function(err){

      alert(err);
    });
 }

 

function cleanInputs(){
  txtName.value = "";
  txtArea.value = "";
  txtSector.value = "";
  txtProviderType.value = "";
  txtCalle.value = "";
  txtColonia.value = "";
  txtNumExt.value = "";
  txtNumInt.value = "";
  txtCP.value = "";
  txtCiudad.value = "";
  txtEstado.value = "";
  txtPhone.value = "";
  txtEmail.value = "";
  txtService.value = "";
  txtCosto.value = "";
  txtDescService.value = "";
  txtOrigen.value = "";
  txtDestiny.value = "";
  txtCostoFlete.value = "";
  txtDistance.value = "";
  txtDescFlete.value = "";
  providers = {};
  services = {};

  fillTblFlete();
  fillTable();

}

function typesPList(){

  let item ="";
  item += "<option value='Transportista'>Transportista</option>";
  item += "<option value='Agencia Aduanal'>Agencia Aduanal</option>";
  item += "<option value='Operadora'>Operadora</option>";
  item += "<option value='Terminal Marítima'>Terminal Marítima</option>";
  item += "<option value='Terminal Terrestre'>Terminal Terrestre</option>";
  item += "<option value='Terminal Aérea'>Terminal Aérea</option>";


  typeList.innerHTML = item;
}

//let val = 0;
function delService(idDiv){
    let deletedRow = {} ;
    
    if( idDiv == 1 ){
      deletedRow = services.shift();

    }
    else{
      deletedRow = services.splice(idDiv, 1);

      

    }
    fillTable(services);
  }

function delFlete(idDiv){
    let deletedRow = {} ;
    
    if( idDiv == 1 ){
      deletedRow = fletes.shift();

    }
    else{
      deletedRow = fletes.splice(idDiv, 1);

      

    }
    fillTblFlete();
  }


  function fillListFletesTypes(){
          axios.get("<?php echo site_url('getTypeFletes') ?>",{
            responseType: 'json'
        }).then(function(res) {
          if (res.status == 200) {
            let items =" ";
            for(var tipo of res.data){
              
              items += "<option title = '" + tipo.DescripcionFlete + "' value='" + tipo.idTipo + "'>" + tipo.TipoFlete + "</option>";
            }
            document.getElementById('listFletesTypes').innerHTML = items;
          }
        }).catch(function(err) {
          alert(err);
          console.log(err);
        });
  }

</script>


