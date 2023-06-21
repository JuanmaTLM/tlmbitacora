<!----------------------------------- vwHeadRefs.php --------------------------------------->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

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
  .ref{
    width: 95%;
    height: 73vh;
    margin: 2.5%;
    padding: 2%;
  }
  .oilChart{
    width: 100vw;
    height: 30vh;
  }
  .flex-container{
    width: 90%;
    margin-left :5%;
    margin-right :5%
  }
  .desactived{
    display: none !important;
  }
  .btn-noline{
    border: none !important;

  }
  .btn-over{
    border: none !important;

    background-color: white !important;
    color:darkred !important;
  }
  .btn-over1{
    border: none !important;

    background-color: white !important;
    color:darkgreen !important;
  }
    input[type=text], input[type=file],input[type=date],input[type=number],input[type=email],input[type=password]{
    border : none;
    border-bottom: 1px solid black;

  }

</style>

<!----------------------------- vwListRef.php -------------------------------------->



<div class="container-fluid bg-white rounded p-1">
  <div class="row border-success bg-white shadow-sm m-1 rounded">

    <div class="col-lg-12 border clearfix rounded">
      <div class="float-left p-2">
        <form action="<?php echo site_url('dashboard') ?>" method="GET">
          <button class="btn btn-outline-warning" title="Regresar al menú anterior" ><< Regresar << </button>
        </form>
      </div>
      <div class="float-right p-2">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
             Cliente
          </button>
          <div class="dropdown-menu">
            
            <a class="dropdown-item" id="btnNewCte" href="#" data-toggle="modal" data-target="#addCte">Nuevo Cliente</a>
            <a class="dropdown-item" id="btnNewCte" href="<?php echo site_url('allClients')."?ref=1"; ?>" >Ver Clientes</a>
          </div>  
      </div>
      <div class="float-right p-2">
              <button id="btnNewRef" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addNewRef"><span class="fa fa-plus" title="Agregar Nueva Referencia"></span> Referencia</button>
            </div>
    </div>
  </div>

  <div class=" p-2 rounded bg-light shadow m-2">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#lista">Lista completa</a>
        </li>
        <li class="nav-item" disabled>
          <a class="nav-link " data-toggle="tab" href="#menu2" >Mis referencias</a>
        </li>
      </ul>

    <div class="tab-content">
      <div class="tab-pane container-fluid p-1 active" id="lista">
        <div class=" p-2 table-responsive bg-white rounded shadow-sm" >
                <table class="table text-center " id="tblReferencias">
                  <thead class="text-center">
                    <tr>
                      <th scope="col" class="text-center">ReferenciaTLM</th>
                      <th scope="col" class="text-center">Referencia Agencia Aduanal</th>
                      <th scope="col" class="text-center">Fecha</th>
                      <th scope="col" class="text-center">Cliente</th>
                      <th scope="col" class="text-center">ETA</th>
                      <th scope="col" class="text-center">Naviera</th>
                      <th scope="col" class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="refList">
                  </tbody>
                </table>
              </div>
        </div>
        <div class="tab-pane container fade" id="menu2">En proceso...</div>
    </div>
  </div>
</div>



<!--***********************************  MODALES ***************************************-->
<!---------------------------------- modAsignar.php -------------------------------------->
<div class="modal fade shadow-lg" id="modAsignar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Asignar Referencia</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo site_url('asignarRef') ?>" method ="POST" id="frmAsignar">
          <input type="hidden" name="txteIdRef" id="txteIdRef">  
          <div class="d-flex flex-wrap justify-content-center flex-column flex-container">
              <div class="d-flex flex-wrap justify-content-around">
                 <div class="input-group mb-3 p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white" >Asignar a:</span>
                      </div>
                      <select id="userList" type="text" class="form-control" name= "userList"  >
                      </select>
                  </div>
              </div>
          </div>

          <div class="d-flex flex-wrap justify-content-around flex-column flex-container">
            <button type="button" onclick="submitForm();" class="btn btn-outline-success"><i class='fas fa-people-carry' ></i>&nbsp;&nbsp; <strong> Asignar </strong></button>
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="resetForm();">Cancelar</button>
      </div>

    </div>
  </div>
