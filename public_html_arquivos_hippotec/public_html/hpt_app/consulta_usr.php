<?php

include "conexao/conexao.php";

 $email = $_REQUEST['busca_usr'];

$data=array();
$q=mysqli_query($con,"SELECT * FROM hpt_usr WHERE email='$email'");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);

?>