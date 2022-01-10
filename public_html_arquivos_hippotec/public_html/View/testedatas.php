<h1>Teste de datas</h1>
<hr>
<?php 
date_default_timezone_set('America/Sao_Paulo');
$hoje = new DateTime();
$ontem = new DateTime('2021-04-14');
echo '<p>hoje </p>';
$hojee = $hoje->format('Y-m-d');
echo '<br>';
echo '<p>ontem </p>';
echo $ontem->format('Y-M-D H:i:s');
echo '<br>';

$dataComentario = [
    "comentario"=>'verde',
    "criadoem"=>'2021-04-16',
    "id_tema"=> 4
];
require_once "../Model/ComentariosModel.php";

$objModel = new ComentariosModel();
$resultado = $objModel->inserirComentario($dataComentario);
echo "<hr>".$resultado;
?>