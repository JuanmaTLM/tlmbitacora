  <!-- The Modal -->
  <div class="modal fade" id="addUser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="txtTitle">Nuevo Usuario</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" id="userId">
          <input type="hidden" id="personId">
      	<form  id="frmAddUser">
      		<div class="d-flex flex-wrap flex-column justify-content-center">
      			
      			<div class="d-flex flex-wrap justify-content-around align-items-center align-content-center ">
      				
      				<div class="p-2">
      					<label for="txtNickName">Número de Trabajador:</label>
      					<input type="text" class="form-control" name="txtNickName" id="txtNickName" required>
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
      				


      			</div>
      			<div class="d-flex flex-wrap justify-content-around align-items-center align-content-center ">

      				<div class="p-2 flex-fill">
      					<label for="txtName">Nombre(s):</label>
      					<input type="text" class="form-control" name="txtName" id="txtName"  required>
      				</div>

      				<div class="p-2 flex-fill">
      					<label for="txtLastName">Apellidos:</label>
      					<input type="text" class="form-control" name="txtLastName" id="txtLastName" required>
      				</div>



      			</div>

      			<div class="d-flex flex-wrap justify-content-around align-items-center align-content-center ">

      				<div class="p-2 flex-fill">
      					<label for="txtPhone">Teléfono Contacto:</label>
      					<input type="text" class="form-control" name="txtPhone" id="txtPhone" required>
      				</div>

      				<div class="p-2 flex-fill">
      					<label for="txtEmail">E-mail TLM:</label>
      					<input type="text" class="form-control" name="txtEmail" id="txtEmail" required>
      				</div>



      			</div>

      		</div>
      

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" onclick="newUser();" id = "btnAddU">Agregar</button>
        </form>	
          <button type="button" class="btn btn-outline-primary" onclick="editUser();" id="btnEditU">Editar</button>
          <button type="button" class="btn btn-outline-warning" onclick="saveUser();" id="btnSaveC">Guardar</button>
          <button type="button" class="btn btn-outline-danger" onclick="clearForm();">Cancelar</button>
        </div>	
        
      </div>
    </div>
  </div>
  
</div>


<script type="text/javascript">

	const	btnAddU = document.getElementById('btnAddU');
	const	btnEditU = document.getElementById('btnEditU');
	const	btnSaveC = document.getElementById('btnSaveC');


	const frmNewUser = document.getElementById('frmAddUser');

	const title = document.getElementById('txtTitle');

	const userId = document.getElementById('userId');
	const personId = document.getElementById('personId');
	const txtNickName = document.getElementById('txtNickName');
	const fk_eUserType = document.getElementById('fk_eUserType');
	const txtUserFName = document.getElementById('txtName');
	const txtUserLName = document.getElementById('txtLastName');
	const txtPhone = document.getElementById('txtPhone');
	const txtEmail = document.getElementById('txtEmail');

	btnAddU.style.display = "none";
	btnEditU.style.display ="flex";
	btnSaveC.style.display = "none";

	function getInfo(id){
		btnAddU.style.display = "none";
		btnEditU.style.display ="flex";
		btnSaveC.style.display = "none";
		let data = {};
		data.userId = id;
		axios.post('<?php echo site_url('getUserData') ?>', data)
    .then(function (res) {
      let info = res.data;
      if(!info){
      	alert("NO existe información del usuario...");
      }else{
      	console.log(info);
      	txtTitle.innerHTML = "Datos Usuario:<strong> "+ info.NombreCompleto +"</strong>";

				txtNickName.disabled = true;
				fk_eUserType.disabled = true;
				txtUserFName.disabled = true;
				txtUserLName.disabled = true;
				txtPhone.disabled = true;
				txtEmail.disabled = true;

      	userId.value = info.userID;
      	personId.value = info.eIdPersona;
				txtNickName.value = info.CveEmpleado;
				fk_eUserType.value = info.usrType;
				txtUserFName.value = info.Nombre;
				txtUserLName.value = info.Apellidos;
				txtPhone.value = info.txtTelefono
				txtEmail.value = info.txtEmail
      	
      	$("#addUser").modal('show');
      }
      
    })
    .catch(function (error) {
      console.log(error);
    });
	}


	function addUser(){
		btnAddU.style.display = "flex";
		btnEditU.style.display ="none";
		btnSaveC.style.display = "none";

		txtNickName.disabled = false;
		fk_eUserType.disabled = false;
		txtUserFName.disabled = false;
		txtUserLName.disabled = false;
		txtPhone.disabled = false;
		txtEmail.disabled = false;

		$("#addUser").modal('show');
	}

	function clearForm(){
		frmNewUser.reset();
		$("#addUser").modal('hide');

	}

	let objUser = {};
	function newUser(){
		if (txtNickName.value != '' ){ //&&  txtUserFName.value != '' && txtUserLName.value != '' && fk_eUserType.value != '0') {
			objUser = {
				"txtNickName" : txtNickName.value,
				"txtUserFName" : txtUserFName.value,
				"txtUserLName" : txtUserLName.value,
				"txtPhone" : txtPhone.value,
				"txtEmail" : txtEmail.value,
				"fk_eUserType" : fk_eUserType.value,
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
	          console.log(response.data == 1);
	          if(response.data) window.location.reload();
	        })
	        .catch(function (error) {
	          console.log(error);
	        });
	}

	function  editUser(){
		txtNickName.disabled = false;
		fk_eUserType.disabled = false;
		txtUserFName.disabled = false;
		txtUserLName.disabled = false;
		txtPhone.disabled = false;
		txtEmail.disabled = false;
		btnAddU.style.display = "none";
		btnEditU.style.display ="none";
		btnSaveC.style.display = "flex";
	}
	function saveUser(){
		let data = {};
		data.userId = userId.value;
		data.personId = personId.value;
		data.txtNickName = txtNickName.value ;
		data.fk_eUserType = fk_eUserType.value;
		data.txtUserFName = txtUserFName.value;
		data.txtUserLName = txtUserLName.value;
		data.txtPhone = txtPhone.value ;
		data.txtEmail = txtEmail.value;
		console.log(data);
		axios.post('<?php echo site_url('editUser') ?>', data)
    .then(function (response) {
      console.log(response.data);
      if(response.data == 1) window.location.reload();
      else alert("NO SE PUDO ACTUALIZAR EL USUARIO!!");
    })
    .catch(function (error) {
      console.log(error);
    });
	}
</script>
