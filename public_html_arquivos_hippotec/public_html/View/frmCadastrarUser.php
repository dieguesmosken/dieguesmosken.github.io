<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar User</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
require_once '../Controller/UsersController.php';

date_default_timezone_set('America/Sao_Paulo');
    //armazena o horario em uma variavel
    $dtcriado_usr = new DateTime();
    $dtmodificado_usr = new DateTime('0000-00-00 00:00:00');
    // adiciona no post criado em e id_tema
    $_POST +=
    [
        "dtcriado_usr"=>$dtcriado_usr->format('Y-m-d H:i:s'),
        "dtmodificado_usr"=>$dtmodificado_usr->format('Y-m-d H:i:s')
    ];
?>


    <div class="w3-container w3-gray">
        <br>
        <?php
    if(isset($_POST['txtNome'])){
        $user = UsersController::inserirUser($_POST);
        if($user > 0){
            echo "<h4><b>INFO: </b>o registro foi adicionado com sucesso!</h4><br>";
        }else{
            echo "<h4><b>INFO: </b>Ocorreu um erro ao adicionar o registro!</h4><br>";
        }
    }
?>

        <hr>
    </div>
    <div class="w3-container w3-red">
        <h1 class="">Adicionar um novo Usuario</h1>
        <hr>
    </div>
    <form class="w3-container" action="" method="POST">
        <input type="hidden" id="id" class="w3-input" name="txtId">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" class="w3-input w3-animate-input" style="width:30%" name="txtNome"
>
        <label for="senha">Senha:</label>
        <input type="text" id="senha" class="w3-input w3-animate-input" style="width:30%" name="txtSenha"
>
        <label for="tcpf">CPF:</label>
        <input type="text" id="tcpf" class="w3-input w3-animate-input" style="width:30%" name="txtCpf"
>
        <label for="dtnasc">DT.NASC.:</label>
        <input type="text" id="dtnasc" class="w3-input w3-animate-input" style="width:30%" name="txtDtnasc"
>
        <label for="email">Email:</label>
        <input type="email" id="email" class="w3-input w3-animate-input" style="width:30%" name="txtEmail"
>
        <label for="tipo">Tipo:</label>
        <input type="number" id="tipo" class="w3-input w3-animate-input" style="width:30%" name="txtTipo">
        
        
        <hr>
        <input type="submit" class="w3-button w3-black" value="Cadastar Usuario">
        <a class="w3-button w3-black" href="index.php"> Voltar para a lista</a>

    </form>
</body>

</html>