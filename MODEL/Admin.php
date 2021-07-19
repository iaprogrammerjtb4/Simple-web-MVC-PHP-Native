<?php
include('Conection.php');
class Admin {
	private $conexion;
	public function __construct(){
		$conn= new Conection();
		$this->conexion = $conn->get_conexion();		
	}
	/**
	*almacenar los registros de los campos para foto
	*/
	public function insert_user($RoleID, $Email, $Password, $Name, $PhoneNum, $Address)
	{
		$query= "INSERT INTO member(ID, RoleID, Email, Password, Name, PhoneNum, Address, stats) VALUES(NULL, :RoleID, :Email, :Password, :Name, :PhoneNum, :Address, 1) ";		
		$statement= $this->conexion->prepare($query);						
		$statement->bindParam(':RoleID',$RoleID);
		$statement->bindParam(':Email',$Email); 
		$statement->bindParam(':Password',$Password); 
		$statement->bindParam(':Name',$Name); 
		$statement->bindParam(':PhoneNum',$PhoneNum); 
		$statement->bindParam(':Address',$Address);		
		return $statement->execute();			
	}
	
	/*
	*cargar todas las albums
	*/
	
	public function lista_users()
	{		
		$sql="SELECT m.ID, r.description as rol , m.Email, m.Password, m.Name, m.PhoneNum, m.Address, IF(m.stats = 1,'ACTIVO','INACTIVO')as stats FROM member as m JOIN role as r on r.ID = m.RoleID";		
		$resultados=$this->conexion->prepare($sql);
		$resultados->execute();			
		$arreglo = $resultados->fetchAll();			
		return $arreglo;						
	}

	
	/*
	*cargar todas las albums
	*/
	
	public function action($action,$userID)
	{				
		switch ($action) {
			case 'Inactivar':
				$sql = "UPDATE member SET stats= '0' WHERE ID = :ID";
				break;
			
			case 'Activar':
				$sql = "UPDATE member SET stats= '1' WHERE ID = :ID";
				break;

		}			
		$resultados=$this->conexion->prepare($sql);
		$resultados->bindParam(':ID',$userID);
		$resultados->execute();								
	}	
}