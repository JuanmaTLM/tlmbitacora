
<style type="text/css">
  input#txtRFC{
    text-transform: uppercase;
}
</style>


<div class="modal" id="addCotizacion" style="overflow:scroll;">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" >Cotización de <strong >Servicios Integrales de Logística</strong></h4>
        
      </div>

      <!-- Modal body -->
      <div class="modal-body d-flex flex-wrap flex-column border border-black rounded-right border-top-0">
        <div class="p-2 bg-light rounded" id="clientData">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#datosCliente">Datos del cliente</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#mercaData">Datos Conceptos</a>
              </li>
            </ul>
        </div>
    <form id="frmCotizacion">
          <div class="p-2 bg-white  d-flex flex-wrap tab-content">
<!-- Datos Cliente-->
            <div class="tab-pane container active " id="datosCliente">

              <div class="d-flex flex-wrap border-top-0 border-black">
                
                <div class="form-group p-2">
                  <label for="txtRFC">RFC:</label>
                  <input required type="text" class="form-control" name="txtRFC" id="txtRFC" maxlength="13" minlength="10" >
                </div>
                <div class="form-group p-2 flex-fill">
                  <label for="txtNombre">Nombre del Cliente:</label>
                  <input required type="text" class="form-control" name="txtNombre" id="txtNombre">
                </div>

              </div>

              <div class="d-flex flex-wrap border-top-0 border-black">
                
                <div class="form-group p-2 flex-fill">
                  <label for="txtMail">Correo:</label>
                  <input  type="text" class="form-control" name="txtMail" id="txtMail">
                </div>
                <div class="form-group p-2 flex-fill">
                  <label for="txtPhone">Teléfono:</label>
                  <input  type="text" class="form-control" name="txtPhone" id="txtPhone">
                </div>

              </div>

            </div>


<!-- Datos Mercancías-->
          
            <div class="tab-pane container fade" id="mercaData">
              
              <div class="d-flex flex-wrap border-top-0 border-black">
                
                <div class="form-group p-2 flex-fill">
                  <label for="txtProyecto">Proyecto:</label>
                  <input required type="text" class="form-control" name="txtProyecto" id="txtProyecto">
                </div>
   
                <div class="form-group p-2 flex-fill">
                  <label for="txtVigencia">Vigencia:</label>
                  <input type="date" class="form-control" id="txtVigencia" name="txtVigencia"  onchange="fillDays();" required>
                  
                </div>
                <div class="form-group p-2">
                  <label for="txtDiaCredito">Días Crédito:</label>
                  <input  type="number" class="form-control" name="txtDiaCredito" id="txtDiaCredito" disabled>
                </div>

              </div>
              <!--  -->
             
              <h5>Conceptos:</h5>
              <hr>
              <div class="d-flex flex-wrap border-top-0 border-black">
                
                
                <div class="form-group p-2 ml-auto">
                  <button type="button" class="btn btn-outline-success btn-md" onclick="openConcepts();">
                    <span class="fa fa-plus"></span>
                  </button>
                </div>
                
              </div>
  
              <div class="d-flex flex-wrap border-top-0 border-black">
                <table class="table table-hover" id="tblConceptos">
                    <thead>
                      <tr>
                        <th>Cantidad</th>
                        <th>Descripción </th>
                        <th title="Precio Unitario">P/U</th>
                        <th title="Porcentaje correspondiente de IVA">IVA (%) </th>
                        <th title="Monto monetario correspondiente de IVA">Monto IVA ($) </th>
                        <th>Tipo Moneda</th>
                        <th>Valor de Cambio</th>
                        <th>Importe</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody id="checkList" style="overflow: scroll;">
                      
                    </tbody>
                  </table>
                
               
              </div>

              <div class="d-flex flex-wrap justify-content-end">
                <div class="p-2">
                  <label><strong>Total:</strong></label><label id="totCot"></label>
                </div>
              </div>

            </div>

         </div>
      </div>
      <div class="modal-footer d-flex flex-wrap justify-content-around ">
        <button type="button" class="btn btn-outline-success" onclick="saveCotizacion();">Guardar</button>
        <button type="button" class="btn btn-outline-danger" onclick="cleanCot();">Cancelar</button>
      </div>
    </form>

    </div>
  </div>
