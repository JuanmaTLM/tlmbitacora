<style type="text/css">
  .logoMenu{
    width: 130px;
    height: 60px;
  }

</style>

<div class="d-flex justify-content-between bg-light">
  <div class="p-1">
    <img class="logoMenu" src="<?php echo base_url() ?>assets/logos/logo.png">
  </div>
  <div class="p-3">
    <h2>Bienvenido <?php echo $_SESSION['user']['Usuario'] ?></h2>
  </div>
  <div class="p-3">
    <button type="button" class="btn btn-outline-primary" onclick="logOut();">Cerrar Sesión</button>
  </div>
</div>

<script type="text/javascript">
  function logOut(){
    axios.get("<?php echo site_url('log_out'); ?>")
      .then(function(res){
        if (res.status == 200) {
          if(confirm("Sesión cerrada!!!")){
              window.location ="<?php echo site_url() ?>";
            }else{
              window.location ="<?php echo site_url() ?>";
            }
          
        }

      }).catch(function(err){

        alet(err);
        console.log(err);
      });
  }
</script>