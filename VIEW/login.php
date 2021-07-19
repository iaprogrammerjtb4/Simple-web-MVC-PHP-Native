<?php
session_start();
if (isset($_SESSION["User"])) {
  header('location:Sesion.php');	
}if(isset($_SESSION['roll'])){
	if($_SESSION['roll']==5){
		echo "<script>alert('oh oh... No deberia estar aquí. Serás direccionado a tu sesión'); location='sesion_tecnicos_pc.php';</script>";
	}
}
if(isset($_POST['log']))
	{
		$logear = $Class_Open->ver($_POST['User'], $_POST['Pass']);
		
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./VIEW/css/bootstrap.min.css" >
	<!-- Fuentes -->
   <link href="./../font/bitnami.css" rel="stylesheet">
   <!--<link href="https://fonts.googleapis.com/css?family=Vesper+Libre|Work+Sans" rel="stylesheet"> se preba integrando la fuente local-->     
    <title>MAKITA PHOTO</title>
  </head>
 
	  
  <body class="text-center">
	<style>	
html,body {
	margin: 0;
	padding: 0;
  	height:100%;
  	border-top: black;
	border-bottom: black;	
	background-color: rgba(0, 0, 0, .9);	    
}

body {
	margin: 0px;	 
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  font-family: 'Work Sans', sans-serif;    
  background: url('./VIEW/img/makita_fondo.jpg') no-repeat center center fixed;		
}

.form-signin {
  	padding: 15px;
	border: solid 1px red;
	border-radius: 5px;
}
.form-signin .form-control {
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;  
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  border-color: rgb(255,0,0);
  opacity: 0.4;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-color: rgb(255,0,0);
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  opacity: 0.4;
}
	@media only screen and (max-width: 1300px) and (min-width: 801px) {
		#img-log{
			margin-left:0;
			margin-top:0;
		}
		
		form.form-signin{
			margin-left: 120%;
		}
		
		img#img-log{
			margin-left: 200%;
		}
	}
	@media only screen and (min-width: 800px) {
		.form-signin{
			margin-left: 124%;
		}	
		
		#img-log{
			margin-left: 600%;
			margin-top: 500%;
		}
	}

	form{		
		background-color: rgba(0, 0, 0, .5);
		width: 100%;
		margin-left: 5%;		
		/*-background-imgage: url('img/aca.jpg');		*/
	}
	
	form img{
		border-radius: 10px;
	}
	
	#buton{
		font-size:23px; 
		background-color: rgba(0, 0, 0, .9);
		color:white; 
		cursor:pointer;
	}
	
	#buton:hover{
		background: rgb(32 110 158);
		transition: all 1s;
		
	}	
	</style>   
	<section class="row">	
		<div class="col-12 col-md-12">
			<form action="./CONTROLLER/Login.php" method="POST" style="text-align: center;" class="form-signin">									
			<h4 style="color:white;">Photo site</h4>
			<label for="inputUser" class="sr-only">Ingresa el usuario</label>
			<input  name="User" style="text-align: center;" type="email" id="inputUser" class="form-control" placeholder="Usuario" required autofocus/>
			<label for="inputPassword" class="sr-only">Ingresa la contraseña</label>
			<input name="Pass" style="text-align: center;" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required/>
			<button  id="buton" name="log" class="btn btn-lg btn-block" type="submit">Entrar</button>
			<a href="https://www.iaprogrammerweb.com/" target="_blank" class="mt-5 mb-3 text-muted">&copy;Jeison Tamara</a>
			</form>		
		</div>    	
	<div class="espacio col-4 col-md-0"></div>
    </section>
</body>