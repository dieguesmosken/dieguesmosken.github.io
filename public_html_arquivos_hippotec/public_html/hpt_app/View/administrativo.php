<?php
session_start();
if(!empty($_SESSION['id'])){
	
?>
<!DOCTYPE html>

<html>

<head>
   <meta charset="utf-8" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/ionic.css">
    

    <title>Hippotec</title>
    <script type="text/javascript" src="../js/jquery.js"></script>
 
</head>

<body>
    <div class="bar bar-hearder bar-calm" style="margin-bottom: 80px;">
        
        <ul>
            <li><a href="index.php" class="button button-clear">Home</a></li>
            <li><h1 class="title">Hippotec cadastro</h1></li>
        </ul>
    </div>
    <br><br>
    <div class="list padding">
        
        <div class="item">
        <?php    
        echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
        echo "<a href='sair.php'>Sair</a>";
        ?>
        </div>
        <div class="item">
            <a id="insert_d" class="button button-block button-positive"  href="cdst_doe.php">Cadastrar doença</a>
        </div>
        <div class="item">
            <a id="insert_t" class="button button-block button-positive"  href="cdst_tel.php">Cadastrar Telefones</a>
        </div>
        <div class="item">
            <a id="insert_i" class="button button-block button-positive"  href="index.php">Voltar Ao Inicio</a>
        </div> 
    </div>
    <div class="bar bar-footer">
        <button class="button button-clear pull-right">@dieguesmosken - Hippotec 2020 &COPY;</button>
    </div>    
</body>

</html>





<?php
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>