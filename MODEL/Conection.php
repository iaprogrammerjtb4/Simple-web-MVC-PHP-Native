<?php
class Conection{
		public function get_conexion(){
			$user="root";
			$pass="";
			$host="localhost";
			$db="makita";
			$Conection= new PDO("mysql:host=$host;dbname=$db", $user, $pass);
			return $Conection;
		}
}

?>