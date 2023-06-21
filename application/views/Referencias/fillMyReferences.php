

<script type="text/javascript">
	document.getElementById('titulo').value = "Listado de Referencias";
</script>

<style type="text/css">
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
</style>

<div class="bg-light rounded ">
	<div class="d-flex flex-column">

		<div class="d-flex flex-wrap  justify-content-center flex-column">
			
		<script type="text/javascript">

			function fillmyRefs(table){
				let user = <?php echo$_SESSION['user']['userId']; ?>;
				table.innerHTML = "";
				let item = "";

				axios.post("<?php echo site_url('allMyRefs'); ?>" ,user).then(
				function(res){
		          if (res.status == 200) {
		            if(res.data){
		            	let refs = res.data;
		            	console.log(refs)
		            	item = '';
		            	for(var ref of refs){
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
								item += '<button type="button" class="btn btn-outline-primary btn-sm text-center" value="'+ ref.eIdReferencia + '" title="Ver referencia" name="btnEditar'+ ref.eIdReferencia + '" onclick="verRef('+ ref.eIdReferencia + ');">Ver</button>';
								item += '</div>';
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
								
								item += '</div>';
							
								item += '</td>';
								item += '</tr>';
						}
							table.innerHTML =  item;
							console.log(item);

		            }
		          }
		      	}).catch(function(err){
		          alert(err);
		          console.log(err);
		      	});
/*if(ref.bActiva == 1){
	item += '<div>';
	item += '<button type="button" class="btn btn-outline-success btn-noline" value="'+ ref.eIdReferencia + '" title="Desactivar/Activar" id="btnChange'+ ref.eIdReferencia + '" onmouseover="backcolor(this.id,0);" onmouseleave="backcolor(this.id,1);"><i class="fas fa-toggle-on" onclick="changeState('+ ref.eIdReferencia +');"></i></button>';
	item += '</div>';
	item += '</div>';
}else{
	item += '<div>';
	item += '<button type="button" class="btn btn-outline-danger btn-noline" value="'+ ref.eIdReferencia + '" title="Desactivar/Activar" id="btnChange'+ ref.eIdReferencia + '" onmouseover="backcolor2(this.id,0);" onmouseleave="backcolor2(this.id,1);"><i class="fas fa-toggle-off" onclick="changeState('+ ref.eIdReferencia +');"></i></button>';
	item += '</div>';
	item += '</div>';
}*/
		
				
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


		</script>	
			<div class="tab-content p-1 flex-container" id="myTabContent" >
			  
			  
			 
			  
			  



