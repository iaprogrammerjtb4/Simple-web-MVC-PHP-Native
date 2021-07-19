<?php
include('./../MODEL/Admin.php');

if(isset($_POST['Name'])){
	$name = $_POST['Name'];
	$role = $_POST['Role'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$tel = $_POST['tel'];
	$address = $_POST['address'];
	//instancia de class admin
	$objAdmin = new Admin();
	$insert = $objAdmin->insert_user($role, $email, md5($pass), $name, $tel, $address);
	if($insert){		
		header('Location:../VIEW/Dashboard/Admin.php');   
	}
}