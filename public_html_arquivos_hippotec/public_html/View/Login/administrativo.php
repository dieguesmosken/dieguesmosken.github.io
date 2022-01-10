<?php
session_start();
if(!empty($_SESSION['id'])){
	
?>

<?php
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>