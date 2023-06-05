<?php 
	if (isset($_GET['image'])) {
		$image =$_GET['image'];
        echo "<script>alert('La imagen $image se ha subido correctamente.');</script>";
		
	}
 ?>
<style type="text/css">
	.cont{
		margin-left: 1.5%;
		margin-right: 1.5%;
		padding: 10px;
	}
	.image{
		width: 150px;
		height: 140px;
	}
	.image-zoom {
      transition: transform 0.3s;
    }

    .image-zoom:hover {
      transform: scale(1.2);
      
    }

</style>
<script>
    function centerImage(element) {
      element.style.position = 'fixed';
      element.style.top = '50%';
      element.style.left = '50%';
      element.style.transform = 'translate(-50%, -50%)';
      element.style.zIndex = '9999';
    }
  </script>
<div class=" d-flex flex-column border rounded bg-light cont">
	<div class="d-flex justify-content-center">
		<div><h4>Previo <hr></h4></div>
	</div>
	<div class="d-flex justify-content-end">
		<div>
			<button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#addPictures">
				Agregar Fotos
			</button>
		</div>
	</div>
		<h2 class="text-center">Galería de imágenes</h2>

	<div class="d-flex flex-wrap justify-content-around">
		<?php
			$i = 0;
		 foreach ($images as $image): ?>
		  <div class="p-2">
		  	  
		  	    <img class="border border-primary rounded image image-zoom" src="<?php echo base_url('/assets/DCTOSREFERENCIAS/'.$cveReferencia.'/Previo/') . $image; ?>" data-toggle="modal" data-target="#imageModal<?php echo $i; ?>" alt="Imagen">
		  </div>
		  	  <?php 
		  	  $i++;
		  	endforeach; ?>
		  
	</div>
<br><hr>

<!-- Modal -->
  <?php 
  	$j = 0;
  foreach ($images as $image): ?>
    <div class="modal fade" id="imageModal<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel<?php echo $j; ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <img class="img-fluid" src="<?php echo base_url('/assets/DCTOSREFERENCIAS/'.$cveReferencia.'/Previo/') . $image; ?>" alt="Imagen">
          </div>
        </div>
      </div>
    </div>
  <?php
  	$j++;
   endforeach; ?>

<script type="text/javascript">
	window.onload = function(){
		titSite.innerHTML = "Etapa Previo TLM";
	}
</script>