</div>



<div class="modal" id="addConcepto">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Nuevo Concepto</h4>
        
      </div>

      <!-- Modal body -->
      <div class="modal-body d-flex flex-wrap flex-column border border-black rounded-right border-top-0">
          <div class="d-flex flex-wrap border-top-0 border-black">
            
            <div class="form-group p-2 flex-fill">
              <label for="txtConcepto">Descripción:</label>
              <input required type="text" class="form-control" name="txtConcepto" id="txtConcepto" placeholder="Descripción del Concepto a Cotizar">
              
            </div>
           
          </div>

          <div class="d-flex flex-wrap border-top-0 border-black justify-content-end" >
            
            <div class="form-group p-1">
              <label for="txtCant">Cantidad:</label>
              <input required type="number" class="form-control" name="txtCant" id="txtCant" min="1" value="1" onkeyup="findMonetary()" onchange="findMonetary()">
            </div>
            <div class="form-group p-1">
              <label for="flPrecio">Precio:</label>
              <input required type="number" step=".05" class="form-control" min="1.00" value="1.00" name="flPrecio" id="flPrecio" onkeyup="findMonetary()" onchange="findMonetary()">
            </div>
            <div class="form-group p-1">
              <label for="txtIVA">IVA(%):</label>
              <input required  type="number" step=".01" min="0.01" max ="99.99" value="0.00" class="form-control" name="txtIVA" id="txtIVA" onkeyup="findMonetary()" onchange="findMonetary()">
            </div>

          </div>
           <div class="d-flex flex-wrap border-top-0 border-black" >
                
                <div class="form-group p-2 flex-fill" >
                  <label for="txtMoneda">Tipo de Moneda de Cambio:</label>
                  <input  type="text" class="form-control" name="txtMoneda" id="txtMoneda" list="moneyList">
                  <datalist id="moneyList">
                    <option value="Peso Mexicano" title="Peso Mexicano">MX ($)</option>
                    <option value="Dólar estadounidense" title="Dólar estadounidense">USD ($)</option>
                    <option value="Euro" title="Euro">EUR (€)</option>
                    <option value="Yen japonés" title="Yen japonés">JPY (¥)</option>
                    <option value="Libra esterlina" title="Libra esterlina">GBP (£)</option>
                  </datalist>
                </div>
                <div class="form-group p-2 flex-fill">
                  <label for="txtValorCambio">Valor moneda:</label>
                  <input  type="number" class="form-control" name="txtValorCambio" id="txtValorCambio" min="1.00" step="0.05" value="1.00" onkeyup="findMonetary()" onchange="findMonetary()">
                 
                </div>
                

              </div>

               <div class="d-flex flex-wrap justify-content-end border-top-0 border-black" >

                <div class="form-group p-2">
                  <label for="flTotal">Total:
                  <input  type="number"  class="form-control" name="flTotal" id="flTotal" disabled>
                 
                </div>
                

              </div>

          
  
      </div>
      <div class="modal-footer d-flex flex-wrap justify-content-around">
        <button type="button" class="btn btn-outline-success"  onclick="addCheckElement();">Guardar</button>
        <button type="button" class="btn btn-outline-danger"  onclick="cleanConcept();">Cancelar</button>
        
      </div>

    </div>
  </div>
</div>


<div class="modal" id="newCotizacion">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tipo de cotizacion </h4>

      </div>

      <!-- Modal body -->
      <div class="modal-body d-flex flex-wrap flex-column border border-black rounded-right border-top-0">
          <label for="opCoti">Tipo de cotización:</label>
          <select class="form-control" name="opCoti" id="opCoti">
            <option value="0">Seleccione una opción</option>
            <option value="1">Servicios Interales de Logística</option>
            <option value="2">Servicio de Transporte</option>
            
          </select>
  
      </div>
      <div class="modal-footer d-flex flex-wrap justify-content-around">
        <button type="button" class="btn btn-outline-success" onclick="selCoti();">Siguiente</button>
        <button type="button" class="btn btn-outline-danger" >Cancelar</button>
        
      </div>

    </div>
  </div>
