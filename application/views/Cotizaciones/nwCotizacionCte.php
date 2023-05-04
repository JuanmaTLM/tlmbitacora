nwCotizacionCte.php<style type="text/css">
	input[type=text] {
	 	border: none;
	  	border-bottom: 1px solid darkblue;
	}
	select{
	 	border: none !important;
	  	border-bottom: 1px solid darkblue !important;
	}
</style>


<div class="d-flex flex-wrap flex-column justify-content-center border border-black rounded mb-2">
	<div class="p-1 d-flex flex-wrap justify-content-between bg-light">
		<div class="">
			<a href="<?php echo site_url('cotizaciones'); ?>" class="btn btn-outline-warning btn-md "><< Regresar</a>
		</div>
		<div class="">
			<button class="btn btn-outline-primary btn-md ">Solicitar Cotización</button>
		</div>
	</div>
	<br>
	<div class=" d-flex flex-wrap justify-content-center rounded ">
		<div class="">
			<h3>Cotización de Servicio de Transporte<hr></h3>
		</div>
	</div>

	<div class="d-flex flex-wrap justify-content-center">
		<ul class="nav nav-tabs" role="tablist">
		    <li class="nav-item">
		      <a class="nav-link active" data-toggle="tab" href="#origenDestino">Origen/Destino</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" data-toggle="tab" href="#Contenedor">Contenedor</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" data-toggle="tab" href="#Transporte">Transporte</a>
		    </li>
		  </ul>

	</div>

	<div class="tab-content container p-1 d-flex flex-wrap flex-column justify-content-center  bg-light rounded border border-top-0 border-left-0 border-success">
		<div class="tab-pane active" id="origenDestino">
		
			<div class=" ml-3 d-flex flex-wrap justify-content-center " >
				<div class="p-1 form-group flex-fill">
					<label for="txtTipoTransporte">Tipo Transporte:</label>
					<select type="text" class="form-control"  name="txtTipoTransporte" id="txtTipoTransporte" >
				     	<option value="0">Seleccionar opción</option>
				     	<option value="AER">Aéreo</option>
				     	<option value="FRV">Ferroviario</option>
				     	<option value="MAR">Marítimo</option>
				     	<option value="TER">Terrestre</option>
				     </select>
			    </div>
				<div class="p-1 form-group flex-fill">
					  <label for="txtOrigen">Origen:</label>
					  <input type="text" class="form-control"  name="txtOrigen" id="txtOrigen" list="origenList">
					
				</div>	
				<div class="p-1 form-group flex-fill">
					  <label for="txtDestino">Destino:</label>
					  <input type="text" class="form-control"  name="txtDestino" id="txtDestino" list="origenList">
				</div>	
				<div class="p-1 form-group ">
					<label for="txtDistancia">Distancia:</label>
					<input type="text" class="form-control" name="txtDistancia" id="txtDistancia" disabled>
				</div>
				<datalist id="origenList">
			     	<option value="MZO">Manzanillo</option>
			     	<option value="COL">Colima</option>
			     	<option value="VCZ">Veracruz</option>
			     	<option value="CMX">Cd. de México</option>
			     	<option value="ALT">Altamira</option>
			     	<option value="GDL">Guadalajara</option>
			    </datalist>
			</div>
		</div>
		<div class="tab-pane fade" id="Contenedor">
			<div  class="ml-3 d-flex flex-sm-wrap justify-content-start ">
				<div class="p-1 form-group flex-fill">
					  <label for="txtMercancia">Mercancía:</label>
					  <input type="text" class="form-control" name="txtMercancia" id="txtMercancia">
					
				</div>	
				<div class="p-1" style="margin-right : 50%"></div>
			</div>
			<div  class="ml-3 d-flex flex-sm-wrap justify-content-center">

				<div class="p-1 bg-light   flex-fill">
					<div class="form-group">
					  <label for="txtConcepto">Concepto:</label>
					  <input type="text" class="form-control"  name="txtConcepto" id="txtConcepto">
					</div>
				</div>
				<div class="p-1">
					<div class="form-group  ">
					  <label for="txtTipo">Tipo:</label>
					  <input type="text" class="form-control" name="txtTipo" id="txtTipo">
					</div>
				</div>

				<div class="p-1">
					<div class="form-group  ">
					  <label for="txtTamaño">Tamaño:</label>
					  <input type="text" class="form-control" name="txtTamaño" id="txtTamaño">
					</div>
				</div>
			</div>
			<div  class="ml-3 d-flex flex-nowrap justify-content-around">

				<div class="p-1">
					<div class="form-group  ">
					  <label for="txtPeso">Peso:</label>
					  <input type="text" class="form-control" name="txtPeso" id="txtPeso">
					</div>
				</div>
				<div class="p-1">
					<div class="form-group">
					  <label for="txtMedida">Medida:</label>
					  <input type="text" class="form-control" name="txtMedida" id="txtMedida">
					</div>
				</div>
				<div class="p-1">
					<div class="form-group ">
					  <label for="txtBultos">Bultos:</label>
					  <input type="text" class="form-control" name="txtBultos" id="txtBultos">
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="Transporte">
		
			<div class="ml-3 d-flex flex-wrap justify-content-start">
				<div class="p-1 form-group flex-fill">
				  <label for="txtMedida">Proveedor del Servicio:</label>
				  <select type="text" class="form-control" name="txtTransporte" id="txtTransporte">
				  
				  	<option value="Navarro">Navarro</option>
				  	<option value="Aguilera Express">Aguilera Express</option>
				  	<option value="RCTrucking">RCTrucking</option>
				  	<option value="Grupo Uttsa">Grupo Uttsa</option>
				  	<option value="Bayardo">Bayardo</option>
				  </select>
				</div>
				<div class="p-1" style="margin-right: 50%;"></div>

			</div>
			<div class="d-flex flex-wrap  justify-content-center">
				<div class="p-1 form-group ">
					<label for="txtPrecio">Precio del Flete:</label>
					<input type="text" name="txtPrecio" id="txtPrecio" disabled>
				</div>
			</div>
			<div class="d-flex flex-wrap  justify-content-center">
				<div class="p-1 form-group ">
					<label for="txtPagoOperador">Pago del Operador:</label>
					<input type="text" name="txtPagoOperador" id="txtPagoOperador" disabled title="El pago del operador puede variar">
				</div>
			</div>
			
			<div class="d-flex flex-wrap  justify-content-center">
				<div class="p-1 form-group ">
					<label for="txtTotal">Total:</label>
					<input type="text" name="txtTotal" id="txtTotal" disabled title="Total del servicio de Transporte">
				</div>
			</div>
		</div>
			<!--<div class="p-1 form-group flex-fill">
				<div class="d-flex flex-wrap  justify-content-center">
					<div class="p-1 form-group ">
						<label for="txtGastosOp">Gastos Operativos:</label>
						<input type="text" name="txtGastosOp" id="txtGastosOp" disabled>
					</div>
				</div>
				<label for="txtOperador">Nombre del Operador:</label>
				<input type="text" class="form-control" name="txtOperador" id="txtOperador">
			</div>
			<div class="p-1 form-group ">
				<label for="txtPlacas">Placas:</label>
				<input type="text" class="form-control" name="txtPlacas" id="txtPlacas">
			</div>
			<div class="p-1 form-group ">
				<label for="txtCAAT">CAAT:</label>
				<input type="text" class="form-control" name="txtCAAT" id="txtCAAT">
			</div>
		</div>-->
	</div>


</div>