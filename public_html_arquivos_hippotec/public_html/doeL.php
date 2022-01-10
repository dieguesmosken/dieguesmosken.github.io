<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<title>DOE TABLE TESTE</title>
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
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">DOE TESTE</a>
            <a href="doenca.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">TABELA
                DOENÇAS</a>

            <a href="view/Login/cadastro.php"
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
            <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white"
                title="Perfil de <?= $_SESSION['nome'] ?>">
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
            <h2 class="">LISTA DOENÇAS C</h3>

        </div>
    </header>
    <!--    <li class="w3-bar">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-bar-item w3-button w3-xlarge w3-right">&times;</span>
                <img src="img/Users/img_user0.png" class="w3-bar-item w3-circle" style="width:85px">
                <div class="w3-bar-item">
                    <span class="w3-large">Mike</span><br>
                    <span>Web Designer</span>
                </div>
            </li>

     First Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container">

        <div class="w3-cell-row">
            <div class="w3-cell">
                <ul class="w3-ul w3-xlarge">
                    <li class="w3-bar">


                        <div class="w3-bar-item">
                            <img src="img/letter/letterL.png" class="w3-bar-item w3-square" style="width:85px">
                            <br><span class="w3-large">LOREM IPSUM</span><br>
                            <span>
                                <p class="opacity-60">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget magna sed metus
                                    facilisis convallis in quis dui. Curabitur in dolor ipsum. Pellentesque ipsum
                                    tellus, dapibus ut purus sed, luctus tincidunt lacus. Nulla aliquet mi quam, sit
                                    amet cursus dui pulvinar finibus. Etiam nulla elit, accumsan eu odio ut, ullamcorper
                                    condimentum sem.
                                </p>
                            </span>

                        </div>
                        </a>
                    </li>
                </ul>

                <ul class="w3-ul w3-xlarge">
                    <li class="w3-bar">

                        <div class="w3-bar-item">
                            <img src="img/letter/letterL.png" class="w3-bar-item w3-square" style="width:85px">


                            <br><span class="w3-large">OREM IPSUM</span><br>
                            <span>
                                <p class="opacity-60">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                    eget magna sed metus
                                    facilisis convallis in quis dui. Curabitur in dolor ipsum. Pellentesque ipsum
                                    tellus, dapibus ut purus sed, luctus tincidunt lacus. Nulla aliquet mi quam, sit
                                    amet cursus dui pulvinar finibus. Etiam nulla elit, accumsan eu odio ut, ullamcorper
                                    condimentum sem.</p>


                            </span>
                        </div>
                    </li>
                </ul>

                <ul class="w3-ul w3-xlarge">
                    <li class="w3-bar">

                        <div class="w3-bar-item">
                            <img src="img/letter/letterL.png" class="w3-bar-item w3-square" style="width:85px">


                            <br><span class="w3-large">OREM IPSUM</span><br>

                            <span>
                                <p class="opacity-60">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget magna sed metus
                                    facilisis convallis in quis dui. Curabitur in dolor ipsum. Pellentesque ipsum
                                    tellus, dapibus ut purus sed, luctus tincidunt lacus. Nulla aliquet mi quam, sit
                                    amet cursus dui pulvinar finibus. Etiam nulla elit, accumsan eu odio ut, ullamcorper
                                    condimentum sem.</p>
                            </span>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>








    </div>



    <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
        <h1 class="w3-margin w3-xlarge">Hippotec &copy; 2021</h1>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity">

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