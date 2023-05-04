
<style type="text/css">
  .izq{
    width: 30%;
  }
  .der{
    width: 70%;
  }
  
 
</style>

<div class="modal fade" id="modContainer">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title " id="cveCtaGasto">Agregar Contenedor a  <?php echo $listaMercancia['cveLMerca'] ?></h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="d-flex flex-wrap justify-content-center  flex-column">
                <div class="d-flex flex-column justify-content-center">
                  <div class="d-flex align-items-around  ">
                    <div class="input-group mb-3 p-2  flex-fill">
                        <div class="input-group-prepend">
                          <span class="input-group-text" >#Contenedor:</span>
                        </div>
                        <input id="txtContenedor" name="txtContenedor" type="text" class="form-control "  placeholder=" #Contenedor" required>
                    </div>
                    <div class="input-group mb-3 p-2 flex-fill">
                        <div class="input-group-prepend">
                          <span class="input-group-text">#Pedimento: </span>
                        </div>
                        <input id ="txtPedimento" type="text" class="form-control " placeholder="#Pedimento" required>
                    </div>

                    
                  </div>
                </div>

                <div class="d-flex align-items-around">
                  <div class="input-group mb-3 p-2 flex-fill">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Tamaño: </span>
                      </div>
                      <input id="txtTam" name="txtTam" type="text" class="form-control "  placeholder="Tamaño" required>
                  </div>
                  <div class="input-group mb-3 p-2 flex-fill">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Tipo: </span>
                      </div>
                      <input id="txtTip" name="txtTip" type="text" class="form-control "  placeholder="Tipo" required>
                  </div>
                    

                </div>

          </div>
            


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="saveContainer()">Guardar</button>
      </form>  
        <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  const txtContenedor = document.getElementById('txtContenedor');
  const txtTam = document.getElementById('txtTam');
  const txtTip = document.getElementById('txtTip');
  const txtPedimento = document.getElementById('txtPedimento');
  function saveContainer(){
    let merca = {};
    if (txtContenedor.value !=' '){
      merca.txtContenedor = txtContenedor.value;
    }else{
      alert("Favor de poner el # de Contenedor...");
      txtContenedor.focus();
    }
    if (txtPedimento.value !=' '){
      merca.txtPedimento = txtPedimento.value;
    }else{
      alert("Favor de poner el # de Contenedor...");
      txtPedimento.focus();
    }
    if (txtTam.value !=' '){
      merca.txtTam = txtTam.value;
    }else{
      alert("Favor de poner el # de Contenedor...");
      txtTam.focus();
    }
    if (txtTip.value !=' '){
      merca.txtTip = txtTip.value;
    }else{
      alert("Favor de poner el # de Contenedor...");
      txtTip.focus();
    }
    
    merca.eIdMerca = "<?php echo $listaMercancia['eIdMerca'] ?>";
    axios.post("<?php echo site_url('newContainer'); ?>" ,merca).then(
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


<div class="modal fade" id="addMerca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Mercancía</h5>

      </div>
      <div class="modal-body">
<form action="<?php echo site_url('addMerca'); ?>" method="POST" enctype="multipart/form-data" id="frmNewMerca">

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
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Foto: </span>
              </div>
              <input type="file" class="form-control " name= "fileMerca" id="fileMerca" required>
          </div>
</form>      
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" onclick="closeMerca();">Cerrar</button>
        <button type="button" class="btn btn-outline-primary" onclick="addMerca();">Agregar</button>
      </div>
    </div>
  </div>
</div>



  <script type="text/javascript">
      let itemsTblMercancias = document.getElementById("itemTblMercancias");
      let dataMerca = [];
      let itemMerca = 0;
    
    function addMerca(){
      let merca = [];

      let txtMerca = document.getElementById("txtMerca").value;
      let txtBultos = document.getElementById("txtBultos").value;
      let txtFracc = document.getElementById("txtFracc").value;

      let fichero  = $('#fileMerca')[0].files[0];
      let nombre = fichero.name;

      let datos = new FormData();
      let cveCont =contModal.innerHTML;

      datos.append('mercaPhoto', fichero);
      datos.append('txtNombreArchivo', nombre);
      datos.append('txtMerca', txtMerca);
      datos.append('txtBultos', txtBultos);
      datos.append('txtFracc', txtFracc);
      datos.append('txtCveCont', cveCont);
      

      sendNewMerca(datos);
     

      //cleanInputs();

    }



    function sendNewMerca(data){

        axios.post("<?php echo site_url('addMerca'); ?>" ,data).then(
          function(res){
                if (res.status == 200) {
                  if(res.data){
                    console.log(res.data);
                  }
                  cleanInputs();
                }
          }).catch(function(err){
            alert(err);
            console.log(err);
          });
    }

    


    function newMerca(){
      $('#addMerca').modal('show');
      fillTableMerca(cveRefMerca);

    }

    function cleanInputs(){

      document.getElementById("txtMerca").value = '';
      document.getElementById("txtBultos").value = '';
      document.getElementById("txtFracc").value = '';

    }


    function delMerca(iName){
      alert(iName);
    }


    function finalizar(){
      console.log("DESDE FINALIZAR!->");
      if(confirm("Al momento de finalizar, NO se podrán agregar más mercancías a la referencia.")){
        console.log(dataMerca);
      }else{
        console.log("");
      }

    }
    
    function closeMerca(){
        $("#addMerca").modal('hide');
        $("#modMercancias").modal('show');
      }

    function saveMerca(){
      console.log("DESDE ALMACENAR MERCANCÍAS!->");
      console.log(dataMerca);

    }
  </script>                
  

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>