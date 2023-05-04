<!-- The Modal -->
<div class="modal fade" id="modMercancias">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Listado de Mercancías de Contenedor  <strong id="contModal"></strong></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body flex-container">
          <div class="d-flex flex-wrap justify-content-around flex-container">
            <div class="p-2 text-center flex-fill">
              <label>#Pedimento: <strong id="cnttxtPedimento_"></strong></label>
            </div>
            <div class="p-2 text-center flex-fill">
              <label>Tamaño: <strong id="cnttxtTam_"></strong></label>
            </div>
            <div class="p-2 text-center flex-fill">
              <label>Tipo: <strong id="cnttxtTipo_"></strong></label>
            </div>
          </div>
          <div class="d-flex flex-wrap justify-content-end" >
              <div class="p-2">
                <button class="btn btn-outline-primary btn-sm" id="btnAddMerca" onclick="addMercancia();"><span class="fa fa-plus" style="font-size:15px;"> </span> Agregar Mercancías</button>
              </div>
          </div>
          <hr>
          <div class="d-flex flex-wrap justify-content-center flex-column" id="mercaCards">
            
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
  let contModal = document.getElementById('contModal');


  function viewMerca(id){

    let cnttxtPedimento = document.getElementById('cnttxtPedimento_');
    let cnttxtTam = document.getElementById('cnttxtTam_');
    let cnttxtTipo = document.getElementById('cnttxtTipo_');
    let addMer =document.getElementById('btnAddMerca');
    
    

    let container = {};
    container.eIdContainer = id;
    axios.post("<?php echo site_url('findContainerMerca'); ?>" ,container).then(
      function(res){
            if (res.status == 200) {
              if(res.data){
                let data = res.data;
                let cont = data.containerData;
                let sta = cont.bAbierto;

                if(sta == 0){
                  addMer.style.display ='none';
                }

                contModal.innerHTML = cont.txtContenedor;
                cnttxtPedimento.innerHTML = cont.txtPedimento;
                cnttxtTam.innerHTML = cont.txtTamaño;
                cnttxtTipo.innerHTML = cont.txtTipo;
                if(data.allMercancias){
                  fillCardsMercancias(data.allMercancias);
                }else{
                  alert("Generar Mercancías para este Contenedor");
                }
              }
            }
      }).catch(function(err){
        alert(err);
        console.log(err);
      });
    $('#modMercancias').modal('show');

  }

  function fillCardsMercancias(data){


    let mercaCards = document.getElementById('mercaCards');
    let itemMerca ="";
    let num = 0;
    for(var merca of data){ 
      num++;
      let urlFile = "<?php echo base_url() ?>" + merca.txtUrlPhoto; 
      itemMerca =""
      itemMerca += '<div class="d-flex align-items-center flex-wrap justify-content-center align-content-center ">';
      itemMerca += '<div class="p-2  " style="width:10%;height:60px;">';
      itemMerca += '<img class="rounded" src="'+urlFile+'" id="imgMerca_'+ num +'" name="imgMerca_'+ num +'"style="width:50px; height: 50px"> ';
      itemMerca += '</div>';
      itemMerca += '<div class="p-2  " style="width:87%;height:60px;">';
      itemMerca += '<div class="d-flex flex-wrap justify-content-around flex-fill">';
      itemMerca += '<div class="flex-fill">';
      itemMerca += '<label class="" style="font-size:11px;">Mercancía: <br> <strong id="cntMerca_'+ num +'">'+ merca.txtMercancia +'</strong></label>';
      itemMerca += '</div>';
      itemMerca += '<div class="flex-fill">';
      itemMerca += '<label class="" style="font-size:11px;">Bultos: <br> <strong id="cntBulto_'+ num +'">'+ merca.txtBultos +'</strong></label>';
      itemMerca += '</div>';
      itemMerca += '<div class="flex-fill">';
      itemMerca += '<label class="" style="font-size:11px;">Fracción Arancelaria: <br> <strongid="cntFracc_'+ num +'">'+ merca.txtFraccion +'</strong></label>';
      itemMerca += '</div>';
      itemMerca += '</div>';
      itemMerca += '</div> ';
      
      mercaCards.innerHTML+=itemMerca;
    }
    

    }

  function addMercancia(){
    $('#addMerca').modal('show');
    $('#modMercancias').modal('hide');
  }
</script>