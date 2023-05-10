
<div class="modal" id="modAddGasto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar nuevo Gasto</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo site_url('newGasto'); ?>" method="POST" id = "frmNewGasto" enctype="multipart/form-data">
          <div class="d-flex flex-wrap justify-content-center flex-container flex-column">
            <div class="d-flex  justify-content-around">
                <div class="p-2 flex-fill" >
                  <div class="input-group input-group-sm ">
                       <div class="input-group-prepend">
                         <span class="input-group-text bg-primary text-white">Concepto: </span>
                      </div>
                      <input type="text" name="txtConcept" id="txtConcept" class="form-control" required>
                    </div>
                </div>
                <div class="p-2">
                  <div class="input-group input-group-sm">
                     <div class="input-group-prepend">
                       <span class="input-group-text bg-primary text-white">Valor ($_MNX): </span>
                    </div>
                    <input type="number" name="flPrice" id="flPrice" class="form-control" min="1.00" step="0.05" required>
                  </div>
                </div>
            </div>
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
                      <input type="file"  name= "dctoPago" id="dctoPago" style="width: 90%; margin-right: 10%;" accept=".xml,.pdf,.xls,.xlsx,.csv" title="Se debe agregar un comprobante de pago">
                  </div>
                  <div class="p-2" >
                    <div class="input-group input-group-sm ">
                         <div class="input-group-prepend">
                           <span class="input-group-text bg-primary text-white">Entidad: </span>
                        </div>
                        <input type="text" class="form-control" name="txtEntidad" id="txtEntidad">
                      </div>
                  </div>
                <div class="p-2" >
                    <div class="input-group input-group-sm ">
                         <div class="input-group-prepend">
                           <span class="input-group-text bg-primary text-white">Fecha de Pago: </span>
                        </div>
                        <input type="date" class="form-control" name="fePago" id="fePago">
                    </div>
                  </div>
                </div>
                
            <input type="hidden" name="eIdCuentaGastos" value="<?php echo $cuentaGastos['eIdCuentaGasto'];?>">
            <input type="hidden" name="cveCuentaGastos" value="<?php echo $cuentaGastos['cveCtaGasto'];?>">
            <input type="hidden" name="cveReferencia" value="<?php echo $referencia['cveReferencia'];?> ">
            <input type="hidden" name="eIdReferencia" value="<?php echo $referencia['eIdReferencia'];?> ">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="p-2 ml-3">
                        <button type="button" class="btn btn-outline-success" onclick="addGasto();">Guardar</button>
                    </div>
                  </div>  
              
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
  let frmNewGasto = document.getElementById('frmNewGasto');
  function addGasto(){
    frmNewGasto.submit();
    
  }
</script>