</div>

<script src="../assets/js/Mercancia.js"></script>


<script type="text/javascript">
  function selCoti(){
      let op = document.getElementById('opCoti').value;
      switch(op){
      case '1':
        $("#newCotizacion").modal('hide');
        $("#addCotizacion").modal('show');
        break;
      case '2':
        $("#newCotizacion").modal('hide');
        $("#newTransporte").modal('show');
        break;
      }
  }
  getDate();
  function fillDays(){
    let creditDays = document.getElementById("txtDiaCredito");
    var timeStart = new Date();
    var timeEnd = new Date(document.getElementById("txtVigencia").value);
    if (timeEnd > timeStart)
    {
        var diff = timeEnd.getTime() - timeStart.getTime();
        creditDays.value = Math.round(diff / (1000 * 60 * 60 * 24));
    }
    else if (timeEnd != null && timeEnd < timeStart) {
        alert("La fecha final de la promoción debe ser mayor a la fecha inicial");
        creditDays.value = 0;
    }
  }
  function getDate(){
      var today = new Date();
      let inpDate = document.getElementById("txtVigencia");
      let tdy =  today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
      inpDate.value = addDays(today, +2);
      inpDate.max="2023-12-31";
      inpDate.min=tdy; 

  }
  function addDays(date, days){
  date.setDate(date.getDate() + days);
  return date;
}

   let flTotal = document.getElementById('flTotal');
   let montIVA = 0.00;

  function findMonetary(){
   let resultadoCambio;
   let resultadoCosto;
   let flCantidad= parseFloat(document.getElementById('txtCant').value).toFixed(2);
   let flPrecio = parseFloat(document.getElementById('flPrecio').value).toFixed(2);
   let flIVA= parseFloat(document.getElementById('txtIVA').value).toFixed(2);
   let flValorCambio= parseFloat(document.getElementById('txtValorCambio').value).toFixed(2);

    resultadoCambio = flCantidad * flPrecio * flValorCambio;
    resultadoCosto = parseFloat((resultadoCambio * (flIVA / 100)) + resultadoCambio);
    montIVA = parseFloat(resultadoCambio * (flIVA / 100));


    flTotal.value = resultadoCosto.toFixed(2);
  }


  let listCheck = document.getElementById("checkList");
   
  function newCot(){
    $("#newCotizacion").modal('show');
  }
  function openConcepts(){
    $("#addConcepto").modal('show');

  }
  function cleanCot(){
    $("#addCotizacion").modal('hide');
    document.getElementById("frmCotizacion").reset();
  }

  function cleanConcept(){
    $("#addConcepto").modal('hide');
    document.getElementById("txtConcepto").value= '';
    document.getElementById("txtMoneda").value= '';

    document.getElementById('txtCant').value = 1;
    document.getElementById('flPrecio').value = 1.00;
    document.getElementById('txtIVA').value = 0.00;
    document.getElementById('txtValorCambio').value = 1.00;
    flTotal.value = '';


  }

  var totCotizacion = 0;
  var cardNum = 1;
  var listConcepts = [];
  
  function addCheckElement(data){
    let item = {};
    let txtConcepto = document.getElementById("txtConcepto").value;
    let flCantidad = document.getElementById('txtCant').value;
    let flPrecio = document.getElementById('flPrecio').value;
    let flIVA = document.getElementById('txtIVA').value;
    let flValorCambio = document.getElementById('txtValorCambio').value;
    let txtMoneda = document.getElementById('txtMoneda').value;
    /*AJUSTAR QUE SE PUEDA VALIDAR SI NO ESTÁN EN BLANCO...*/
    item.montIVA = montIVA;
    item.txtMoneda = txtMoneda;
    item.txtConcepto = txtConcepto;
    item.flTotal = flTotal.value;
    item.flCantidad = flCantidad;
    item.flPrecio = flPrecio;
    item.flIVA = flIVA;
    item.flValorCambio = flValorCambio;
  



    
    listConcepts.push(item);
    
    
    fillTable(listConcepts);
    cleanConcept();
  }
