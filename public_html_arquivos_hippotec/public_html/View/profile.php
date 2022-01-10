<?php
session_start();
if(!empty($_SESSION['id'])){
$id = $_SESSION['id'];
require_once '../ComentariosController.php';
$comentarios = ComentariosController::listarTodosID($id);
include "hora.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<title>Perfil Hippotec</title>
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
</style>

<body>

    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-blue w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-#00BFFF"
                href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">HOME</a>
            <a href="#imagens_sobre" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">PERFIL</a>
            <a href="doenca.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">TABELA DOENÇAS</a>
            <a href="Login/cadastro.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">CADASTRO</a>
            <a href="https://coronavirus.saude.gov.br/"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COVID-19</a>
            <?php 
                if(!empty($_SESSION['id'])){
                    ?>
            <a
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php echo $_SESSION['nome'] ?></a>
            <a href="login/sair.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-red">SAIR</a>
            <?php
                }else{
                    echo "<a href='login/login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>LOGIN</a>";
                }
                ?>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">
                <script>
                writeclock()
                </script>
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

    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <!-- The Grid -->
        <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
                <!-- Profile -->
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container">
                        <h4 class="w3-center">Meu Perfil</h4>
                        <p class="w3-center">
                            <?php
                     if(!empty($_SESSION['id'])){
						echo "<img src='../img/Users/img_user".$_SESSION['id'].".png' class='w3-circle' style='height:106px;width:106px' alt='img_user".$_SESSION['id'].".png'>";
					}else{
						echo "<img src='../img/Users/img_user0.png' class='w3-circle' style='height:106px;width:106px' alt='User_Empty'>";
					}
			   
                    ?>



                        </p>
                        <hr>
                        <p><i class="fa fa-cog fa-fw w3-margin-right w3-text-theme"></i><?php
                        if($_SESSION['tipousr'] == 1){
                            echo $_SESSION['tipousr']." - Usuario Administador";
                           
                        }else{
                            echo $_SESSION['tipousr']." - Usuario Comum";
                           
                        }
                        
                        ?> </p>

                        <p><i class="fa fa-coffee fa-fw w3-margin-right w3-text-theme"></i>ID Do Usuario:
                            <?php echo $_SESSION['id'] ?> </p>
                        <p><i
                                class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION['email'] ?>
                        </p>
                        <p><i
                                class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION['dtnasc'] ?>
                        </p>
                    </div>
                </div>
                <br>

                <!-- Accordion -->





                <!-- Alert Box -->
                <div
                    class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
                    <span onclick="this.parentElement.style.display='none'"
                        class="w3-button w3-theme-l3 w3-display-topright">
                        <i class="fa fa-remove"></i>
                    </span>
                    <p><strong>Ola!</strong></p>
                    <p>As pessoas estão olhando para o seu perfil. Descubra quem.</p>
                </div>

                <!-- End Left Column -->
            </div>

            <!-- Middle Column -->
            <div class="w3-col m7">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>


                <div class="w3-row-padding">
                    <div class="w3-col m12">
                        <div class="w3-card w3-round w3-white">
                            <div class="w3-container w3-padding">
                                <p><i
                                        class="fa fa-code fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION['cpf_usr'] ?>
                                </p>
                                <p><i class="fa fa-key fa-fw w3-margin-right w3-text-theme"></i>
                                    <input type="password" value="<?php echo $_SESSION['pass'] ?>" id="senha">
                                    <!-- <img id="olhoo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII="/>-->
                                    <i id="olho" class="fa fa-eye fa-fw w3-margin-right w3-text-theme"></i>

                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                    <?php
                     if(!empty($_SESSION['id'])){
						echo "<img src='../img/Users/img_user".$_SESSION['id'].".png' class='w3-left w3-circle w3-margin-right' style='width:60px' alt='img_user".$_SESSION['id'].".png'>";
					}else{
						echo "<img src='../img/Users/img_user0.png' class='w3-left w3-circle w3-margin-right' style='width:60px' alt='User_Empty'>";
					}
                   
                    ?>

                    <span class="w3-right w3-opacity">ID <?php echo $_SESSION['id']; ?></span>
                    <h4><?php echo $_SESSION['nome'] ?></h4><br>
                    <hr class="w3-clear">
                    <p>
                        <?php 
                     foreach($comentarios as $comentario){
                    echo $comentario['coment_usr'];
                     }
                    ?>

                    </p>
                    <div class="w3-row-padding" style="margin:0 -16px">
                        <p><button class="w3-button w3-block w3-theme-l4"> <a target="_blank"
                                    style="text-decoration:none;" href=" <?php 
                    
                    if($_SESSION['id'] == 1){
                        echo "https://linkei.com.br/dieguesmosken";
                    }elseif($_SESSION['id'] == 3){
                        echo "https://www.instagram.com/bruno.chiga/";
                    }elseif($_SESSION['id'] == 5 || $_SESSION['id'] == 10){
                        echo "https://www.instagram.com/antonytenshi/";
                    }
                   
                    
                    ?>">Mais Info</a></button></p>
                    </div>

                </div>





                <!-- End Middle Column -->
            </div>

            <!-- Right Column -->
            <div class="w3-col m2">




                <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
                    <p>DATA CRIADO:</p>
                    <p> <?php echo $_SESSION['dtmk'];?></p>
                    <p>DATA MODIFICADO:</p>
                    <p> <?php echo $_SESSION['dtmd'];?></p>
                </div>
                <br>

                <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
                    <?php
                if($_SESSION['tipousr'] == 1){
                            echo $_SESSION['tipousr']." - ADM/Desenvolvedor";
                            echo "<p><i class='fa fa-bug w3-xxlarge'></i></p>";
                        }else{
                            echo $_SESSION['tipousr']." - Usuario Comum";
                            echo "<p><i class='fa fa-user w3-xxlarge'></i></p>";
                        }?>

                </div>

                <!-- End Right Column -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>
    <br>



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

    var senha = $('#senha');
    var olho = $("#olho");

    olho.mousedown(function() {
        senha.attr("type", "text");
    });

    olho.mouseup(function() {
        senha.attr("type", "password");
    });
    // para evitar o problema de arrastar a imagem e a senha continuar exposta, 
    //citada pelo nosso amigo nos comentários
    $("#olho").mouseout(function() {
        $("#senha").attr("type", "password");
    });
    </script>

</body>

</html>
<?php
}else{
	$_SESSION['msg'] = "Usuario Não Logado!";
	header("Location: View/Login/login.php");	
}
?>