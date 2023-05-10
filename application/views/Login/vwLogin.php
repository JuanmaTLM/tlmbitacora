<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title id="titulo"></title>


	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


</head>

<style type="text/css">
	#acceso{
		margin-top: 5%;
	}
	.logo{
		width: 350px;
		height: 200px;
	}
	#principal{
		border-radius: 2%;
		height: 80vh;
		min-height: 40vh;
	}
	body, footer{
	 	position: absolute;
	 	width : 100%;

	}
	footer{
		bottom: 0;
	}
</style>

<body class="container-fluid bg-light">
	<div  id="principal" >
		<div class="d-flex bg-light flex-column text-center mb-3" id="acceso" >
			<div class="d-flex justify-content-center ">
				<h2 class="p-2" title="	Bienvenido a TLMBitácora"></h2>
			</div>
			<div id="logo">
				<div class="d-flex justify-content-center">
					<img src="<?php echo base_url() ?>assets/logos/logo.png" class="rounded mx-auto d-block logo">
				</div>
			</div>

			<hr>
				<div class="d-flex flex-wrap justify-content-center">
						<div class="login-panel panel panel-primary">
					        
					    	<div class="panel-body ">
					        	<form method="POST" action="<?php echo site_url('login'); ?>">
					            	<fieldset>
					            		<div class="d-flex flex-wrap flex-column justify-content-center align-items-center align-content-center">
					            				<div class="form-group text-center">
					            			    	<input class="form-control" placeholder="Usuario" type="text" name="email" required>
					            				</div>
					            				<div class="form-group text-center">
					            			    	<input class="form-control" placeholder="Password" type="password" name="password" required>
					            				</div>
					            				<button type="submit" class="btn btn-md btn-primary btn-block text-center"><span class="fa fa-log-in"></span> Login</button>
					            		</div>
					                	
					            	</fieldset>
					        	</form>
					    	</div>
					    	<?php
							if($this->session->flashdata('error')){
								?>
								<div class="alert alert-danger text-center" style="margin-top:20px;">
									<?php echo $this->session->flashdata('error'); ?>
								</div>
								<?php
							}
						?>
					    </div>
						
				</div>
			</div>
		</div>
	<footer class="d-flex justify-content-center">
		<div class="p-2">
			<p>
				<strong>Tracing Logistics Manzanillo </strong><br>
				<u>Derechos Reservados &copy; 2023</u>
			</p>
		</div>
	</footer>
</body>
</html>
