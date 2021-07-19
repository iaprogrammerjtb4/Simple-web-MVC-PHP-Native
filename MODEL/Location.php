<?php
include('Conection.php');
class Location {
	private $conexion;
	public function __construct(){
		$conn= new Conection();
		$this->conexion = $conn->get_conexion();		
	}
	/**
	*almacenar los registros de los campos para foto
	*/
	public function insert_location($Title, $Description){
		$query= "INSERT INTO location(ID,Name, shortname) VALUES (NULL,:Title,:Description)";		
		$statement= $this->conexion->prepare($query);						
		$statement->bindParam(':Title',$Title);
		$statement->bindParam(':Description',$Description);
		return $statement->execute();			
	}
	
	/*
	*cargar todas las albums
	*/
	
	public function lista_locations($valor,$inicio=FALSE,$limite=FALSE)
	{
		if ($inicio!==FALSE && $limite!==FALSE) {				
			$sql="SELECT * FROM location WHERE Name like '%".$valor."%' ORDER BY ID ASC LIMIT $inicio,$limite";
		}
		else{
			$sql="SELECT * FROM location WHERE Name like '%".$valor."%' ORDER BY ID DESC";
		}			
		$resultados=$this->conexion->prepare($sql);
		$resultados->execute();			
		$arreglo = $resultados->fetchAll();			
		return $arreglo;						
	}
}