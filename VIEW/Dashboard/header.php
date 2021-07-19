<?php
session_start();
if(!isset($_SESSION['USER'])){
	header('Location:./../Login.php');
}
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./../css/bootstrap.min.css" rel="stylesheet">
    <?php 
      if($_SESSION['USER']['RolType']==1){
        echo "<title>Administrador</title>";
      }else{
        echo "<title>Member</title>";
      }
     ?>    
  </head>
  <body class="bg-dark">  