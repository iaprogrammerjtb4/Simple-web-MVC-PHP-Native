<?php
include('Conection.php');
class Photo {
	private $conexion;
	public function __construct(){
		$conn= new Conection();
		$this->conexion = $conn->get_conexion();		
	}
	/**
	*almacenar los registros de los campos para foto
	*/
	public function insert_photo($AlbumID, $LocationID, $MemberID, $Title, $Description, $Privacy, $ImagenPath){
		$query= "INSERT INTO photo(ID, AlbumID, LocationID, MemberID, Title, Description, Privacy, UploadDate, View, ImagenPath) VALUES (NULL,:AlbumID,:LocationID,:MemberID,:Title,:Description,:Privacy,now(),1,:ImagenPath)";		
		$statement= $this->conexion->prepare($query);				
		$statement->bindParam(':AlbumID',$AlbumID);
		$statement->bindParam(':LocationID',$LocationID);
		$statement->bindParam(':MemberID',$MemberID);
		$statement->bindParam(':Title',$Title);
		$statement->bindParam(':Description',$Description);
		$statement->bindParam(':Privacy',$Privacy);
		$statement->bindParam(':ImagenPath',$ImagenPath);		
		return $statement->execute();			
	}
	
	/*
	*cargar todas las fotos 
	*/

	public function lista_photos($valor,$inicio=FALSE,$limite=FALSE)
	{
		if ($inicio!==FALSE && $limite!==FALSE) {				
			$sql="SELECT * FROM photo WHERE title like '%".$valor."%' or description like '%".$valor."%' ORDER BY ID ASC LIMIT $inicio,$limite";
		}
		else{
			$sql="SELECT * FROM photo WHERE title like '%".$valor."%' or description like '%".$valor."%' ORDER BY ID DESC";
		}			
		$resultados=$this->conexion->prepare($sql);
		$resultados->execute();
		$arreglo = $resultados->fetchAll();
		return $arreglo;						
	}

}