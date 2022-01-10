<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<title>EMPRESA</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<script src="https://kit.fontawesome.com/e1fb4913e4.js" crossorigin="anonymous"></script>
<style>
body,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Lato", sans-serif
}

.w3-bar,
h1,
button {
    font-family: "Montserrat", sans-serif
}

.fa-anchor,
.fa-ambulance,
.fa-coffee {
    font-size: 200px
}
</style>

<body>

    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-blue w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-#00BFFF"
                href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">HOME</a>
            <a href="sobre.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">SOBRE
                NÓS</a>
            <a href="siteapp/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large">SITE APP</a>

            <?php if (!empty($_SESSION['nome'])) {
                        if($_SESSION['tipousr'] == 1){
                            echo "<a href='View/index.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-yellow'>PAINEL ADM</a>";
                        }
                        else{

                        }
                    }else{
                      
                    }?>


            <a href="View/Login/cadastro.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">CADASTRO</a>
            <a href="https://coronavirus.saude.gov.br/" target="_blank"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COVID-19</a>
            <!-- #Lançamento Futuro <a href="/error/307?OriginPage=How-It-Works" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COMO
                FUNCIONA</a>-->
            <?php 
                if(!empty($_SESSION['id'])){
                    echo "<a class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>".$_SESSION['nome']."</a>";
                    echo "<a href='View/Login/sair.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-red'>Sair</a>";
                    
                }else{
                    echo "<a href='View/Login/login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>LOGIN</a>";
                }
                ?>


            <?php
                     if(!empty($_SESSION['id'])){?>
            <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white"
                title="Perfil de <?= $_SESSION['nome'] ?>">
                <?php
						echo "<img src='Img/Users/img_user".$_SESSION['id'].".png' class='w3-circle' style='height:25px;width:25px' alt='Img_user".$_SESSION['id'].".png'>";
					}else{
                        echo "<a href='profile.php' class='w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white' title='Perfil Não Acessivel'>";
						echo "<img src='Img/Users/img_user0.png' class='w3-circle' style='height:25px;width:25px' alt='User_Empty'>";
					}
			   
                    ?>
            </a>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">

            <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="sobre.php" class="w3-bar-item w3-button w3-padding-large">SOBRE NÓS</a>
            <a href="siteapp/index.php" class="w3-bar-item w3-button w3-padding-large">SITE APLICATIVO</a>

            <?php if (!empty($_SESSION['nome'])) {
                        if($_SESSION['tipousr'] == 1){
                            echo "<a href='View/index.php' class='w3-bar-item w3-button w3-padding-large w3-hover-yellow'>PAINEL ADM</a>";
                        }
                        else{

                        }
                    }else{
                      
                    }?>


            <a href="View/Login/cadastro.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">CADASTRO</a>
            <a href="https://coronavirus.saude.gov.br/"
                class="w3-bar-item w3-button w3-padding-large w3-hover-white">COVID-19</a>
            <!-- #Lançamento Futuro <a href="/error/307?OriginPage=How-It-Works" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COMO
                FUNCIONA</a>-->
            <?php 
                if(!empty($_SESSION['id'])){
                    echo "<a class='w3-bar-item w3-button w3-padding-large w3-hover-white'>".$_SESSION['nome']."</a>";
                    echo "<a href='view/login/sair.php' class='w3-bar-item w3-button w3-padding-large w3-hover-red'>Sair</a>";
                    
                }else{
                    echo "<a href='view/login/login.php' class='w3-bar-item w3-button w3-padding-large w3-hover-white'>LOGIN</a>";
                }
                ?>
        </div>
    </div>

    <!-- Header -->
    <header class="w3-container w3-blue w3-center" style="padding:128px 16px">
        <h1 class="w3-margin w3-jumbo">BEM VINDO!</h1>

        <p class="w3-xlarge">MAIS SAÚDE PARA VOCÊ</p>
        <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top"><a href="hpt_app/View/"
                style="text-decoration:none">BAIXE O APP</a></button>
    </header>

    <!-- First Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="w3-twothird">
                <h1>HIPPOTEC</h1>
                <h5 class="w3-padding-32">A Hippotec é uma empresa voltada para a inovação digital dentro da medicina, a
                    nossa idéia é tornar mais fácil a prevenção de contágios e crescimento de doenças na sociedade,
                    assim como a disseminação de conhecimento da área, ajudando a construir um mundo mais saudavel,
                    inteligente e curioso.</h5>


            </div>

            <div class="w3-third w3-center">
                <i class="fa fa-ambulance w3-padding-64 w3-text-blue"></i>
            </div>
        </div>
    </div>

    <!-- Second Grid -->
    <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="w3-third w3-center">
                <i class="fa fa-coffee w3-padding-64 w3-text-blue w3-margin-right"></i>
            </div>

            <div class="w3-twothird">
                <h1>QUAL O INTUITO DO APLICATIVO ?</h1>
                <h5 class="w3-padding-32">Percebendo as dificuldades enfrentadas entre os médicos e pacientes em
                    diagnosticar doenças, desenvolvemos um aplicativo de pré-diagnostico, onde o usuário insere os seus
                    sintomas e uma pesquisa mostra para o usuário quais possíveis doenças</h5>

                <p class="w3-text-grey">HIPPOTEC PROCURA APROXIMAR A INFORMAÇÃO PARA O CIDADÃO E O DISTANCIAR DOS
                    RISCOS.</p>
            </div>
        </div>
    </div>

    <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
        <h1 class="w3-margin w3-xlarge"><a href="">Hippotec 2021 &copy;</a></h1>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity">
        <div class="w3-xlarge w3-padding-32">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
        <p>Powered by <a href="https://www.linkei.com.br/dieguesmsoken" target="_blank">Dieguesmosken &copy;</a></p>
    </footer>

    <script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
    </script>

</body>

</html>