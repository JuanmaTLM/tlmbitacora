<style type="text/css">
 #addNewRef{
  min-height: 100vh;
  overflow: scroll;
 }
 .inputGastos{
  min-width: 30vw;
 }
 .btns{
   width : 10vw;
 }

</style>

<!-- Modal Nuevo -->
 <div class="modal fade bg-primary" id="addNewRef">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
        <div class="d-flex flex-container" style="width:100%">
          <div class="p-2  flex-fill">
            <h4 class="modal-title ">Agregar nueva referencia </h4>
          </div>
         <div class="p-2">
           <h6 id="fecha"></h6>
         </div>

         </div>
       </div>

       <!-- Modal body -->
       <div class="modal-body">

        <div class="d-flex justify-content-center flex-column   bg-light text-black">
          <ul class="nav nav-tabs" id="myTab2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="Generales-tab" data-toggle="tab" href="#Generales" role="tab" aria-controls="Generales" aria-selected="true">Datos generales <span class="badge badge-pill badge-danger">6</span> </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="Mercancia-tab" data-toggle="tab" href="#Mercancia" role="tab" aria-controls="Mercancia" aria-selected="false">Mercancía <span class="badge badge-pill badge-danger">7</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="Gastos-tab" data-toggle="tab" href="#Gastos" role="tab" aria-controls="Gastos" aria-selected="false">Gastos <span class="badge badge-pill badge-warning">15</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="Otras-tab" data-toggle="tab" href="#Otras" role="tab" aria-controls="Otras" aria-selected="true">Otras Maniobras <span class="badge badge-pill badge-warning">5</span></a>
            </li>

          </ul>

          <div class="tab-content" id="myTab2Content">

              <div class="tab-pane fade show active" id="Generales" role="tabpanel" aria-labelledby="Generales-tab">
                  <div class="d-flex flex-column justify-content-center">

                  	<div class="d-flex align-items-around  ">

                  	  <div class="input-group mb-3 p-2">
                  	      <div class="input-group-prepend">
                  	        <span class="input-group-text" >#Referencia</span>
                  	      </div>
                  	      <input id="txtReferencia" type="text" class="form-control" name= "txtReferencia" placeholder="#Referencia">
                  	  </div>

                  	  <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Cliente</span>
                          </div>
                          
                          <input id="txtCliente" type="text" class="form-control" name= "txtCliente" placeholder="Cliente" list="listCtes">
                          <datalist id="listCtes">
                            <?php if(isset($allCtes)){
                                  foreach($allCtes as $cte){ ?>
                                    <?php if ($cte['Tipo'] == 0){ ?>
                                      <option value="<?php echo $cte['RFC'] ?>"><?php echo $cte['txtRazonSocial'] ?></option>
                                      
                                    <?php }else{ ?>
                                      <option value="<?php echo $cte['RFC'] ?>"><?php echo $cte['NombreCompleto'] ?></option>
                             <?php    } }
                              } ?>
                          </datalist>
                      </div>

                  	</div>

                  </div>
                  <div class="d-flex align-items-around">
                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">ETA</span>
                          </div>
                          <input id="txtETA" type="text" class="form-control" name= "txtETA" placeholder="ETA">
                      </div>
                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Naviera</span>
                          </div>
                          <input id="txtNaviera" type="text" class="form-control" name= "txtNaviera" placeholder="Naviera">
                      </div>
                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Vessel</span>
                          </div>
                          <input id="txtVessel" type="text" class="form-control " name= "txtVessel" placeholder="Vessel">
                      </div>
                  </div>
                  <div class="d-flex align-items-around">
                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Voyaje</span>
                          </div>
                          <input id="txtVoyaje" type="text" class="form-control " name= "txtVoyaje" placeholder="Voyaje">
                      </div>
                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Terminal</span>
                          </div>
                          <input id="txtTerminal" type="text" class="form-control " name= "txtTerminal" placeholder="Terminal">
                      </div>
                  </div>
                  <div class="d-flex align-items-around">
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Cuenta de Gastos</span>
                          </div>
                          <input id="txtCuenta" type="text" class="form-control newR" placeholder="Cuenta de Gastos">
                      </div>
                      <div class="custom-file  mb-3 p-2">
                          <input type="file" class="custom-file-input " name= "dctoCuenta" id="dctoCuenta">
                          <label class="custom-file-label" for="dctoCuenta">Agregar Documento</label>
                      </div>
                  </div>
              </div>

              <div class="tab-pane fade" id="Mercancia" role="tabpanel" aria-labelledby="Mercancia-tab">

                  <div class="d-flex flex-column justify-content-center">
                    <div class="d-flex align-items-around  ">
                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text" >#Contenedor</span>
                          </div>
                          <input id="txtContenedor" name="txtContenedor" type="text" class="form-control "  placeholder=" #Contenedor">
                      </div>

                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Tamaño/Tipo: </span>
                          </div>
                          <input id="txtTamTip" name="txtTamTip" type="text" class="form-control "  placeholder="Tamaño/Tipo">
                      </div>
                    </div>

                  </div>

                  <div class="d-flex align-items-around">

                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Pedimento: </span>
                          </div>
                          <input id ="txtPedimento" type="text" class="form-control " placeholder="ETA">
                      </div>

                      <div class="input-group mb-3 p-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">BL: </span>
                          </div>
                          <input id ="txtBL" type="text" class="form-control" placeholder="BL">
                      </div>

                  </div>

                  <div class="d-flex justify-content-end p-2 ">
                    <button type="button" class="btn btn-md btn-outline-info"  data-toggle="modal" data-target="#addMerca"><span class="fa fa-plus"></span> Mercancía</button>
                  </div>

                  <div class="d-flex flex-container border rounded bg-white justify-content-center" >
                    <form id="frmMercancias" >
                      <div id="mercaList" class="p-2">

                      </div>
                    </form>
                  </div>

              </div>


              <div class="tab-pane fade" id="Gastos" role="tabpanel" aria-labelledby="Gastos-tab">

                <div class="d-flex justify-content-end ">
                  <div class="p-2" >
                    <button type="button" class="btn btn-outline-primary btn-md"  onclick="selectGastos();" > <span class="fa fa-plus"></span> Gastos</button>
                  </div>
                </div>
                <hr>

                  <form id="frmGastos">
                      <div class="d-flex  justify-content-center" >
                        <div class="p-2" id="gastosList">

                        </div>
                      </div>
                  </form>

              </div>

              <div class="tab-pane fade" id="Otras" role="tabpanel" aria-labelledby="Otras-tab">

                <div class="d-flex justify-content-end">
                  <div class="p-2">
                    <button type="button" class="btn btn-outline-primary btn-md"  onclick="selectOtros();"><span class="fa fa-plus"></span> Maniobra Extra</button>
                  </div>
                </div>
                <hr>

                <form id="frmOtras">
                      <div class="d-flex  justify-content-center" >
                        <div class="p-2" id="gastosExtra">
                        </div>
                      </div>
                </form>

              </div>
        </div>

       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
         <button id="btnSave" type="button" class="btn btn-outline-primary btn-lg"><span class="fa fa-save"></span></button>

         <button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancelar</button>
       </div>

     </div>
   </div>
 </div>


