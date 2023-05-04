
<div class="modal" id="modAddDocument">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar Documento</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
          <div class="d-flex flex-wrap justify-content-center flex-container flex-column">

           <div class="p-2" id="itemsGastos"> 
            <form action="<?php echo site_url('addDctoGasto'); ?>" method="POST" id = "frmDctoGasto" enctype="multipart/form-data">
                <input type="hidden" name="eIdGasto" id="eIdGasto">
                <div class="d-flex flex-wrap justify-content-start">
                  <div class="p-2">
                    <h6 >Datos de Pago <hr></h6>
                  </div>
                </div> 
                <div class="d-flex flex-wrap justify-content-end">
                  <div class="p-2" >
                      <div class="input-group input-group-sm ">
                           <div class="input-group-prepend">
                             <span class="input-group-text bg-primary text-white">N° Folio Factura: </span>
                          </div>
                          <input type="text" class="form-control" name="txtNumFactura" id="txtNumFactura">
                        </div>
                    </div>
                      <div class=" p-2 flex-fill" >
                          <input type="file"  name= "dctoPago" id="dctoPago" style="width: 90%; margin-right: 10%;" accept=".xml,.pdf,.xls,.xlsx,.csv" title="Se debe agregar un comprobante de pago" required>
                      </div>
                      <div class="p-2" >
                        <div class="input-group input-group-sm ">
                             <div class="input-group-prepend">
                               <span class="input-group-text bg-primary text-white">Entidad: </span>
                            </div>
                            <input type="text" class="form-control" name="txtEntidad" id="txtEntidad" required>
                          </div>
                      </div>
                    <div class="p-2" >
                        <div class="input-group input-group-sm ">
                             <div class="input-group-prepend">
                               <span class="input-group-text bg-primary text-white">Fecha de Pago: </span>
                            </div>
                            <input type="date" class="form-control" name="fePago" id="fePago" required>
                        </div>
                      </div>
                    </div>
                <div class="d-flex flex-wrap justify-content-center">
                  <button type="button" class="btn btn-outline-success btn-lg" onclick="saveGasto();"><span class="fa fa-save"></span> </button>
                </div>
                <input type="hidden" name="eIdCuentaGastos" value="<?php echo $cuentaGastos['eIdCuentaGasto'];?>">
            <input type="hidden" name="cveCuentaGastos" value="<?php echo $cuentaGastos['cveCtaGasto'];?>">
            <input type="hidden" name="cveReferencia" value="<?php echo $referencia['cveReferencia'];?> ">
            <input type="hidden" name="eIdReferencia" value="<?php echo $referencia['eIdReferencia'];?> ">
              </form>

           </div>

           <div class="p-2" id="itemsDepositos">
            <form action="<?php echo site_url('addDctoDeposito'); ?>" method="POST" id = "frmDctoDeposito" enctype="multipart/form-data">
                <input type="hidden" name="eIdDeposito" id="eIdDeposito">

             <div class="d-flex flex-wrap justify-content-start">
               <div class="p-2">
                 <h6 >Datos de Depósito <hr></h6>
               </div>
             </div> 
             <div class="d-flex flex-wrap justify-content-end">
               <div class="p-2" >
                   <div class="input-group input-group-sm ">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-primary text-white">N° Referencia Banco: </span>
                       </div>
                       <input type="text" class="form-control" name="txtRefBanco" id="txtRefBanco">
                     </div>
                 </div>
                   <div class=" p-2 flex-fill" >
                       <input type="file"  name= "dctoDep" id="dctoDep" style="width: 90%; margin-right: 10%;" accept=".xml,.pdf,.xls,.xlsx,.csv" title="Se debe agregar un comprobante de pago" required>
                   </div>
                 
                 
                 </div>
                 <div class="d-flex flex-wrap justify-content-center">
                  <button type="button" class="btn btn-outline-success btn-lg" onclick="saveDeposito();"><span class="fa fa-save"></span> </button>
                </div>
                <input type="hidden" name="eIdCuentaGastos" value="<?php echo $cuentaGastos['eIdCuentaGasto'];?>">
            <input type="hidden" name="cveCuentaGastos" value="<?php echo $cuentaGastos['cveCtaGasto'];?>">
            <input type="hidden" name="cveReferencia" value="<?php echo $referencia['cveReferencia'];?> ">
            <input type="hidden" name="eIdReferencia" value="<?php echo $referencia['eIdReferencia'];?> ">
              </form>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
  let eIdGasto  = document.getElementById("eIdGasto");
  let eIdDeposito = document.getElementById("eIdDeposito");
  let itemsGastos = document.getElementById("itemsGastos");
  let itemsDepositos = document.getElementById("itemsDepositos");
  let frmDctoGasto = document.getElementById("frmDctoGasto");
  let frmDctoDeposito = document.getElementById("frmDctoDeposito");
  itemsGastos.style.display ='none';
  itemsDepositos.style.display ='none';
  function addDocument(cta,tipo){
    if(tipo == 0){
      itemsGastos.style.display ='none';
      itemsDepositos.style.display ='flex';
      eIdDeposito.value = cta;
    }if(tipo == 1){
      itemsGastos.style.display ='flex';
      itemsDepositos.style.display ='none';
      eIdGasto.value = cta;
    }

     $("#modAddDocument").modal('show');

  }
  function saveGasto(){
    frmDctoGasto.submit();
  }
  function saveDeposito(){
    frmDctoDeposito.submit();
  }


</script>

