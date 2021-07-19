<?php
include('./VIEW/Login.php');
if(isset($_SESSION['USER'])){
	session_destroy();
}
?>