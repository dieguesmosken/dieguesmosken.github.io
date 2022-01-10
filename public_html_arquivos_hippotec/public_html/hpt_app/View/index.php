<?php

session_start();
	?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width">
    <title>APLICATIVO </title>
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/ionic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mobileui/style.css" />

    <link rel="stylesheet" type="text/css" href="../css/index4botoes.css" />
</head>

<body style="background-color: PaleTurquoise">
    <!-- Botões MenuShape Menu Superior  -->
    <div class="container">

        <div class="app">

            <h2 class="h4" style="text-align: center;">HIPPOTEC</h2>
            <ul class="menubar">
                <li><a class="active" href="javascript:void(0)" onclick="openNav()"><i class="fas fa-bars"
                            style="color: Teal;"></i></a></li>
                <li><a href="index.php"><i class="fas fa-h-square"></i></a></li>
                <!--<button type="button" class="btn btn-info btn-sm"><a href="login.php">LOGIN</button>-->
                <?php if (!empty($_SESSION['nome'])) {
                        
                        echo  "<button type='button' class='btn btn-danger btn-sm'><a href='Login/sair.php'>SAIR</button>";
                 
                    }else{
                       echo  "<button type='button' class='btn btn-info btn-sm'><a href='Login/login.php'>LOGIN</button>";
                    } ?>
            </ul>
            <!-- Menu Lateral-->
            <div class="sidenav" id="sidenav">
                <div class="sidenavshape"></div>
                <div class="profile">
                    <?php
                     if(!empty($_SESSION['id'])){
                        echo "<br><img src='../img/User/img_user".$_SESSION['id'].".png' class='img_personal1' alt='img_user".$_SESSION['id'].".png'>";
                    }else{
                        echo "<br><img src='../img/User/img_user0.png' class='img_personal1' alt='User_Empty'>";
                    }
               
                    ?>

                    <h3 style="color:white;">HOME</h3>
                </div>
                <!-- Itens do Menu Lateral  -->
                <div class="clearfix"></div>
                <ul>

                    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i
                                class="fas fa-times"></i></a></li>

                    <li><a href="#"><?php if (!empty($_SESSION['nome'])) {
                         echo $_SESSION['nome'];
                    }else{
                       echo  "Usuario Não Identificado";
                    }?></a></li>



                    <?php if (!empty($_SESSION['nome'])) {
                        if($_SESSION['tipousr'] == 1){
                            echo "<li><a href='administrativo.php'>PAINEL ADM</a></li>";
                        }
                        
                    }else{
                       echo  "<li><a href='Login/login.php'>Faça o login</a></li>";
                    }?>


                    <li><a href="profile.php"> PERFIL </a></li>
                    <li><a href="Doenca/doenca.php"> DOENÇAS </a></li>
                    <li><a href="Cadastro/cadastro.php"> CADASTRO </a></li>
                    <li><a href="sobre.php"> SOBRE </a></li>
                    <!--<li><a href="Termos/politica.php"> TERMOS</a></li>-->
                    <li><a href="../../index.php">NOSSO SITE</a></li>
                    <li><a href="index.php" onclick="href='Login/sair.php'"><i class="fas fa-sign-out-alt"></i>
                            Sair</a></li>
                </ul>
            </div>
            <div class="news">

                <div class="quadradoopcaoes_menu">

                    <div class="opcoes">

                        <div class="opcao1">

                            <a href="profile.php" class="link_opcoes">

                                <div class="zona_imagemop1">
                                    <img src="../img/perfil.png" class="imagem_opcao1">
                                </div>

                                <div class="zona_textoop1">
                                    <h3 class="titulotextoop1">PERFIL</h3>
                                    <p class="subtitulotextoop1" >Detalhes do usuario</p>

                                </div>

                            </a>

                        </div>

                        <div class="opcao2">

                            <a href="contatos.php" class="link_opcoes">

                                <div class="zona_imagemop2">
                                    <img src="../img/contato.svg" class="imagem_opcao2">
                                </div>

                                <div class="zona_textoop2">
                                    <h3 class="titulotextoop2">CONTATOS EMERGENCIA</h3>
                                    <p class="subtitulotextoop1" >Telefones Uteis</p>
                                </div>

                            </a>

                        </div>

                        <div class="opcao3">

                            <a href="../quiz/quiz.php" class="link_opcoes">

                                <div class="zona_imagemop3">
                                    <img src="../img/prediag.png" class="imagem_opcao3">
                                </div>

                                <div class="zona_textoop3">
                                    <h3 class="titulotextoop3">PRÉ-DIAGNÓSTICO</h3>
                                    <p class="subtitulotextoop1" >Questões sobre Sua Saúde</p>

                                </div>

                            </a>

                        </div>

                        <div class="opcao4">

                            <a href="https://coronavirus.saude.gov.br/" class="link_opcoes">

                                <div class="zona_imagemop4">
                                    <img src="../img/coronavirus.png" class="imagem_opcao4">
                                </div>

                                <div class="zona_textoop4">
                                    <h3 class="titulotextoop4"> COVID-19</h3>
                                    <p class="subtitulotextoop1" >Site Ministerio da Saúde</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>








    <script src="../js/jquery.min.js"></script>
    <script>
    function openNav() {
        document.getElementById("sidenav").style.width = "300px";
    }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0";
    }
    </script>

</html>
<?php

	$_SESSION['msg'] = "Seja Bem Vindo Ao Login";
	

?>