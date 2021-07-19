<?php
include('../MODEL/Photo.php');
//recibir valores
session_start();
//create new photo
if(isset($_POST['create_photo'])){
	$Title = $_POST['Title'];
	$Album = $_POST['Album'];
	$dir = './../MODEL/photos/';
	$dir_view = './../../MODEL/photos/';
	$Location = $_POST['Location'];
	$Descripcion = $_POST['des'];
	$ruta_photo = $dir.basename($_FILES['Photo']['name']);
	$ruta_view_photo = $dir_view.basename($_FILES['Photo']['name']);
	$Privacy = $_POST['privacy'];
	//obj class photo
	$objPhoto = new Photo();
	$insert = $objPhoto->insert_photo($Album, $Location, $_SESSION['USER']['ID'], $Title, $Descripcion, $Privacy, $ruta_view_photo);
	if($insert){
		move_uploaded_file($_FILES['Photo']['tmp_name'], $ruta_photo);		
		header('Location:../VIEW/Dashboard/Member.php?section=Photo');   		
	}
}

//load photos
if(isset($_POST['boton'])){
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$inicio = 0;
	    $limite = 4;
	    if (isset($_POST['pagina'])) {
	    	$pagina=$_POST['pagina'];
	        $inicio = ($pagina - 1) * $limite;
	    }
	    $valor=$_POST['valor'];
		$ins=new Photo();
		$a= $ins->lista_photos($valor);	
		$b=count($a);
		$c= $ins->lista_photos($valor,$inicio,$limite);	
		echo json_encode($c)."*".$b;
	}	
}
