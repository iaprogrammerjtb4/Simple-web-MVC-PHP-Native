
<?php
include('../MODEL/Album.php');
//recibir valores
session_start();
//create new album
if(isset($_POST['create_album'])){
	$Title = $_POST['Title'];	
	$Descripcion = $_POST['des'];
	$objPhoto = new Album();
	$insert = $objPhoto->insert_album($Title, $Descripcion);
	if($insert){		
		header('Location:../VIEW/Dashboard/Member.php?section=Album');   
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
		$ins= new Album();
		$a = $ins->lista_albums($valor);			
		$b = count($a);
		$arr = $ins->lista_albums($valor,$inicio,$limite);											
		$jsonArr = json_encode($arr)."*".$b;
		echo $jsonArr;
		
	}	
}
