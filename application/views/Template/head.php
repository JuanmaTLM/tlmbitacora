<?php 
date_default_timezone_set('America/Monterrey'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title id="titulo"></title>


	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

	<!-- jQuery library
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



	<script src="../assets/js/functions.js"></script>

	<link rel="stylesheet" href="../assets/css/styles.css">


</head>

<style type="text/css">
	h1{
		font-size: 4.5vh;
	}
	h2{
		font-size: 4vh;
	}
	h3{
		font-size: 3.5vh;
	}
	h4{
		font-size: 3vh;
	}
	h5{
		font-size: 2.5vh;
	}
	h6{
		font-size: 2vh;
	}
	body, footer, section#principal{
	 	position: absolute;
	 	width : 100%;

	}
	body{
		overflow-x:scroll;


	}
	section#principal{
	 	min-height: 130vh;
	 		background-color: lightblue; /* For browsers that do not support gradients */
	 	 /*background-image: conic-gradient(darkblue,darkblue,blue,blue,lightblue, white,lightblue,blue,blue,darkblue,darkblue);*/
	 	 /*background-image:url(<?= base_url('assets/img/bg_all.gif') ?>);*/
       	background-size: 100%;
	}
	section{
		min-height: 130vh;
		min width: 100%;
	}
	footer{
		bottom: 0;
	}
	.flex-container{
		width: 95%;
		margin-left :2.5%;
		margin-right :2.5%
	}
	input[type=text], input[type=file],input[type=date],input[type=number],input[type=email],select{
    border : none;
    border-bottom: 1px solid black;
  }

</style>

<body >
	<section id="principal" >
