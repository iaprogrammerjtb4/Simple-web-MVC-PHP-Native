<?php
include('../MODEL/Login.php');
//recibimos los valores por post desde el formulario
$usr = $_POST['User'];
$pass = $_POST['Pass'];
//limpiamos los espacios de los valores de las variables
trim($usr);
trim($pass);
//cortamos código y/o etiquetas que no queremos
$usrToSendModel = strip_tags($usr);
$passToSendModel = strip_tags($pass);
//instanciamos el objeto de la clase login
$OBJLogin = new Login();
 //enviamos los datos para validar 
$validUser = $OBJLogin->Get_User_Login_Session($usrToSendModel,$passToSendModel);
//dependiendo del rol del usuario se manda al home o dashboard 
if(isset($_SESSION['USER'])){

	switch ($_SESSION['USER']['RolType']) {
		case 1:
			header('Location:../VIEW/Dashboard/Admin.php');
			break;
		case 2:
			header('Location:../VIEW/Dashboard/Member.php');
			break;
		default://si el usuario no tiene roll quiere decir que no esta registrado, mostrarmos el mensaje q retorna la funcion Get_User_Login_Session
			echo "<script>alert('"+$validUser+"');</script>";
			break;
	}
}else{
	//si el usuario no tiene roll quiere decir que no esta registrado, mostrarmos el mensaje q retorna la funcion Get_User_Login_Session
	var_dump($validUser);
}
?>
