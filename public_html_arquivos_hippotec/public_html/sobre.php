<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<title>Sobre Hippotec</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">HOME</a>
            <a href="#imagens_sobre" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">SOBRE NÓS</a>
            <a href="doenca.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">TABELA DOENÇAS</a>
            <a href="View/Login/cadastro.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">CADASTRO</a>
            <a href="https://coronavirus.saude.gov.br/"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COVID-19</a>
            <?php 
                if(!empty($_SESSION['id'])){
                    ?>
            <a
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php echo $_SESSION['nome'] ?></a>
            <a href="View/Login/sair.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-red">SAIR</a>
            <?php
                }else{
                    echo "<a href='View/Login/login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>LOGIN</a>";
                }
                ?>
            <?php
                     if(!empty($_SESSION['id'])){?>
                        <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Perfil de <?= $_SESSION['nome']; ?>">
                        <?php
						echo "<img src='img/Users/img_user".$_SESSION['id'].".png' class='w3-circle' style='height:25px;width:25px' alt='mg_user".$_SESSION['id'].".png'>";
					}else{
                        echo "<a href='profile.php' class='w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white' title='Perfil Não Acessivel'>";
						echo "<img src='img/Users/img_user0.png' class='w3-circle' style='height:25px;width:25px' alt='User_Empty'>";
					}
			   
                    ?>
            </a>

        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <a href="#imagens_sobre" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
            <a href="sobre.html" class="w3-bar-item w3-button w3-padding-large">Sobre</a>
            <a href="#imagens_sobre" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
            <a href="#imagens_sobre" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
        </div>
    </div>

    <!-- Header -->
    <header class="w3-container w3-blue w3-center" style="padding:128px 16px">
        <div class="">
            <h2 class="">QUEM NÓS SOMOS ? </h3>
                <h5 class="">Nos somos tres amigos programadores ja faz um tempo e vamos nos apresentar um de cada vez:
                </h5>
        </div>
    </header>

    <!-- First Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="w3-twothird">

                <div class="w3-cell-row" id="imagens_sobre">
                    <div class="w3-container w3-green w3-cell">

                        <div class="card-body">
                            <br>
                            <img src="img/Users/bruno2.png" width="300px" height="300px" class="card-img-top"
                                alt="imagem não encontrada">
                            <h5 class="card-title">BRUNO TAIKI SADANO CHIGA</h5>
                            <p class="card-text">Olá, sou um jovem desenvolvedor, técnico em programação, viciado gamer
                                de fps e skatista na maior parte do tempo, tenho 17 anos e espero que gostem do site que
                                estamos projetando.</p>
                            <a href="https://www.instagram.com/bruno.chiga/" class="w3-btn">CONTATO PESSOAL</a>
                        </div>
                    </div>

                    <div class="w3-container w3-cell w3-pale-green">

                        <div class="card-body">
                            <br>
                            <img src="https://techprofile.blob.core.windows.net/images/wN1pN_9UIUykGBT3ETThnw.png?8D917E"
                                width="300px" height="300px" class="card-img-top" alt="imagem não encontrada">

                            <h5 class="card-title">Matheus Mosken Diegues</h5>
                            <p class="card-text">Bem, eu tenho 18 anos e desde pequeno sou um grande entusiasta de
                                tecnologia,tbm sou antenista, estudante de desenvolvimento de sistemas e tecnico em
                                manutenção de
                                computadores.</p>
                            <a href="https://www.linkei.com.br/dieguesmosken" class="w3-btn">CONTATO PESSOAL</a>
                        </div>
                    </div>
                    <div class="w3-container w3-cell w3-red">
                        <div class="card-body">
                            <br>
                            <img src="img/george.png" width="300px" height="300px" class="card-img-top"
                                alt="imagem não encontrada">
                            <h5 class="card-title">George Antony Oliveira</h5>
                            <p class="card-text"><br>Hello, venho aqui me apresentar, com 16 anos sou um jovem
                                programador, viciado em musica, principalmente em rock,
                                gótico e com muitas ideias para expor e colocar em pratica.</p>
                            <a href="https://www.instagram.com/antonytenshi/?hl=pt-br" target="_blank"
                                class="w3-btn">CONTATO PESSOAL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
        <h1 class="w3-margin w3-xlarge">Hippotec &copy; 2021</h1>
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
        <p>Powered by <a href="https://www.linkei.com.br/dieguesmosken" target="_blank">@dieguesmosken</a></p>
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