</div>
<!-------------------------------- modal asignado a -------------------------------------->
<div class="modal fade shadow-lg"  id="modEmp">
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
<!----------------------------- modCteNew.php -------------------------------------->
<div class="modal fade shadow-lg" id="addCte">
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
              <h4>Domicilio <hr>  </h4>
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
<!----------------------------- modNewRef.php -------------------------------------->
 <div class="modal fade shadow-lg" id="addNewRef">
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
<!--***********************************  SCRIPT'S ***************************************-->
<script type="text/javascript">

  const idRef = document.getElementById('txteIdRef');
  const frmAsignar = document.getElementById('frmAsignar');
  const userList = document.getElementById('userList');

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
      fName.setAttribute("class","d-flex flex-wrap justify-content-center");
    fRSocial.setAttribute("class","desactived");
  }
  
  function asignar(id){
    idRef.value = id;
    fillUsers();
    $("#modAsignar").modal('show');
  }
  
  function resetForm(){
    frmAsignar.reset();
  }
  function submitForm(){
    if(confirm("Confirmar Asignación"))
      frmAsignar.submit();

  }

  function fillUsers(){
    axios.get("<?php echo site_url('fillUsers'); ?>").then(
      function(res){
            if (res.status == 200) {
              if(res.data){
                let item = '';
                var usersList = res.data;
                  console.log(usersList);
                
                for(let user of usersList){

                  item += "<option value='" + user.userID + "'><strong>" +  user.Usuario + "</strong> | " + user.TipoUsuario + "</option>";
                  
                }
              userList.innerHTML =  item;
              }
            }
          }).catch(function(err){
            alert(err);
            console.log(err);
          });
  }
  
  function fillRefs(table){
    let user = <?php echo$_SESSION['user']['userId']; ?>;
    let userType = <?php echo$_SESSION['user']['IdType']; ?>;
    table.innerHTML = "";
    var Refs = <?php (print_r(json_encode($allReferencias))); ?>;
    var ctes = <?php (print_r(json_encode($allCtes))); ?>;
    let url = "<?php echo site_url('clasGlosa'); ?>";
    let item = "";
    if(ctes){
      if(Refs){
        for(var ref of Refs){
          item += '<tr class="p-1 text-center">';
          item += '<th scope="row">'+ ref.cveReferencia + '</th>';
          item += '<td>'+ ref.txtReferenciaAD + 'AAD-001</td>';
          item += '<td>'+ ref.feReferencia + '14-02-2023</td>';
          if(ref.eType == 0){
            item += '<td>'+ ref.txtNombreCompleto + '</td>';
          }else{
            item += '<td>'+ ref.txtRazonSocial + '</td>';
          }
          
          item += '<td>'+ ref.txtETA + '</td>';
          item += '<td>'+ ref.txtNaviera + '</td>';
          
          item += '<td>';
          item += '<div class="d-flex flew-wrap justify-content-around align-items-center">';
          item += '<div>';
          
          item += '<button type="button" class="btn btn-outline-primary btn-sm text-center" value="'+ ref.eIdReferencia + '" title="Ver" name="btnVer'+ ref.eIdReferencia + '" onclick="verRef('+ ref.eIdReferencia + ');">Ver</button>';
          item += '</div>';
          if(userType < 8){
            if(ref.bAssigned == 0){
              item += '<div>';
              item += '<button type="button" class="btn btn-outline-primary btn-sm text-center"  title="Asignar Referencia" onclick="asignar(' + ref.eIdReferencia + ');">Asignar</button>';
              item += '</div>';
              item += '<div>';
              item += '<button type="button" class="btn btn-outline-info btn-sm text-center" value="'+ ref.eIdReferencia + '" title="Atender Referencia" name="btnAtender'+ ref.eIdReferencia + '" onclick="atender('+ ref.eIdReferencia + ');">Atender</button>';
              item += '</div>';
            }else{
              item += '<div>';
              item += '<button type="button" class="btn btn-outline-warning btn-sm text-center"  title="Re-Asignar Referencia" onclick="asignar(' + ref.eIdReferencia + ');">Re-Asignar</button>';
              item += '</div>';
              item += '<div>';
              
              item += '<button type="button" class="btn btn-outline-success btn-sm text-center" value="'+ ref.eIdReferencia + '" title="Dar Seguimiento" name="btnSeguimiento'+ ref.eIdReferencia + '" onclick="seguimiento('+ ref.eIdReferencia + ');">Dar Seguimiento</button>';
              item += '</div>';

            }
            if(ref.bActiva == 1){
              item += '<div>';
              item += '<button type="button" class="btn btn-outline-success btn-noline btn-sm text-center" value="'+ ref.eIdReferencia + '" title="Desactivar/Activar" id="btnChange'+ ref.eIdReferencia + '" onmouseover="backcolor(this.id,0);" onmouseleave="backcolor(this.id,1);"onclick="changeState('+ ref.eIdReferencia +');">Desactivar</button>';
              item += '</div>';
            }else{
              item += '<div>';
              item += '<button type="button" class="btn btn-outline-danger btn-noline btn-sm text-center" value="'+ ref.eIdReferencia + '" title="Desactivar/Activar" id="btnChange'+ ref.eIdReferencia + '" onmouseover="backcolor2(this.id,0);" onmouseleave="backcolor2(this.id,1);" onclick="changeState('+ ref.eIdReferencia +');">Activar</button>';
              item += '</div>';
            }
          }else{
            item += '<button type="button" class="btn btn-outline-success btn-sm text-center" value="'+ ref.eIdReferencia + '" title="Dar Seguimiento" name="btnSeguimiento'+ ref.eIdReferencia + '" onclick="seguimiento('+ ref.eIdReferencia + ');">Dar Seguimiento<i class="fas fa-chart-line"></i></button>';
              item += '</div>';
          }
          item += '</div>';
          item += '</td>';
          item += '</tr>';
        }
          table.innerHTML +=  item;
      }
    }else{
      alert("No existen Clientes para Referencias, generar un nuevo cliente");
      var cte = document.createElement("label");
      cte.setAttribute("name","cteRef");
      frmNewCte.reset();
      frmNewCte.appendChild(cte);
    }
    
    
  }
  

  function backcolor(btn,op){
    let btn1 = document.getElementById(btn);
    if(op == 0){
      btn1.setAttribute("class","btn btn-outline-danger btn-over");
    }
    else{
      btn1.setAttribute("class","btn btn-outline-success btn-noline");
    }
  }

  function backcolor2(btn,op){
    let btn1 = document.getElementById(btn);
    if(op == 0){
      btn1.setAttribute("class","btn btn-outline-success btn-over1");
    }
    else{
      btn1.setAttribute("class","btn btn-outline-danger btn-noline");
    }
  }
  
  function atender(ref){
    let data = {};
    data.ref = ref;
    axios.post("<?php echo site_url('atenderRef'); ?>" ,data).then(
    function(res){
          if (res.status == 200) {
            console.log(res.data);
            if(res.data){
              alert("Datos Actualizados!");
              window.location.reload();
            }
          }
        }).catch(function(err){
          alert(err);
          console.log(err);
        });

  }
  
  function changeState(refId){

    axios.post("<?php echo site_url('changeStateRef'); ?>" ,refId).then(
    function(res){
          if (res.status == 200) {
            console.log(res.data);
            if(res.data){
              alert("Datos Actualizados!");
              window.location.reload();
            }
          }
        }).catch(function(err){
          alert(err);
          console.log(err);
        });
  }

  function verRef(id){
    window.location.href ="<?php echo site_url('vwReference').'?idRef=' ?>"+id;
  }


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

  
  const modAddCte = document.getElementById('addCte');
  const fName = document.getElementById('CteName');
  const fRSocial = document.getElementById('RazonSocial');
  const cteRFC = document.getElementById('txtCteCURP');
  


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

 const tableReferences = document.getElementById('refList');
 fillRefs(tableReferences);

 $(document).ready( function () {
     $('#tblReferencias').DataTable({
       language:{
         processing : "En curso...",
         search : "Buscar:",
         lengthMenu: "Agrupar de _MENU_ items",
         info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
         infoEmpty: "NO existen datos...",
         infoFiltered : "(filtrando de _MAX_ elementos en total)",
         infoPostFix: "",
         //loadingRecords "Cargando...",
         zeroRecords: "No se encontraron datos con tu búsqueda.",
         emptyTable : "NO hay datos disponibles en la tabla.",
         paginate:{
           first: "Primero",
           previous : "Anterior",
           next: "Siguiente",
           last: "Último"
         },
         
       }
     });

 } );


 function seguimiento(idRef){
   window.location.href = "<?php echo site_url('clasGlosa') ?>" + "?eIdReferencia=" + idRef ;
   
 }

  
</script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>