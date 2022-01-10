<?php

include "conexao/conexao.php";
	if(isset($_POST['insert']))
	{
			$nome_doe = $_POST['nome'];
			$desc_doe = $_POST['desc'];
			$sint_doe = $_POST['sint'];
			$trat_doe = $_POST['trat'];
			$grau_doe = $_POST['grau'];	
		    $q=mysqli_query($con,"INSERT INTO hpt_doe (nome_doe,desc_doe,sint_doe,trat_doe,grau_doe) VALUES('$nome_doe','$desc_doe','$sint_doe','$trat_doe','$grau_doe')");
 if($q)
  echo 'success';
else
  echo 'error';
   }
?>