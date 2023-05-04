  <!-- The Modal -->
  <div class="modal fade" id="addUser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nuevo Usuario</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
      <!--<form action="<?php //echo site_url('addUser'); ?>" method="POST" id="frmAddUser">-->
      	<form  id="frmAddUser">
      		<div class="d-flex flex-wrap flex-column justify-content-center">
      			
      			<div class="d-flex flex-wrap justify-content-around align-items-center align-content-center ">
      				
      				<div class="p-2">
      					<label for="txtNickName">Usuario:</label>
      					<input type="text" class="form-control" name="txtNickName" id="txtNickName" placeholder="Nickname" required>
      				</div>

      				<div class="p-2 flex-fill">
      					<label for="fk_eUserType">Tipo de Usuario:</label>

      					<select class="form-control" id="fk_eUserType" name="fk_eUserType" required>
      						<option value="0">Seleccione una opción</option>
      					<?php 
      						foreach ($userTypes as $type) {
      					?>

      					<option value="<?php echo $type['userId']; ?>" title="<?php echo $type['Descripcion']; ?>"><?php echo  $type['UserType'];   ?></option>

      					<?php		
      						}
      					 ?>

      					</select>

      				</div>
      				<div class="p-2">
      					<label for="txtcveUser">Clave Usuario:</label>
      					<input type="text" class="form-control" name="txtcveUser" id="txtcveUser" placeholder="#_Empleado" required>
      				</div>


      			</div>
      			<div class="d-flex flex-wrap justify-content-around align-items-center align-content-center ">

      				<div class="p-2 flex-fill">
      					<label for="txtName">Nombre(s):</label>
      					<input type="text" class="form-control" name="txtName" id="txtName" placeholder="Nombre(s)" required>
      				</div>

      				<div class="p-2 flex-fill">
      					<label for="txtLastName">Apellidos:</label>
      					<input type="text" class="form-control" name="txtLastName" id="txtLastName" placeholder="Apellido(s)" required>
      				</div>



      			</div>

      		</div>
      

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" onclick="addUser();" >Agregar</button>
        </form>	
          <button type="button" class="btn btn-outline-danger" onclick="clearForm();">Cancelar</button>
        </div>	
        
      </div>
    </div>
  </div>
  
</div>


<script type="text/javascript">

	const frmNewUser = document.getElementById('frmAddUser');

	const txtNickName = document.getElementById('txtNickName');
	const fk_eUserType = document.getElementById('fk_eUserType');
	const txtUserFName = document.getElementById('txtName');
	const txtUserLName = document.getElementById('txtLastName');
	const txtcveUser = document.getElementById('txtcveUser');


	function addUser(){
		$("#addUser").modal('show');
		newUser();
	}

	function clearForm(){
		frmNewUser.reset();
		$("#addUser").modal('hide');

	}

	let objUser = {};
	function newUser(){
		if (txtNickName.value != '' &&  txtUserFName.value != '' && txtUserLName.value != '' && fk_eUserType.value != '0') {
			objUser = {
				"txtNickName" : txtNickName.value,
				"txtUserFName" : txtUserFName.value,
				"txtUserLName" : txtUserLName.value,
				"fk_eUserType" : fk_eUserType.value,
				"txtCveEmpleado" :txtcveUser.value
			};
			postUser();
		}
		else{
			alert("Favor de completar Todos los campos")
		}


	}

	function postUser(){
		axios.post('<?php echo site_url('addUser') ?>', objUser)
	        .then(function (response) {
	          console.log(response.data);
	          window.location.reload();
	        })
	        .catch(function (error) {
	          console.log(error);
	        });
	}

</script>
