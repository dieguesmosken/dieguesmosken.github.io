<?php
/*
$nome = $_GET['Name']; // o $_POST usa o name pra pegar os dados
$email = $_GET['Email'];
$mensagem = $_GET['Message'];

$to = "matheus.diegues@outlook.com";
$subject = $_GET['Subject'];;
$msg = "Nome: $nome\n" . // O \n pula uma linha e o . conecta os pedaços
"Mensagem: $mensagem\n" .
"Enviado por: $email"; 
// aqui você pode incluir os campos que quiser
mail($to, $subject, $msg);
*/


   //Variáveis que recebem os dados digitados no formulário pelo id atribuído nos input
   $nome = $_POST['Name']; 
   $email = $_POST['Email'];
   $assunto = $_POST['Subject'];
   $mensagem = $_POST['Message'];

mail (
    "contato@seunome.com", //Endereço que vai receber a mensagem
    "Nome: $nome
     Email: $email
     Assunto: $assunto
     Mensagem: $mensagem", "FROM:$nome<$email>");


echo "Obrigado por enviar seu email"; // esta será a mensagem na página de saída, depois do e-mail ser enviado, mas vc pode personalizar...

?>