<!-- MODAL PARA AGREGAR UNA NUEVA MERCANCÍA -->

<div class="modal fade" id="addMerca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Mercancía</h5>

      </div>
      <div class="modal-body">


          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Mercancía</span>
              </div>
              <input type="text" class="form-control " name= "txtMerca" placeholder="Merancía" id="txtMerca" required>
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Bultos</span>
              </div>
              <input type="text" class="form-control " name= "txtBultos" placeholder="Bultos" id="txtBultos" required>
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Fracción Arancelaria: </span>
              </div>
              <input type="text" class="form-control " name= "txtFracc" placeholder="Fracción Arancelaria"  id="txtFracc" required>
          </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" onclick="closeMerca();">Cerrar</button>
        <button type="button" class="btn btn-outline-primary" onclick="addMerca();">Agregar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL PARA SELECCIONAR GASTOS -->

<div class="modal fade" id="mdGastos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccionar Gastos</h5>

      </div>
      <div class="modal-body">
        <div class="d-flex flex-container  flex-wrap border justify-content-between">
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payRevalidacion" id="payRevalidacion">Revalidación
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payMuellaje" id="payMuellaje">Muellaje/Cargo por seguridad
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payPrevio" id="payPrevio" >Previo
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payTiempo_Extra_ordinario" id="payTiempo_Extra_ordinario" >Tiempo Extra ordinario
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payPersonal_Adicional" id="payPersonal_Adicional" >Personal adicional
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payManiobra_Entrega" id="payManiobra_Entrega" >Maniobra entrerga
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payFumigacion" id="payFumigacion" >Fumigación
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payLavado_de_Contenedor" id="payLavado_de_Contenedor" >Lavado de Contenedor
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payReconocimiento_Aduanero" id="payReconocimiento_Aduanero" >Reconocimiento Aduanero
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payLiberacion" id="payLiberacion" >Liberación
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name= "payDescarga_de_Vacio" id="payDescarga_de_Vacio" >Descarga de vacío
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payFlete" id="payFlete" >Flete
            </label>
          </div>
          <div class="form-check-inline p-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input " name= "payDemoras" id="payDemoras" >Demoras
            </label>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" onclick="closeGastos();">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  function newMerca(){

    $('#addMerca').modal({ show:true });


  }

  window.onload = function (){

      let gastos = [];

      /*  Código de checkbox*/

      $('input[type=checkbox]').on('change', function() {
          if ($(this).is(':checked') ) {
              let gas = $(this).prop("id");
              addInputs(gas);
          } else {
            var child = document.getElementById($(this).prop("id"));
            delGasto("divG" + child.id);


          }
      });

      /*Fin chekbox*/

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

  function cleanInputs(itemMerca){

    document.getElementById("txtMerca").value = '';
    document.getElementById("txtBultos").value = '';
    document.getElementById("txtFracc").value = '';

    document.getElementById('frmMercancias').reset();
  }

  let numGasto = 0;
  function addInputs(gasto){

     var inp = document.createElement("INPUT");
     var divGroupGasto = document.createElement("div");
     var divInptGroupGasto = document.createElement("div");
     var spanGasto = document.createElement("span");
     let listInputs = document.getElementById("gastosList");
     var btnDelInpt = document.createElement("button");


     if(gasto != ""){
       let lav = gasto.slice(3);
       let txt = lav.replaceAll('_',' ');
       let inpId = gasto;
       inp.setAttribute("type", "text");
       inp.setAttribute("id", inpId);
       inp.setAttribute("class", "form-control");
       inp.setAttribute("name", gasto);
       inp.setAttribute("placeholder", txt);

       divGroupGasto.setAttribute("class","input-group mb-3");
       divGroupGasto.setAttribute("id","divG" + inpId );
       divInptGroupGasto.setAttribute("class","input-group-prepend");
       spanGasto.setAttribute("class","input-group-text");
       spanGasto.setAttribute("id","lblInpGasto" + numGasto);


       divInptGroupGasto.appendChild(spanGasto);

       divGroupGasto.appendChild(divInptGroupGasto);
       divGroupGasto.appendChild(inp);

       btnDelInpt.setAttribute("class","btn btn-outline-danger");
       btnDelInpt.setAttribute("id","btnDelGasto" + numGasto);
       btnDelInpt.setAttribute("value",inpId);
       btnDelInpt.setAttribute("type","button");
       btnDelInpt.setAttribute("onclick","delGasto('divG"+ inpId +"');");
       divGroupGasto.appendChild(btnDelInpt);



       listInputs.appendChild(divGroupGasto);

       let spnIGastos = document.getElementById("lblInpGasto" + numGasto);
       let btnDelGastos = document.getElementById("btnDelGasto" + numGasto);
       btnDelGastos.innerHTML= "X";

       spnIGastos.innerHTML = txt;

       numGasto++;
     }
  }

  function delInputs(iName,btnName){
    let listInputs = document.getElementById("gastosList");
    listInputs.removeChild(iName);
    document.getElementById(btnName).disabled = 'true';
  }

  function delGasto(id){
    let div = document.getElementById('gastosList');
    let inpt = document.getElementById(id);
    console.log(inpt);
    div.removeChild(inpt);
    console.log(inpt);

  }

  function delExtra(iName){
    let listInputs = document.getElementById("gastosExtra");
    listInputs.removeChild(iName);
  }

  function delMerca(iName){
    let listInputs = document.getElementById("mercaList");
    console.log(listInputs);
    listInputs.removeChild(iName);
  }

  function closeGastos(){
    $("#mdGastos").modal('hide');
  }
  function closeMerca(){
      $("#addMerca").modal('hide');
      cleanInputs();
    }
  let dataMerca = {};
  let itemMerca = 0;
  function addMerca(){

    let txtMerca = document.getElementById("txtMerca").value;
    let txtBultos = document.getElementById("txtBultos").value;
    let txtFracc = document.getElementById("txtFracc").value;

    let base = "txt" + itemMerca;
    let ttMerca = "txtMerca_" + itemMerca;
    let ttBultos = "txtBultos_" + itemMerca;
    let ttFracc = "txtFracc_"  + itemMerca;

    var newDiv = document.createElement("div");
    var newDivBtns = document.createElement("div");
    var divInpGroupM = document.createElement("div");
    var divGroupM  = document.createElement("div");
    var divInpGroupB = document.createElement("div");
    var divGroupB  = document.createElement("div");
    var divInpGroupF = document.createElement("div");
    var divGroupF  = document.createElement("div");

    var merca = document.createElement("INPUT");
    var bulto = document.createElement("INPUT");
    var fracc = document.createElement("INPUT");

    var spmerca = document.createElement("span");
    var spbulto = document.createElement("span");
    var spfracc = document.createElement("span");

    var btnEdit = document.createElement("button");
    var btnSave = document.createElement("button");
    var btnDel = document.createElement("button");
    let listInputs = document.getElementById("mercaList");

     if(txtMerca != ''){

       var ed = "btnEdit_" + itemMerca;
       var del = "btnDel_" + itemMerca;
       var save = "btnSave_" + itemMerca;
       var divMerca = "div_" + itemMerca

       newDiv.setAttribute("id",divMerca);
       newDiv.setAttribute("class","p-2 d-flex justify-content-center flex-column");

       divInpGroupM.setAttribute("class","input-group mb-3");
       divInpGroupB.setAttribute("class","input-group mb-3");
       divInpGroupF.setAttribute("class","input-group mb-3");

       divGroupM.setAttribute('class',"input-group-prepend");
       divGroupB.setAttribute('class',"input-group-prepend");
       divGroupF.setAttribute('class',"input-group-prepend");

       spmerca.setAttribute("class","input-group-text");
       spbulto.setAttribute("class","input-group-text");
       spfracc.setAttribute("class","input-group-text");

       spmerca.setAttribute("id","inptGroupM" + itemMerca);
       spbulto.setAttribute("id","inptGroupB" + itemMerca);
       spfracc.setAttribute("id","inptGroupF" + itemMerca);

       divInpGroupM.appendChild(divGroupM);
       divInpGroupB.appendChild(divGroupB);
       divInpGroupF.appendChild(divGroupF);

       newDivBtns.setAttribute("id","divBtn_" + itemMerca);
       newDivBtns.setAttribute("class","p-2 d-flex justify-content-center");

       merca.setAttribute("type", "text");
       merca.setAttribute("id", ttMerca);
       merca.setAttribute("class", "form-control ");
       merca.setAttribute("name", ttMerca);
       merca.setAttribute("value", txtMerca);
       merca.setAttribute("disabled", "true");

       bulto.setAttribute("type", "text");
       bulto.setAttribute("id", ttBultos);
       bulto.setAttribute("class", "form-control");
       bulto.setAttribute("name", ttBultos);
       bulto.setAttribute("value", txtBultos);
       bulto.setAttribute("disabled", "true");

       fracc.setAttribute("type", "text");
       fracc.setAttribute("id", ttFracc);
       fracc.setAttribute("class", "form-control ");
       fracc.setAttribute("name",ttFracc);
       fracc.setAttribute("value", txtFracc);
       fracc.setAttribute("disabled", "true");

       divGroupM.appendChild(spmerca);
       divGroupB.appendChild(spbulto);
       divGroupF.appendChild(spfracc);

       divInpGroupM.appendChild(merca);
       divInpGroupB.appendChild(bulto);
       divInpGroupF.appendChild(fracc);

       newDiv.appendChild(divInpGroupM);
       newDiv.appendChild(divInpGroupB);
       newDiv.appendChild(divInpGroupF);


       btnEdit.setAttribute("id",ed);
       btnEdit.setAttribute("type","button");
       btnEdit.setAttribute("class","btn btn-outline-primary btn-sm btns");
       btnEdit.setAttribute("onclick","editMerca("+ itemMerca +");");

       btnDel.setAttribute("id",del);
       btnDel.setAttribute("type","button");
       btnDel.setAttribute("class","btn btn-outline-danger btn-sm btns");
       btnDel.setAttribute("onclick","delMerca("+ divMerca +");");

       btnSave.setAttribute("id",save);
       btnSave.setAttribute("type","button");
       btnSave.setAttribute("class","btn btn-outline-success btn-sm btns");
       btnSave.setAttribute("onclick","saveMerca("+ itemMerca +");");
       btnSave.setAttribute("style", "display:'none'");

       newDivBtns.appendChild(btnEdit);
       newDivBtns.appendChild(btnDel);
       newDivBtns.appendChild(btnSave);
       newDiv.appendChild(newDivBtns);
       listInputs.appendChild(newDiv);

       let btEd = document.getElementById(ed);
       let btDl = document.getElementById(del);
       let btSv = document.getElementById(save);

       var iM = 'inptGroupM' + itemMerca;
       var iB = 'inptGroupB' + itemMerca;
       var iF = 'inptGroupF' + itemMerca;

       let inpM = document.getElementById(iM);
       let inpB = document.getElementById(iB);
       let inpF = document.getElementById(iF);

       inpM.innerHTML = "Mercancía:";
       inpB.innerHTML = "Bultos:";
       inpF.innerHTML = "Fracción Arancelaria:";


       btEd.innerHTML = "Editar";
       btDl.innerHTML = "Borrar";
       btSv.style.display = "none";
       btSv.innerHTML = "Guardar";

       itemMerca++;
       cleanInputs(itemMerca);


     }else{
       alert("Debe agregar al menos una mercancía!");
     }

  }

  function editMerca(item){

    let tm = "txtMerca_" + item;
    let tb = "txtBultos_" + item;
    let tf = "txtFracc_" + item;
    let bE = "btnEdit_" + item;
    let bS = "btnSave_" + item;
    let bD = "btnDel_" + item;

    document.getElementById(tm).disabled = false;
    document.getElementById(tb).disabled = false;
    document.getElementById(tf).disabled = false;
    document.getElementById(bE).style.display ='none';
    document.getElementById(bD).style.display ='none';
    document.getElementById(bS).style.display ='block';

  }

  function saveMerca(item){

    let tm = "txtMerca_" + item;
    let tb = "txtBultos_" + item;
    let tf = "txtFracc_" + item;
    let bE = "btnEdit_" + item;
    let bS = "btnSave_" + item;
    let bD = "btnDel_" + item;

    document.getElementById(tm).disabled = true;
    document.getElementById(tb).disabled = true;
    document.getElementById(tf).disabled = true;
    document.getElementById(bD).style.display ='block';
    document.getElementById(bE).style.display ='block';
    document.getElementById(bS).style.display ='none';

  }




    function reset_campos(){
     $("#txtNombres").val("");
     $("#txtApellidos").val("");
     $("#txtTelefono").val("")
    }

    function selectGastos(){
      $("#mdGastos").modal("show");
    }

    let numExtra = 0;
    function selectOtros(){
      let item = prompt("Nombre de Maniobra:");
      if(item != null){
        var btnDelX = "btnDelExtra_" + item;
        let item2 = "payE" + item;

        var inp = document.createElement("INPUT");
        var divInput = document.createElement("div");
        var divInputG = document.createElement("div");
        var sManiobra = document.createElement("span");
        var btnDel = document.createElement("button");
        let listInputs = document.getElementById("gastosExtra");
        

        let lav = item.slice(4);
        let txt = lav.replaceAll('_',' ');
        let nDiv = "divE_" + item2;
        divInputG.setAttribute("id",nDiv);
        divInputG.setAttribute("class","input-group mb-3");
        divInput.setAttribute("class","nDiv input-group-prepend");
        divInput.setAttribute("class","p-2 d-flex justify-content-center ");

        inp.setAttribute("type", "text");
        inp.setAttribute("id", "extra_" + numExtra);
        inp.setAttribute("class", "form-control inputGastos m-2 align-self-center newR");
        inp.setAttribute("name",item2);
        inp.setAttribute("placeholder", txt);


        btnDel.setAttribute("id",btnDelX);
        btnDel.setAttribute("type","button");
        btnDel.setAttribute("class","btn btn-outline-danger btn-sm btns align-self-center");
        btnDel.setAttribute("onclick","delExtra(" + nDiv + ")");

        sManiobra.setAttribute("id","sManiobra_" + numExtra)

        divInputG.appendChild(sManiobra);
        divInput.appendChild(inp);
        divInput.appendChild(btnDel);
        listInputs.appendChild(divInput);

        let btDl = document.getElementById(btnDelX);
        let spM = document.getElementById("sManiobra_" + numExtra);
        btDl.innerHTML="X";
        alert(spM.id);
        numExtra++;

      }else{
        alert("Debe Escribir el nombre de la maniobra extra!");
      }
    }
    const obj = new Object();
    let mercancias = new Array();
    let gastos = new Array();
    let extras = new Array();
    $(function() {
      $("#btnSave").click(function(event) {

        var allData = $("#frmMercancias,#frmGastos,#frmOtras").serialize();
        console.log(allData);

        obj.txtRf = document.getElementById("txtReferencia").value;
        obj.txtCte = document.getElementById("txtCliente").value;
        obj.txtETA = document.getElementById("txtETA").value;
        obj.txtNav = document.getElementById("txtNaviera").value;
        obj.txtVes = document.getElementById("txtVessel").value;
        obj.txtVoy = document.getElementById("txtVoyaje").value;
        obj.txtTer = document.getElementById("txtTerminal").value;
        obj.txtCta = document.getElementById("txtCuenta").value;
        obj.fileDctCta = document.getElementById("dctoCuenta").value;
        obj.txtCont = document.getElementById("txtContenedor").value;
        obj.txtTaTi = document.getElementById("txtTamTip").value;
        obj.txtPed = document.getElementById("txtPedimento").value;
        obj.txtBL = document.getElementById("txtBL").value;
        for( i=0;i<itemMerca ; i++)
        {

          let merca = document.getElementById("txtMerca_" + i).value;
          let bulto = document.getElementById("txtBultos_" + i).value;
          let fracc = document.getElementById("txtFracc_" + i).value;
          var mercancia = {txtMerca:merca, txtBulto:bulto, txtFracc: fracc};
          mercancias.push(mercancia);

        }
        for( j=0;j<numGasto ; j++)
        {

          let gast = document.getElementById("gasto_" + j);
          let nameGasto = gast.name;
          let txtGasto = gast.value;
          var gasto = {nameGasto : nameGasto, txtGasto : txtGasto};
          gastos.push(gasto);

        }
        for( k=0;k<numExtra ; k++){

          let ext = document.getElementById("extra_" + k);
          let nameExtra = ext.name;
          let txtExtra = ext.value;
          var extra = {nameExtra : nameExtra, txtExtra : txtExtra};
          extras.push(extra);

        }


        obj.listMercancias = mercancias;
        obj.listGastos = gastos;
        obj.listExtras = extras;

        obj.txtRev = document.getElementById("payRevalidacion").value;
        obj.txtMue = document.getElementById("payMuellaje").value;
        obj.txtPre = document.getElementById("payPrevio").value;
        obj.txtTiEx = document.getElementById("payTiempo_Extra_ordinario").value;
        obj.txtPeAd = document.getElementById("payPersonal_Adicional").value;
        obj.txtManEnt = document.getElementById("payManiobra_Entrega").value;
        obj.txtFum = document.getElementById("payFumigacion").value;
        obj.txtLav = document.getElementById("payLavado_de_Contenedor").value;
        obj.txtRecAd = document.getElementById("payReconocimiento_Aduanero").value;
        obj.txtDesc = document.getElementById("payDescarga_de_Vacio").value;
        obj.txtLib = document.getElementById("payLiberacion").value;
        obj.txtFle = document.getElementById("payFlete").value;
        obj.txtDem =  document.getElementById("payDemoras").value;

        console.log(obj);

        axios.post('<?php echo site_url('newRef') ?>', obj)
          .then(function (response) {
            alert(response.data);
          })
          .catch(function (error) {
            console.log(error);
          });

        });
      });

</script>

 <script src="<?php echo base_url(); ?>assets/js/Mercancia.js"></script>
