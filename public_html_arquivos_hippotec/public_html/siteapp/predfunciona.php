<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<title>HIPPOTEC</title>
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
            <a href="comofunciona.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COMO
                FUNCIONA</a>
            <a href="../View/Login/cadastro.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">CADASTRE - SE</a>
            <a href="" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">BAIXAR APLICATIVO</a>
            <?php 
                if(!empty($_SESSION['id'])){
                    ?>
            <a
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php echo $_SESSION['nome'] ?></a>
            <a href="cadastro/sair.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-red">SAIR</a>
            <?php
                }else{
                    echo "<a href='cadastro/login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>LOGIN</a>";
                }
                ?>
            <?php
                     if(!empty($_SESSION['id'])){?>
            <a href="../profile.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white"
                title="Perfil de <?= $_SESSION['nome'] ?>">
                <?php
						echo "<img src='../img/Users/img_user".$_SESSION['id'].".png' class='w3-circle' style='height:25px;width:25px' alt='mg_user".$_SESSION['id'].".png'>";
					}else{
                        echo "<a href='../profile.php' class='w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white' title='Perfil Não Acessivel'>";
						echo "<img src='../img/Users/img_user0.png' class='w3-circle' style='height:25px;width:25px' alt='User_Empty'>";
					}
			   
                    ?>
            </a>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="comofunciona.php" class="w3-bar-item w3-button w3-padding-large">COMO FUNCIONA</a>
            <a href="../View/Login/cadastro.php" class="w3-bar-item w3-button w3-padding-large">CADASTRE - SE</a>
            <a href="" class="w3-bar-item w3-button w3-padding-large">BAIXAR APLICATIVO</a>
            <a href="https://coronavirus.saude.gov.br/" class="w3-bar-item w3-button w3-padding-large">COVID-19</a>
        </div>
    </div>

    <!-- Header -->
    <header class="w3-container w3-blue w3-center" style="padding:128px 16px">
        <div class="">
            <h2 class="">COMO FUNCIONA O PRÉ DIAGNOSTICO ? </h3>
                <h5 class=""> </h5>
        </div>
    </header>

    <!-- First Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="w3-twothird">

                <div class="w3-cell-row">
                    <div class="w3-container w3-pale-green w3-cell">

                        <div class="card-body">
                            <br>
                            <img src="IMG/quiz_home.png" width="300px" height="500px" class="card-img-top"
                                alt="PAGINA INICIAL">
                            <h4 class="card-title">PAGINA INICIAL</h4>
                            <p class="card-text">Na pagina inicial você poderá iniciar o programa </p>
                        </div>
                    </div>
                    <div class="w3-container w3-pale-green w3-cell">
                        <div class="card-body">
                            <br>
                            <img src="IMG/quiz_answer.png" width="300px" height="500px" class="card-img-top"
                                alt="PAGINA INICIAL">
                            <h4 class="card-title">AS QUESTÕES</h4>
                            <p class="card-text"> A partir das questões o programa definirá o que possivelmente você
                                tem.</p>
                        </div>
                    </div>
                    <div class="w3-container w3-pale-green w3-cell">
                        <div class="card-body">
                            <br>
                            <img src="IMG/results.png" width="300px" height="500px" class="card-img-top"
                                alt="PAGINA INICIAL">
                            <h4 class="card-title">RESULTADO</h4>
                            <p class="card-text"> Aqui será exibido o resultado que o programa resolveu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>