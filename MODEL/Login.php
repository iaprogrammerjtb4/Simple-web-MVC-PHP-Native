<?php
include('Conection.php');
class Login
{
	/**
	*Valid_user
	usr = correo registrado
	pass = contraseña definida
	return = retorna arreglo con los datos de la tabla datos_persona, si el usuario no existe retorna array vacio
	*/
	private function Valid_User($usr,$pass){
			//var_dump($usr,$pass); die;
			$Model = new Conection();
			$conexion = $Model->get_conexion();
			$sql = "SELECT * FROM member WHERE Email = :usr";			
			$statement= $conexion->prepare($sql);	
			$statement->bindParam(':usr',$usr);			
			$statement->execute();
			$valid = $statement->fetch();
			//var_dump($valid); die;
			if(is_array($valid) && (count($valid)>0)){
				//validamos el hash
				/*Your Hash: 07eb16a755c5ba158d1437b7bdea21cc
				Your String: qwety123*/					
				if (md5($pass) === $valid['Password']) {				
    				return $valid;
				}else{
					return  array();
				}
				return $valid;
			}else{
				return array();
			}						  
	}

	/*
	*Get_User_Login_Session
	usr = correo registrado
	pass = contraseña definida
	return = true si el usurio existe, mensaje de rechazo si el user no existe
	*/
	public function Get_User_Login_Session($usr,$pass)
	{

		$dataUser = $this->Valid_User($usr,$pass);		
		if(count($dataUser)>0){			
			session_start();			
			$arrayDataUser = array();			
			$arrayDataUser['ID']= $dataUser['ID'];			
			$arrayDataUser['Name']= $dataUser['Name'];		
			$arrayDataUser['RolType']=$dataUser['RoleID'];								
			$_SESSION['USER'] = $arrayDataUser;											
			return true;
		}else{
			return "Clave/usuario incorrectos o ¡Usuario no registrado!";
		}		
	}

}

?>
