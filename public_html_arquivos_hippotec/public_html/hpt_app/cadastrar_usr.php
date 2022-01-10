<?php

include "conexao/conexao.php";
	if(isset($_POST['insert']))
	{
			$nome_usr = $_POST['nome'];
			$email_usr = $_POST['email'];
			$pass_usr = $_POST['pass'];
			$cpf_usr = $_POST['cpf'];
			$dtnasc_usr = $_POST['dtnasc'];
		    $q=mysqli_query($con,"INSERT INTO hpt_usr (nome_usr,email_usr,pass_usr,cpf_usr,dtnasc_usr) VALUES('$nome_usr','$email_usr','$pass_usr','$cpf_usr','$dtnasc_usr')");
 if($q)
  echo 'success';
else
  echo 'error';
   }
?>