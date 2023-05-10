
<div class="modal" id="modAddDeposito">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar nuevo Deposito</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo site_url('newDeposito'); ?>" method="POST" id = "frmNewDeposito" enctype="multipart/form-data">
          <div class="d-flex flex-wrap justify-content-center flex-container flex-column">
            <div class="d-flex  justify-content-around">
                <div class="p-2 flex-fill" >
                  <div class="input-group input-group-sm ">
                       <div class="input-group-prepend">
                         <span class="input-group-text bg-primary text-white">Tipo: </span>
                      </div>
                      <input type="text" name="txtDConcept" id="txtDConcept" class="form-control" required list="listTypes"><datalist id="listTypes">
                        <option value="Anticipo"></option>
                        <option value="Garantía"></option>
                        <option value="Depósito"></option>
                      </datalist>
                    </div>
                </div>
                <div class="p-2">
                  <div class="input-group input-group-sm">
                     <div class="input-group-prepend">
                       <span class="input-group-text bg-primary text-white">Cantidad: </span>
                    </div>
                    <input type="number" name="flDCantidad" id="flDCantidad" class="form-control" min="1.00" step="0.05" required value="1.00">
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

            <div class="d-flex  justify-content-around">
                <div class="p-2 flex-fill" >
                  <div class="input-group input-group-sm ">
                       <div class="input-group-prepend">
                         <span class="input-group-text bg-primary text-white">Moneda: </span>
                      </div>
                      <input type="text" name="txtMoneda" id="txtMoneda" class="form-control" required list="listMonedas" value="MXN"><datalist id="listMonedas">
                        <option value="USD">Dólar estadounidense (US$)</option>
                        <option value="EUR">Euro (€)</option>
                        <option value="JPY">Yen japonés (¥)</option>
                        <option value="GBP">Libra esterlina (£)</option>
                        <option value="AUD">Dólar australiano (C$)</option>
                        <option value="CAD">Dólar canadiense (C$)</option>
                        <option value="MXN">Peso mexicano ($)</option>
                        <option value="CLP">Peso chileno (CLP$)</option>
                      </datalist>
                    </div>
                </div>
                <div class="p-2">
                  <div class="input-group input-group-sm">
                     <div class="input-group-prepend">
                       <span class="input-group-text bg-primary text-white">Valor de Cambio: </span>
                    </div>
                    <input type="number" name="flValorCambio" id="flValorCambio"  class="form-control" min="0" step="0.01" required value="1.00">
                    <div class="input-group-prepend">
                       <span class="input-group-text bg-primary text-white"><a class="text-white" href="#" onclick="calcular();">-></a> </span>
                    </div>
                  </div>
                </div>
                <div class="p-2">
                  <div class="input-group input-group-sm">
                     <div class="input-group-prepend">
                       <span class="input-group-text bg-primary text-white">Total: </span>
                    </div>
                    <input type="number" name="flDTotal" id="flDTotal" class="form-control" required >
                     
                  </div>
                </div>

            </div>

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
                      <input type="file"  name= "dctoDep" id="dctoDep" style="width: 90%; margin-right: 10%;" accept=".xml,.pdf,.xls,.xlsx,.csv" title="Se debe agregar un comprobante de pago">
                  </div>
                  <div class="p-2" >
                    
                  </div>
                
                </div>
                
            <input type="hidden" name="eIdCuentaGasto" value="<?php echo $cuentaGastos['eIdCuentaGasto'];?>">
            <input type="hidden" name="cveCuentaGasto" value="<?php echo $cuentaGastos['cveCtaGasto'];?>">
            <input type="hidden" name="eIdReferencia" value="<?php echo $referencia['eIdReferencia'];?> ">
            <input type="hidden" name="cveReferencia" value="<?php echo $referencia['cveReferencia'];?> ">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="p-2 ml-3">
                        <button type="button" class="btn btn-outline-success" onclick="addDeposito();">Guardar</button>
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
  let frmNewDeposito = document.getElementById('frmNewDeposito');
  let flDTotal = document.getElementById('flDTotal');
  let flValorCambio = document.getElementById('flValorCambio');
  let flDCantidad = document.getElementById('flDCantidad');
  function addDeposito(){
    frmNewDeposito.submit();
  }

 function calcular(){
  var base = flValorCambio.value;
  var cambio =flDCantidad.value;
  let res = 0;
  res =  (parseFloat(cambio) * parseFloat(base)).toFixed(2);
  flDTotal.value = res
 }

</script>

