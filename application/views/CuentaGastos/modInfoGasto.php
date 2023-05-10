
<style type="text/css">
	.izq{
		width: 30%;
	}
	.der{
		width: 70%;
	}
	.text-blue{
		font-size: 11px !important;
		background-color: white !important;
		color: darkblue;
		border: none !important;
	}
	input.txt{
		background-color: white !important;
		border: none !important;
		font-size: 10px !important;
		text-decoration-line: underline !important;

	}
</style>

<div class="modal" id="viewConcept">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"id="cveCtaGasto"></h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<div class="d-flex flex-wrap justify-content-center  flex-column">
      		<div id="vwDeposito">
      			<div class="d-flex flex-wrap justify-content-center">
      				<div class="p-2  align-self-start rounded izq">
      					<div class="d-flex flex-column">
      						<div class="">
      							<h3 class="text-center">DATOS GENERALES <hr></h3>
      						</div>
      					</div>
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">#Referencia TLM:</span>
      						    </div>
      						    <input id="doc_cveReferencia" name="doc_cveReferenciaDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">#Referencia Banco:</span>
      						    </div>
      						    <input id="doc_cveReferenciaBanco" name="doc_cveReferenciaBancoDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">Fecha Deposito:</span>
      						    </div>
      						    <input id="doc_feDeposito" name="doc_feDepositoDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">Cantidad:</span>
      						    </div>
      						    <input id="doc_flCantidad" name="doc_flCantidadDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">Moneda:</span>
      						    </div>
      						    <input id="doc_txtMoneda" name="doc_txtMonedaDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">Valor Cambio:</span>
      						    </div>
      						    <input id="doc_flValorCambio" name="doc_flValorCambioDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">Total:</span>
      						    </div>
      						    <input id="doc_flTotal" name="doc_flTotalDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">Creador:</span>
      						    </div>
      						    <input id="doc_txtAuthor" name="doc_txtAuthorDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					<div class="d-flex flex-wrap justify-content-center">
      						<div class="input-group mb-3 input-group-sm">
      						     <div class="input-group-prepend">
      						       <span class="input-group-text txtData bg-light text-blue">Concepto:</span>
      						    </div>
      						    <input id="doc_txtConcepto" name="doc_txtConceptoDep" type="text" class="form-control txt" disabled>
      						  </div>
      					</div>	
      					
      					

      				</div>
      				<div class="p-2 border rounded der flex-fill">
  						<div class="d-flex flex-wrap justify-content-center">
  							<div class="flex-fill rounded">
  								<embed id="doc_txtFDepUrl" name="doc_txtFDepUrlDep" type="application/pdf" width="100%" src="/tlmBitacora/assets/DCTOSREFERENCIAS/TMLB23-21/TMLCG23-21/Anticipos/deposito_2023-04-23.pdf" height="600px" />
  							</div>
  						</div>
      				</div>
      			</div>
      		</div>
      		<div id="vwGasto">
    			<div class="d-flex flex-wrap justify-content-center">
    				<div class="p-2  align-self-start rounded izq">
    					<div class="d-flex flex-column">
    						<div class="">
    							<h3 class="text-center">DATOS GENERALES <hr></h3>
    						</div>
    					</div>
    					<div class="d-flex flex-wrap justify-content-center">
    						<div class="input-group mb-3 input-group-sm">
    						     <div class="input-group-prepend">
    						       <span class="input-group-text txtData bg-light text-blue">Cuenta de Gasto:</span>
    						    </div>
    						    <input id="gas_cveCtaGasto" name="gas_cveCtaGasto" type="text" class="form-control txt" disabled>
    						  </div>
    					</div>	
    					<div class="d-flex flex-wrap justify-content-center">
    						<div class="input-group mb-3 input-group-sm">
    						     <div class="input-group-prepend">
    						       <span class="input-group-text txtData bg-light text-blue">#Referencia:</span>
    						    </div>
    						    <input id="gas_cveReferencia" name="gas_cveReferencia" type="text" class="form-control txt" disabled>
    						  </div>
    					</div>	
    					<div class="d-flex flex-wrap justify-content-center">
    						<div class="input-group mb-3 input-group-sm">
    						     <div class="input-group-prepend">
    						       <span class="input-group-text txtData bg-light text-blue">Fecha de Pago:</span>
    						    </div>
    						    <input id="gas_fePago" name="gas_fePago" type="text" class="form-control txt" disabled>
    						  </div>
    					</div>	
    					<div class="d-flex flex-wrap justify-content-center">
    						<div class="input-group mb-3 input-group-sm">
    						     <div class="input-group-prepend">
    						       <span class="input-group-text txtData bg-light text-blue">Concepto:</span>
    						    </div>
    						    <input id="gas_txtGasto" name="gas_txtGasto" type="text" class="form-control txt" disabled>
    						  </div>
    					</div>	
    					<div class="d-flex flex-wrap justify-content-center">
    						<div class="input-group mb-3 input-group-sm">
    						     <div class="input-group-prepend">
    						       <span class="input-group-text txtData bg-light text-blue">Costo:</span>
    						    </div>
    						    <input id="gas_txtValor" name="gas_txtValor" type="text" class="form-control txt" disabled>
    						  </div>
    					</div>	

    				</div>
    				<div class="p-2 border rounded der flex-fill">
						<div class="d-flex flex-wrap justify-content-center">
							<div class="flex-fill rounded">
								<embed id="gas_txtFileUrl" name="gas_txtFileUrl" type="application/pdf" width="100%" src="/tlmBitacora/assets/DCTOSREFERENCIAS/TMLB23-21/TMLCG23-21/Anticipos/deposito_2023-04-23.pdf" height="600px" />
							</div>
						</div>
    				</div>
    			</div>
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
	let vwDeposito = document.getElementById('vwDeposito');
	let vwGasto = document.getElementById('vwGasto');

	let doc_cveReferencia = document.getElementById('doc_cveReferencia');
	let doc_cveReferenciaBanco = document.getElementById('doc_cveReferenciaBanco');
	let doc_feDeposito = document.getElementById('doc_feDeposito');
	let doc_flCantidad = document.getElementById('doc_flCantidad');
	let doc_flValorCambio = document.getElementById('doc_flValorCambio');
	let doc_flTotal = document.getElementById('doc_flTotal');
	let doc_txtAuthor = document.getElementById('doc_txtAuthor');
	let doc_txtConcepto = document.getElementById('doc_txtConcepto');
	let doc_txtMoneda = document.getElementById('doc_txtMoneda');
	let doc_txtFDepUrl = document.getElementById('doc_txtFDepUrl');

	let gas_cveCtaGasto = document.getElementById('gas_cveCtaGasto');
	let gas_cveReferencia = document.getElementById('gas_cveReferencia');
	let gas_fePago = document.getElementById('gas_fePago');
	let gas_txtGasto = document.getElementById('gas_txtGasto');
	let gas_txtValor = document.getElementById('gas_txtValor');
	let gas_txtFileUrl = document.getElementById('gas_txtFileUrl');

	vwDeposito.style.display = 'none';
	vwGasto.style.display = 'none';
	function info(id,tipo){
		let all = null;
		let src ='blanc';
		let newsrc = 'blanc';
		if(tipo == 0){
			all = <?php print_r(json_encode($listaDepositos)); ?>;
			vwDeposito.style.display = 'block';
			vwGasto.style.display = 'none';
			for(var dep of all){
				if(dep.eIdDeposito == id){
					doc_cveReferencia.value = dep.cveReferencia;
					doc_cveReferenciaBanco.value = dep.cveReferenciaBanco;
					doc_feDeposito.value = dep.feDeposito;
					doc_flCantidad.value = dep.flCantidad;
					doc_flValorCambio.value = dep.flValorCambio;
					doc_flTotal.value = dep.flTotal;
					doc_txtAuthor.value = dep.txtAuthor;
					doc_txtConcepto.value = dep.txtConcepto;
					doc_txtMoneda.value = dep.txtMoneda;
					if(dep.txtFDepUrl != ''){
						src = dep.txtFDepUrl;
						newsrc = src.substring(14);
						doc_txtFDepUrl.src =newsrc;
					}
					
					$("#viewConcept").modal('show');

					break;
				}
			}
		}
		if(tipo == 1){
			all = <?php print_r(json_encode($listaGastos)); ?>;
			vwDeposito.style.display = 'none';
			vwGasto.style.display = 'block';
			for(var gas of all){
				
				if(gas.eIdCuentaGasto == id){
					gas_cveCtaGasto.value = gas.cveCtaGasto;
					gas_cveReferencia.value = gas.cveReferencia;
					gas_fePago.value = gas.fePago;
					gas_txtGasto.value = gas.txtGasto;
					gas_txtValor.value = gas.txtValor;
					if(dep.txtFDepUrl != ''){
						src = gas.txtFileUrl;
						newsrc = src.substring(14);
						gas_txtFileUrl.src = src;
					}
					

					break;


				}
			}

		}
		$("#viewConcept").modal('show');
	}
</script>


