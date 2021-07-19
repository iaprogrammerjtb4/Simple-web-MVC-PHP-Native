
<?php
include('../MODEL/Location.php');
//recibir valores
session_start();
//create new album
if(isset($_POST['create_location'])){
	$Title = $_POST['Title'];
	$Descripcion = $_POST['des'];
	$objPhoto = new Location();
	$insert = $objPhoto->insert_location($Title, $Descripcion);
	if($insert){		
		header('Location:../VIEW/Dashboard/Member.php?section=Location');   
	}
}

//load album
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
		$ins= new Location();
		$a = $ins->lista_locations($valor);			
		$b = count($a);
		$arr = $ins->lista_locations($valor,$inicio,$limite);											
		$jsonArr = json_encode($arr)."*".$b;
		echo $jsonArr;
		
	}	
}
