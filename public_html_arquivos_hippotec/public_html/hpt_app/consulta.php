<?php
include "conexao/conexao.php";
$data=array();
$q=mysqli_query($con,"SELECT * from tccHippotec");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>