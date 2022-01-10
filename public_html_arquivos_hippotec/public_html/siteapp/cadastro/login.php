<?php
session_start();


?>
	
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Login Crud</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <!-- Estilos Customizados -->
    <link href="css/signin.css" rel="stylesheet">
    <!--[bootstrap cdn]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![fim]-->
	<style type="text/css">
		body{
      /*background-image: url("imagens/423148.jpg")*/
      background-image: url("imagens/543102.jpg")
      /*background-image: url("imagens/543917.jpg")*/
      
		}
	</style>
  </head>
  <body>
	<div class="container">
  <?php 



?>
      <form class="form-signin" method="POST" action="valida.php">
        <h2 class="form-signin-heading">Faça o Login: </h2>
        <input type="text" disabled class="form-control" value="<?php echo $_SESSION['msg'] ?>">
        <label for="email" class="sr-only">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Seu E-mail" >
        <label for="senha" class="sr-only">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" >
        <br>
        <input id="btnLogin" name="btnLogin" class="btn btn-lg btn-primary btn-block" type="submit" value="Fazer Login">
        <input id="btnVoltar" name="btnVoltar" class="btn btn-lg btn-success btn-block" type="submit" value="Voltar ao Inicio">
      </form>
<?php  ?>
    </div> <!-- /container -->
	
	
	
	
    <!-- jQuery (necessario para plugins Bootstrap's JavaScript ) -->
    <script src="js/jquery.min.js"></script>
    <!-- Inclua todos os plugins compilados (abaixo) ou inclua arquivos individuais conforme necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
