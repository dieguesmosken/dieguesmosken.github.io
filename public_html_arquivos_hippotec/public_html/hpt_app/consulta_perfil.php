<?php
include "conexao/conexao.php";
$data=array();
$q=mysqli_query($con,"SELECT * from hpt_usr where id=1");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>