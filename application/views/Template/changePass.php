<div class="modal" id="modChangePass">
   <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
     <div class="modal-content">
     
       <!-- Modal Header -->
       <div class="modal-header">
         <h1 class="modal-title">Cambiar Contraseña</h1>
         <button type="button" class="close" data-dismiss="modal">×</button>
       </div>
       
       <!-- Modal body -->
       <div class="modal-body">
         <div class="d-flex flex-wrap justify-content-center flex-column flex-container">
           <div class="d-flex flex-wrap justify-content-center flex-column">
             <div class="p-2">
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                     <span class="input-group-text">Nueva Contraseña:</span>
                   </div>
                   <input type="password" class="form-control" id="txtNwPass" name="txtNwPass">
                 </div>
             </div>
             <div class="p-2">
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                     <span class="input-group-text">Repetir Contraseña:</span>
                   </div>
                   <input type="password" class="form-control" id="txtNwPass2" name="txtNwPass2">
                 </div>
             </div>
           </div>
           <hr>
           <div class="d-flex flex-wrap justify-content-end">
             <div class="p-2">
               <button type="button" class="btn btn-outline-primary" onclick="change();">Cambiar</button>
             </div>
           </div>
         </div>
       </div>
       
       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
       </div>
       
     </div>
   </div>
 </div>
 <script type="text/javascript">
   let mdchangePsw = document.getElementById("modChangePass");
   let nwPass = document.getElementById("txtNwPass");
   let nwPass2 = document.getElementById("txtNwPass2");
   let lastPass2 = "<?php echo $_SESSION['user']['Pass']; ?>";
   let fAcces = <?php echo $_SESSION['user']['firstAccess']; ?>;
   if(fAcces == 1 ){
    changePsw();
   }
   function changePsw(){
     $('#modChangePass').modal('show');
   }
   function change(){
    if(nwPass.value != '' && nwPass2.value != ''){
        if(nwPass.value != nwPass2.value){
          alert("Las contraseñas NO coinciden!!");
          nwPass2.value ="";
          nwPass.value ="";
          nwPass.focus();
        }else{
          let newPass = {};
          newPass.nwPsw = nwPass.value;
          console.log(newPass);
          axios.post("<?php echo site_url('changePass'); ?>",newPass)
            .then(function(res){
              if (res.status == 200) {
                if(res.data == 1){
                  if(confirm("Cambios realizados, reiniciar sesión?")){
                    window.location ="<?php echo site_url('log_out') ?>";
                  }else{
                    $('#modChangePass').modal('hide');
                  }
                }
                
              }

            }).catch(function(err){

              alet(err);
              console.log(err);
            });
        }
      }
      else{
        alert("No puede dejar en blanco las contraseñas...");
        nwPass.focus();
      }
   }
 </script>
