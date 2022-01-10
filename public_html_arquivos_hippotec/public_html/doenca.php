<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<title>DOE TABLE</title>
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
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">TABELA DOENÇAS</a>
            <a href="#imagens_sobre" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">SOBRE
                NÓS</a>

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
            <h2 class="">TABELA DOENÇAS</h3>

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
                        <a href="doeA.php">
                            <img src="img/letter/letterA.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">A</span><br>
                                <span>Lista de doenças A</span>
                            </div>
                        </a>
                    </li>
                    <li class="w3-bar">

                        <img src="img/letter/letterD.png" class="w3-bar-item w3-square" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large">D</span><br>
                            <span>Lista de doenças D</span>
                        </div>
                    </li>
                    <li class="w3-bar">

                        <img src="img/letter/letterG.png" class="w3-bar-item w3-square" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large">G</span><br>
                            <span>Lista de doenças G</span>
                        </div>
                    </li>
                    <li class="w3-bar">

                        <img src="img/letter/letterJ.png" class="w3-bar-item w3-square" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large">J</span><br>
                            <span>Lista de doenças J</span>
                        </div>
                    </li>
                    <li class="w3-bar">

                        <img src="img/letter/letterM.png" class="w3-bar-item w3-square" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large">M</span><br>
                            <span>Lista de doenças M</span>
                        </div>
                    </li>
                    <li class="w3-bar">

                        <img src="img/letter/letterP.png" class="w3-bar-item w3-square" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large">P</span><br>
                            <span>Lista de doenças P</span>
                        </div>
                    </li>
                    <li class="w3-bar">

                        <img src="img/letter/letterS.png" class="w3-bar-item w3-square" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large">S</span><br>
                            <span>Lista de doenças S</span>
                        </div>
                    </li>
                    <li class="w3-bar">

                        <img src="img/letter/letterV.png" class="w3-bar-item w3-square" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large">V</span><br>
                            <span>Lista de doenças V</span>
                        </div>
                    </li>
                    <li class="w3-bar">

                        <img src="img/letter/letterY.png" class="w3-bar-item w3-square" style="width:85px">
                        <div class="w3-bar-item">
                            <span class="w3-large">Y</span><br>
                            <span>Lista de doenças Y</span>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="w3-cell-row">
                <div class="w3-cell">
                    <ul class="w3-ul w3-xlarge">
                        <li class="w3-bar">
                            <a href="doeB.php">
                                <img src="img/letter/letterB.png" class="w3-bar-item w3-square" style="width:85px">
                                <div class="w3-bar-item">
                                    <span class="w3-large">B</span><br>
                                    <span>Lista de doenças B</span>
                                </div>
                            </a>
                        </li>
                        <li class="w3-bar">

                            <img src="img/letter/letterE.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">E</span><br>
                                <span>Lista de doenças E</span>
                            </div>
                        </li>
                        <li class="w3-bar">

                            <img src="img/letter/letterH.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">H</span><br>
                                <span>Lista de doenças H</span>
                            </div>
                        </li>
                        <li class="w3-bar">

                            <img src="img/letter/letterK.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">K</span><br>
                                <span>Lista de doenças K</span>
                            </div>
                        </li>
                        <li class="w3-bar">

                            <img src="img/letter/letterN.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">N</span><br>
                                <span>Lista de doenças N</span>
                            </div>
                        </li>
                        <li class="w3-bar">

                            <img src="img/letter/letterQ.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">Q</span><br>
                                <span>Lista de doenças Q</span>
                            </div>
                        </li>
                        <li class="w3-bar">

                            <img src="img/letter/letterT.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">T</span><br>
                                <span>Lista de doenças T</span>
                            </div>
                        </li>
                        <li class="w3-bar">

                            <img src="img/letter/letterW.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">W</span><br>
                                <span>Lista de doenças W</span>
                            </div>
                        </li>
                        <li class="w3-bar">

                            <img src="img/letter/letterZ.png" class="w3-bar-item w3-square" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large">Z</span><br>
                                <span>Lista de doenças Z</span>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="w3-cell-row">
                    <div class="w3-cell">
                        <ul class="w3-ul w3-xlarge">
                            <li class="w3-bar">
                                <a href="doeC.php">
                                    <img src="img/letter/letterC.png" class="w3-bar-item w3-square" style="width:85px">
                                    <div class="w3-bar-item">
                                        <span class="w3-large">C</span><br>
                                        <span>Lista de doenças C</span>
                                    </div>
                                </a>
                            </li>

                            <li class="w3-bar">

                                <img src="img/letter/letterF.png" class="w3-bar-item w3-square" style="width:85px">
                                <div class="w3-bar-item">
                                    <span class="w3-large">F</span><br>
                                    <span>Lista de doenças F</span>
                                </div>
                            </li>
                            <li class="w3-bar">

                                <img src="img/letter/letterI.png" class="w3-bar-item w3-square" style="width:85px">
                                <div class="w3-bar-item">
                                    <span class="w3-large">I</span><br>
                                    <span>Lista de doenças I</span>
                                </div>
                            </li>
                            <li class="w3-bar">
                                <a href="doeL.php">
                                    <img src="img/letter/letterL.png" class="w3-bar-item w3-square" style="width:85px">
                                    <div class="w3-bar-item">
                                        <span class="w3-large">L</span><br>
                                        <span>Lista de doenças L</span>
                                    </div>
                                </a>
                            </li>
                            <li class="w3-bar">

                                <img src="img/letter/letterO.png" class="w3-bar-item w3-square" style="width:85px">
                                <div class="w3-bar-item">
                                    <span class="w3-large">O</span><br>
                                    <span>Lista de doenças O</span>
                                </div>
                            </li>
                            <li class="w3-bar">

                                <img src="img/letter/letterR.png" class="w3-bar-item w3-square" style="width:85px">
                                <div class="w3-bar-item">
                                    <span class="w3-large">R</span><br>
                                    <span>Lista de doenças R</span>
                                </div>
                            </li>
                            <li class="w3-bar">

                                <img src="img/letter/letterU.png" class="w3-bar-item w3-square" style="width:85px">
                                <div class="w3-bar-item">
                                    <span class="w3-large">U</span><br>
                                    <span>Lista de doenças U</span>
                                </div>
                            </li>
                            <li class="w3-bar">
                                <a href="">
                                    <img src="img/letter/letterX.png" class="w3-bar-item w3-square" style="width:85px">
                                    <div class="w3-bar-item">
                                        <span class="w3-large">X</span><br>
                                        <span>Lista de doenças X</span>
                                    </div>
                            </li>
                            </a>
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