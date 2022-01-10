<?php
include "conexao.php";
$data=array();
$q=mysqli_query($con,"SELECT * from hpt_qpre");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>