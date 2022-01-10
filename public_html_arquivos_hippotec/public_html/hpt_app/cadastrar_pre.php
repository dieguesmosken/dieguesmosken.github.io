<?php

include "Conexao/conexao.php";
	if(isset($_POST['insert']))
	{
			$sint = $_POST['resposta'];
			
		    $q=mysqli_query($con,"INSERT INTO hpt_pre0 (sint_usr) VALUES ('$sint')");
 if($q)
  echo 'success';
else
  echo 'error';
   }
?>

