<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CPrevio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('MPrevio');
	    $this->load->helper('url');
	    $this->load->library('upload');
	}

	public function index()
	{
		$data =$this->input->get();
    $info['images'] = $this->getImages($data['cveReferencia']);
    $info['cveReferencia'] = $data['cveReferencia'];
		$this->MPrevio->findPrevio($data);
		$this->load->view('Template/head');
		$this->load->view('Template/Menu');
		$this->load->view('Template/changePass');
		$this->load->view('Previo/vwPrincipal',$info);
		$this->load->view('Template/footer');
		$this->load->view('Previo/modPrevio',$data);


	}
	public function uploadImages(){
    // Configuración de la biblioteca de carga de archivos
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cveRef = $_POST['cveReferencia'];
        $idRef = $_POST['eIdReferencia'];
      // Verificar si se han seleccionado archivos
      if (isset($_FILES['images'])) {
        $images = $_FILES['images'];

        // Directorio de destino
        $upload_directory = './assets/DCTOSREFERENCIAS/'.$cveRef.'/Previo/';

        // Crear el directorio si no existe
        if (!is_dir($upload_directory)) {
          mkdir($upload_directory, 0755, true);
        }

        // Recorrer cada imagen subida
        foreach ($images['name'] as $index => $image_name) {
          // Obtener información de la imagen actual
          $image_tmp_name = $images['tmp_name'][$index];
          $image_size = $images['size'][$index];
          $image_type = $images['type'][$index];
          $image_error = $images['error'][$index];

          // Verificar si se ha subido correctamente la imagen
          if ($image_error === UPLOAD_ERR_OK) {
            // Verificar el tipo de archivo (opcional)
            // if ($image_type === 'image/jpeg' || $image_type === 'image/png') {
            //   ...
            // }

            // Mover la imagen a la ubicación deseada
            $target_path = $upload_directory . $image_name;

            if (move_uploaded_file($image_tmp_name, $target_path)) {
              echo "<script>confirm('La imagen $image_name se ha subido correctamente.');</script>";
              header("Location:".site_url('previo')."?cveReferencia=".$cveRef."&image=".$image_name);
            } else {
              echo "Hubo un error al subir la imagen $image_name.<br>";
            }
          } else {
            echo "Hubo un error al subir la imagen $image_name: $image_error.<br>";
          }
        }
      } else {
        echo "No se han seleccionado imágenes.";
      }
    }
      
  }

 public function getImages($cveRef) {
     // Obtener la lista de imágenes en la carpeta

     $imagePath = './assets/DCTOSREFERENCIAS/'.$cveRef.'/Previo/';
     if (!is_dir($imagePath)) {
       mkdir($imagePath, 0755, true);
     }
     $images = scandir($imagePath);
     $images = array_diff($images, array('.', '..')); // Eliminar los directorios "." y ".."
     
    return $images;
  }
}