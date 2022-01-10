<?php
require_once '../Controller/UsersController.php';
//testar o model
$id = $_GET['id'];

$users = UsersController::listarUserID($id);
//define timezone como são paulo
date_default_timezone_set('America/Sao_Paulo');

    //armazena o horario em uma variavel
    
    $dtmodificado_usr = new DateTime();
    // adiciona no post criado em e id_user
    $_POST +=
    [
        "dtmodificado_usr"=>$dtmodificado_usr->format('Y-m-d H:i:s')
    ];

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar User</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="w3-container w3-gray">
        <br>

        <?php
 if(isset($_POST['txtNome'])){
     $user = UsersController::editarUser($_POST);
     if($user > 0){
         echo "<h4><b>INFO: </b>o registro foi editado com sucesso!</h4><br>";
     }else{
         echo "<h4><b>INFO: </b>Ocorreu um erro ao editar o registro!</h4><br>";
     }
 }
 
?>
        <hr>
    </div>
    <div class="w3-container w3-blue">
        <h1 class="">editar o Usuario <?= $users->nome_usr; ?></h1>
        <hr>
    </div>
    <form class="w3-container" action="" method="POST">
        <input type="hidden" id="id" class="w3-input" name="txtId" value="<?= $users->id; ?>">
        <label for="nome">Nome:</label>
        <input type="text"  id="nome" class="w3-input w3-animate-input" style="width:30%" name="txtNome"
            value="<?= $users->nome_usr; ?>">
        <label for="senha">Senha:</label>
        <input type="text" id="senha" class="w3-input w3-animate-input" style="width:30%" name="txtSenha"
            value="<?= $users->pass_usr; ?>">
            <label for="tcpf">CPF:</label>
        <input type="text" id="tcpf" class="w3-input w3-animate-input" style="width:30%" name="txtCpf"
            value="<?= $users->cpf_usr; ?>">
            <label for="dtnasc">DT.NASC.:</label>
        <input type="text" id="dtnasc" class="w3-input w3-animate-input" style="width:30%" name="txtDtnasc"
            value="<?= $users->dtnasc_usr; ?>">
            <label for="email">Email:</label>
        <input type="email" id="email" class="w3-input w3-animate-input" style="width:30%" name="txtEmail"
            value="<?= $users->email_usr; ?>">
            <label for="tipo">Tipo:</label>
        <input type="number" id="tipo" class="w3-input w3-animate-input" style="width:30%" name="txtTipo"
            value="<?= $users->tipo_usr; ?>">
        <input type="hidden" id="dtcriado_usr" class="w3-input" name="dtcriado_usr" value="<?= $users->dtcriado_usr; ?>">
        <hr>
        <input type="submit" class="w3-button w3-black" value="Alterar Usuario">
        <a class="w3-button w3-black" href="index.php"> Voltar para a lista</a>

    </form>
    <h4> </h4>
</body>

</html>