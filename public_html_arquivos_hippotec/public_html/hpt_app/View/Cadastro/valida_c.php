<?php
session_start();

require_once '../../Conexao/conexao.php';

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){

	$nome_usr = filter_input(INPUT_POST, 'nome_usr', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$dtcriado_usr = $_POST['dtcriado_usr'];
	$dtmodificado_usr = $_POST['dtmodificado_usr'];
	
	//echo "$email - $senha";
	if((!empty($email)) AND (!empty($nome_usr))){
		//Gerar a senha criptografada
		//echo password_hash($password, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT * FROM hpt_usr WHERE email_usr='$email' LIMIT 1";
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
				if($email == $row_usuario['email_usr']){
					$_SESSION['msg'] = "Usuario já cadastrado! Faça o login";
				header("Location: ../Login/login.php");
			}else{
				
				$resultado_usuario2 = mysqli_query($con,"INSERT INTO hpt_usr(nome_usr,pass_usr,email_usr,tipo_usr,dtcriado_usr,dtmodificado_usr) VALUES ('$nome_usr','$password','$email','0','$dtcriado_usr','$dtmodificado_usr')");
				if($resultado_usuario2){
					$_SESSION['msg'] = "Cadastrado Com Sucesso!";
					header("Location: ../Login/login.php");

				}else{
					$_SESSION['msg'] = "Erro no Cadastro!";
					header("Location: cadastro.php");
				}
				
		}
	}
	}else{
		$_SESSION['msg'] = "Os Campos não podem estar vazios!";
		header("Location: cadastro.php");
	}
}else{
	
	header("Location: ../../index.php");
}
?>