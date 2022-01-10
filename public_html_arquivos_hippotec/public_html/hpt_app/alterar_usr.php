<?php

include "conexao/conexao.php";
	if(isset($_POST['insert']))
	{
			$id =$_POST['id'];
			$nome_usr = $_POST['nome'];
			$email_usr = $_POST['email'];
			$pass_usr = $_POST['pass'];
			$cpf_usr = $_POST['cpf'];
			$dtnasc_usr = $_POST['dtnasc'];
		    $q=mysqli_query($con,"UPDATE hpt_usr SET nome_usr='$nome_usr',email_usr='$email_usr',pass_usr='$pass_usr' ,cpf_usr='$cpf_usr',dtnasc_usr='$dtnasc_usr' where id=$id");
 if($q)
  echo 'success';
else
  echo 'error';
   }
?>