let val = 0;
  function delCard(idDiv){
    let deletedRow = {} ;
    
    if( idDiv = 1 ){
      deletedRow = listConcepts.shift();
      val = deletedRow.impConc;


    }
    else{
      deletedRow = listConcepts.splice(idDiv, 1);
      val = deletedRow.impConc;
      

    }
    totCotizacion = parseFloat(totCotizacion).toFixed(2);
      
    totCotizacion =totCotizacion - val;
    
    totCotizacion = totCotizacion.toFixed(2);


    fillTable(listConcepts);
    
  }
const totCoti = document.getElementById("totCot");

function fillTable(data){
  
  var itemtb= " ";
  listCheck.innerHTML = itemtb;
  var numItb = 1;
  console.log(data);

  for(var dato of data){
    
      itemtb += "<tr>";

        itemtb += "<td>";
          itemtb += dato.flCantidad ;
        itemtb += "</td>";

        itemtb += "<td>";
          itemtb += dato.txtConcepto;
        itemtb += "</td>";

        itemtb += "<td title='Precio Unitario'>";
          itemtb += parseFloat(dato.flPrecio).toFixed(2);
        itemtb += "</td>";

        itemtb += "<td title='Porcentaje correspondiente de IVA'>";
          itemtb += parseFloat(dato.flIVA).toFixed(2);
        itemtb += "</td>";

        itemtb += "<td title='Monto monetario correspondiente de IVA'>";
          itemtb += parseFloat(dato.montIVA).toFixed(2); 
        itemtb += "</td>";

        itemtb += "<td>";
          itemtb += dato.txtMoneda; 
        itemtb += "</td>";

        itemtb += "<td>";
          itemtb += parseFloat(dato.flValorCambio).toFixed(2); 
        itemtb += "</td>";


        itemtb += "<td>";
          itemtb += parseFloat(dato.flTotal).toFixed(2); 
        itemtb += "</td>";

        itemtb += "<td>";

        itemtb += "<button type='button' class='btn btn-outline-danger btn-md' id = '";

        itemtb += dato.numItb;

        itemtb += "' onclick = 'delCard(this.id);'>Borrar</button>";

        itemtb += "</td>";

      itemtb += "</tr>";

      listCheck.innerHTML = itemtb;
      numItb++;
      }
      totCoti.innerHTML = parseFloat(totCotizacion).toFixed(2);

}

function validaRFC(txtRfc){
  var strCorrecta;
  strCorrecta = txtRfc; 
  if (txtRfc.length == 12){
  var valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
  }else{
  var valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
  }
  var validRfc=new RegExp(valid);
  var matchArray=strCorrecta.match(validRfc);
  if (matchArray==null) {
    alert('RFC incorrecto');
    document.getElementById("txtRFC").focus();
    return false;
  }
  else
  {
    alert('Cadena correcta:' + strCorrecta);
    return true;
  }
}

var obj = [];
let txtRFC =document.getElementById('txtRFC');
let txtNombre =document.getElementById('txtNombre');
let txtMail =document.getElementById('txtMail');
let txtPhone =document.getElementById('txtPhone');
let txtProyecto =document.getElementById('txtProyecto');
let txtVigencia =document.getElementById('txtVigencia');

function saveCotizacion(){
  
  
  obj.client = {};
  obj.proyect = {};
  obj.listConcepts = listConcepts;
  obj.client.txtRFC = txtRFC.value;
  obj.client.txtNombreCliente =txtNombre.value ;
  obj.client.txtMail = txtMail.value;
  obj.client.txtTelefono = txtPhone.value;

  obj.proyect.txtProyecto = txtProyecto.value;
  obj.proyect.txtVigencia = txtVigencia.value;

 

  sendData(obj);

}

function sendData(data){

axios.post("<?php echo site_url('newCotizacion'); ?>" , data.client
      ).then(function(res){
          if (res.status == 200) {
            if(res.data){
              console.log(res.data);
            }
          }
      }).catch(function(err){
          alert("Something went wrong with the filter, try later");
          console.log(err);
      });
  
}
</script>