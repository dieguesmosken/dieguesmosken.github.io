<?php
//importa o Users controler e o comentarios controler
require_once '../Controller/UsersController.php';
require_once '../Controller/ComentariosController.php';
//pega o id passado pelo get na url
$id = $_GET['id'];

//executa o listar Users para mostrar o User pelo id
$objetoUser = UsersController::listarUserID($id);
//executa o listar comentario para mostrar todos os comentarios pelo id daquele User
$objComentario = ComentariosController::listarTodosID($id);
//verifica se o input de comentarios esta vazio
if(isset($_POST['coment_usr'])){
    //executa o metodo de listar todos comentarios
    $comentarios = ComentariosController::listarTodosID($id);
    //define o fuso horario para america são paulo
    date_default_timezone_set('America/Sao_Paulo');
    //armazena o horario em uma variavel
    $coment_criado = new DateTime();
    // adiciona no post criado em e id_User
    $_POST +=
    [
        "coment_criado"=>$coment_criado->format('Y-m-d H:i:s'),
        "id_user"=>$objetoUser->id
    ];
    //executa a insersão do comentario
       $resultado = ComentariosController::inserirComentario($_POST); 
  
    //verifica se o registro foi inserido com sucesso ou não
    if($resultado > 0){
        ?>
<!--inicio da div de aviso se foi com sucesso-->
<div class="w3-panel w3-blue">
    <h3>INFORMAÇÃO!</h3>
    <p>O Comentario Foi Adicionado com sucesso!</p>
    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>
</div>
<?php

    }else{
        ?>
<!--inicio da div de aviso do erro-->
<div class="w3-panel w3-blue">
    <h3>INFORMAÇÃO!</h3>
    <p>Ocorreu um erro ao adicionar o registro!</p>
    <p>Codigo de erro: <?= $error_code ?></p>
    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>
</div>
<?php
    }
}
?>
<!--inicio do html-->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhar User</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--inicio do script da funçao ajax-->
    <script type="text/javascript">
    $(function() {
        //verifica se o 'botão' submit foi pressionado, equivalente a enter
        $("#frm").submit(function(event) {
            //cancela o evento
            event.preventDefault();
            //faz o post pelo ajax no jquery
            $.ajax({
                //link da url que sera enviado o post
                url: "detalharUser.php",
                //define o tipo que será feito o envio das informações
                type: "post",
                // define o que será enviado
                data: $(this).serialize(),
                //define algo para ser feito apos o retorno de true pelo envio
                success: function(retorno) {
                    <?php
                        // faz uma nova listagem dos comentarios
                        $comentarios = ComentariosController::listarTodosID($id);
                        ?>
                }
            });
        });
    });
    </script>

</head>

<body>
    <!--incio do div do titulo do User-->
    <div class="w3-container" style="background-color: #84e2f1">

        <hr>
        <h1>Detalhes do: <?php echo $objetoUser->nome_usr;?></h1>
        <h4> <a class="w3-button w3-black" href="index.php"> Voltar para a lista</a></h4>

        
        <table class="w3-hoverable w3-table w3-border w3-bordered" style="background-color: #62b5f7">
            <tr>
                <td style="background-color: #0799ff">Data Criado</td>
                <td><?php echo $objetoUser->dtcriado_usr ?></td>
                <td style="background-color: #0799ff">Data Modificado.</td>
                <td><?php echo $objetoUser->dtmodificado_usr ?></td>
            </tr>
            <tr>
                <td style="background-color: #0799ff" >ID</td>
                <td><?php echo $objetoUser->id ?></td>
                <td style="background-color: #0799ff">DT.NASC.</td>
                <td><?php echo $objetoUser->dtnasc_usr ?></td>
            </tr>
            <tr>
                <td style="background-color: #0799ff">NOME</td>
                <td><?php echo $objetoUser->nome_usr ?></td>
                <td style="background-color: #0799ff">EMAIL</td>
                <td><?php echo $objetoUser->email_usr ?></td>

            </tr>
            <tr>
                <td style="background-color: #0799ff">SENHA</td>
                <td><?php echo $objetoUser->pass_usr ?></td>
                <td style="background-color: #0799ff">TIPO</td>
                <td><?php 
                if($objetoUser->tipo_usr == 1){
                    echo $objetoUser->tipo_usr." - Administrador";
                }else{
                    echo $objetoUser->tipo_usr." - Comum";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td style="background-color: #0799ff">CPF</td>
                <td><?php echo $objetoUser->cpf_usr ?></td>
            </tr>
        </table>
        <hr>
        <!--inicio do formulario de cadastro de comentarios-->
        <form id="frm" action="" method="POST">
            <input type="text" name="coment_usr" id="coment_usr" placeholder="Faça seu Comentário">
        </form>
        <!--fim do form-->
        <hr>
        <!--inicio da div que exibira os comentarios-->
        <div id="listacomentarios">
            <table class="w3-hoverable">
                <tr style="background-color: #21f3">
                    <td>ID Coment</td>
                    <td>Comentario</td>
                    <td>Criado Em</td>
                    <td>ID User</td>
                </tr>
                <?php
    //foreach dizendo que enquanto ouver comentarios faça um loop para exibilos
    foreach($comentarios as $comentario){
    ?>
                <tr>
                    <td class="w3-hover-shadow" style="background-color: #0799ff"><?php echo $comentario['id'];?></td>
                    <td class="w3-hover-shadow" style="background-color: #0799ff"><?php echo $comentario['coment_usr'];?></td>
                    <td class="w3-hover-shadow" style="background-color: #0799ff"><?php echo $comentario['coment_criado'];?></td>
                    <td class="w3-hover-shadow" style="background-color: #0799ff"><?php echo $comentario['id_user'];?></td>
                </tr>
                <?php
    }
    ?>
            </table>
        </div>
        <hr>
    </div>
    <!--fim do html-->
</body>

</html>