<style type="text/css">
  
</style>

<div class="modal" id="modAsignar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Asignar Referencia</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo site_url('asignarRef') ?>" method ="POST" id="frmAsignar">
          <input type="hidden" name="txteIdRef" id="txteIdRef">  
          <div class="d-flex flex-wrap justify-content-center flex-column flex-container">
              <div class="d-flex flex-wrap justify-content-around">
                 <div class="input-group mb-3 p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white" >Asignar a:</span>
                      </div>
                      <select id="userList" type="text" class="form-control" name= "userList"  >
                      </select>
                  </div>
              </div>
          </div>

          <div class="d-flex flex-wrap justify-content-around flex-column flex-container">
            <button type="button" onclick="submitForm();" class="btn btn-outline-success"><i class='fas fa-people-carry' ></i>&nbsp;&nbsp; <strong> Asignar </strong></button>
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="resetForm();">Cancelar</button>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  const idRef = document.getElementById('txteIdRef');
  const frmAsignar = document.getElementById('frmAsignar');
  const userList = document.getElementById('userList');
  function asignar(id){
    idRef.value = id;
    fillUsers();
    $("#modAsignar").modal('show');
  }
  function resetForm(){
    frmAsignar.reset();
  }
  function submitForm(){
    if(confirm("Confirmar Asignación"))
      frmAsignar.submit();

  }

  function fillUsers(){
    axios.get("<?php echo site_url('fillUsers'); ?>").then(
      function(res){
            if (res.status == 200) {
              if(res.data){
                let item = '';
                var usersList = res.data;
                  console.log(usersList);
                
                for(let user of usersList){

                  item += "<option value='" + user.userID + "'><strong>" +  user.Usuario + "</strong> | " + user.TipoUsuario + "</option>";
                  
                }
              userList.innerHTML =  item;
              }
            }
          }).catch(function(err){
            alert(err);
            console.log(err);
          });
  }
</script>