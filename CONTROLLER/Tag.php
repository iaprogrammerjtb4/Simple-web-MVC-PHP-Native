
<?php
include('../MODEL/Tag.php');
//recibir valores
session_start();
//create new album
if(isset($_POST['create_tag'])){
	$Title = $_POST['Title'];
	//obj class photo 
	$objPhoto = new Tag();
	$insert = $objPhoto->insert_tag($Title);
	if($insert){		
		header('Location:../VIEW/Dashboard/Member.php?section=Tag');   
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
		$ins= new Tag();
		$a = $ins->lista_tags($valor);			
		$b = count($a);
		$arr = $ins->lista_tags($valor,$inicio,$limite);											
		$jsonArr = json_encode($arr)."*".$b;
		echo $jsonArr;
		
	}	
}
