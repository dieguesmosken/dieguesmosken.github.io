
<?php
include "Conexao/conexao.php";



$data=array();
$q=mysqli_query($con,"SELECT * FROM hpt_qpre");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);

?>

