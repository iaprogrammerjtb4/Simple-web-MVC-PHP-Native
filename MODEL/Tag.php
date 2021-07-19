<?php
include('Conection.php');
class Tag {
	private $conexion;
	public function __construct(){
		$conn= new Conection();
		$this->conexion = $conn->get_conexion();		
	}
	/**
	*almacenar los registros de los campos para foto
	*/
	public function insert_tag($Title){
		$query= "INSERT INTO tag(ID, Title) VALUES (NULL,:Title)";		
		$statement= $this->conexion->prepare($query);						
		$statement->bindParam(':Title',$Title);
		return $statement->execute();			
	}
	
	/*
	*cargar todas las albums
	*/
	
	public function lista_tags($valor,$inicio=FALSE,$limite=FALSE)
		{
			if ($inicio!==FALSE && $limite!==FALSE) {				
				$sql="SELECT * FROM tag WHERE Title like '%".$valor."%' ORDER BY ID ASC LIMIT $inicio,$limite";
			}
			else{
				$sql="SELECT * FROM tag WHERE Title like '%".$valor."%' ORDER BY ID DESC";
			}			
			$resultados=$this->conexion->prepare($sql);
			$resultados->execute();			
			$arreglo = $resultados->fetchAll();			
			return $arreglo;						
		}
}