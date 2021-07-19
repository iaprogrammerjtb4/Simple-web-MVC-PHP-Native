<?php
include('Conection.php');
class Album {
	private $conexion;
	public function __construct(){
		$conn= new Conection();
		$this->conexion = $conn->get_conexion();		
	}
	/**
	*almacenar los registros de los campos para foto
	*/
	public function insert_album($Title, $Description){
		$query= "INSERT INTO album(ID, Title, Descripcion) VALUES (NULL,:Title,:Descripcion)";		
		$statement= $this->conexion->prepare($query);						
		$statement->bindParam(':Title',$Title);
		$statement->bindParam(':Descripcion',$Description);
		return $statement->execute();			
	}
	
	/*
	*cargar todas las albums
	*/
	
	public function lista_albums($valor,$inicio=FALSE,$limite=FALSE)
	{
		if ($inicio!==FALSE && $limite!==FALSE) {				
			$sql="SELECT * FROM album WHERE Title like '%".$valor."%' or Descripcion like '%".$valor."%' ORDER BY ID ASC LIMIT $inicio,$limite";
		}
		else{
			$sql="SELECT * FROM album WHERE Title like '%".$valor."%' or Descripcion like '%".$valor."%' ORDER BY ID DESC";
		}			
		$resultados=$this->conexion->prepare($sql);
		$resultados->execute();			
		$arreglo = $resultados->fetchAll();			
		return $arreglo;						
	}

	
	/*
	*cargar todas las locations
	*/
	
	public function lista_locations()
	{		
		$sql="SELECT * FROM location ORDER BY ID DESC";			
		$resultados=$this->conexion->prepare($sql);
		$resultados->execute();			
		$arreglo = $resultados->fetchAll();			
		return $arreglo;						
	}	


	/*
	*cargar ultimas fots
	*/
	
	public function get_last_photos()
	{		
		$sql="SELECT * FROM photo ORDER BY ID ASC LIMIT 2";			
		$resultados=$this->conexion->prepare($sql);
		$resultados->execute();			
		$arreglo = $resultados->fetchAll();			
		return $arreglo;						
	}	

}