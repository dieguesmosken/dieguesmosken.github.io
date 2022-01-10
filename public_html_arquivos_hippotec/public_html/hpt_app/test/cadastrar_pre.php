<?php

include "conexao/conexao.php";
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

<!--
/*CREATE TABLE hpt_qpre(
	id int(11) PRIMARY KEY AUTO_INCREMENT,
    question varchar(255),
    answer1 varchar(255),
    answer2 varchar(255),
    answer3 varchar(255),
    answer4 varchar(255)
);
CREATE TABLE hpt_pre0(
	id int(11) PRIMARY KEY AUTO_INCREMENT,
    sint_usr varchar(255)
   
); */-->