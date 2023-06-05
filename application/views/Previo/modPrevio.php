
<!-- Agregar fotos -->
<div class="modal fade" id="addPictures">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar Fotos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('uploadImages');?>" enctype="multipart/form-data">
        <input type="hidden" name="cveReferencia" value="<?php echo $cveReferencia;?>">
         <div class="form-group">
              <input type="file" name="images[]" multiple  accept=".jpg" class="form-control">
              <input type="submit" value="Subir" class="btn btn-outline-success">
           </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>