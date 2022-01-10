<?php
session_start();


?>

<!DOCTYPE html>
<html lang="pt-br">
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
            <a href="comofunciona.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-blue">COMO
                FUNCIONA</a>
            <a href="predfunciona.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-blue">COMO
                FUNCIONA PRÉ-DIAGNÓSTICO</a>
            <a href="cadastro/cadastro.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-blue">CADASTRE-SE</a>
            
                <?php 
                if(!empty($_SESSION['id'])){
                    ?>
            <a
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php echo $_SESSION['nome'] ?></a>
            <a href="login/sair.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-red">SAIR</a>
            <?php
                }else{
                    echo "<a href='login/login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>LOGIN</a>";
                }
                ?>
            <?php
                     if(!empty($_SESSION['id'])){?>
                        <a href="../profile.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Perfil de "<?= $_SESSION['nome']; ?>>
                        <?php
						echo "<img src='../img/Users/img_user".$_SESSION['id'].".png' class='w3-circle' style='height:23px;width:23px' alt='mg_user".$_SESSION['id'].".png'>";
					}else{
                        echo "<a href='../profile.php' class='w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white' title='Perfil Não Acessivel'>";
						echo "<img src='../img/Users/img_user0.png' class='w3-circle' style='height:23px;width:23px' alt='User_Empty'>";
					}
			   
                    ?>
            </a>
           
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="comofunciona.php" class="w3-bar-item w3-button w3-padding-large">COMO
                FUNCIONA</a>
            <a href="predfunciona.php" class="w3-bar-item w3-button w3-padding-large">COMO
                FUNCIONA O PRÉ-DIAGNÓSTICO</a>
            <a href="cadastro/index_cdst.html" class="w3-bar-item w3-button w3-padding-large">CADASTRE-SE</a>
            <a href="../hpt_app/View/" class="w3-bar-item w3-button w3-padding-large">BAIXAR APLICATIVO</a>
            <a href="https://coronavirus.saude.gov.br/" class="w3-bar-item w3-button w3-padding-large">COVID-19</a>
        </div>
    </div>

    <!-- Header -->
    <header class="w3-container w3-blue w3-center" style="padding:128px 16px">
        <div class="">
            <h2 class="">QUAIS AS FUNCIONALIDADES DO APLICATIVO ? </h3>
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
                            <img src="IMG/home_app.png" width="300px" height="500px" class="card-img-top"
                                alt="PAGINA INICIAL">
                            <h4 class="card-title">PAGINA INICIAL</h4>
                            <p class="card-text">Na pagina inicial você encontrará os botões que o direcionam as
                                funcionalidades do site. </p>
                            <h5> BOTÕES:</h5>

                            <p> LOGIN = área de login do aplicativo</p>
                            <p> PRÉ DIAGNÓSTICO = É o coração do app e onde o usuário pode realizar a pesquisa para
                                aproxima-lo das doenças que o mesmo pode estar infectado.
                            <p> CONTATOS = Aqui o levará a tabela com números de emergencia.</p>
                            <p> PERFIL = Link para o perfil com os dados de usuário </p>
                            <p> COVID-19 = Leva para o site oficial do ministerio de sáude </p>
                            <p> SIDENAV = Menu Lateral Contendo Foto e nome do usuario, e outros atalhos</p>
                        </div>
                    </div>
                    <div class="w3-container w3-pale-green w3-cell">
                        <div class="card-body">
                            <br>
                            <img src="IMG/contacts.png" width="300px" height="500px" class="card-img-top"
                                alt="CARREGANDO...">
                            <h5 class="card-title">CONTATOS DE EMERGÊNCIA</h5>
                            <p class="card-text"><br>Acesso á vários contatos de emergência acessiveis em offline para
                                ciência do úsuario utilizar em certos casos</p>
                        </div>
                    </div>
                    <div class="w3-container w3-pale-green w3-cell">
                        <div class="card-body">
                            <br>
                            <img src="IMG/login.png" width="300px" height="500px" class="card-img" alt="CARREGANDO...">
                            <h4 class="card-title">ÁREA DE LOGIN</h4>
                            <p class="card-text">Aqui na área de Login o usuário pode acessar sua conta e ter melhor uso
                                do app ja com seus dados salvos.</p>
                            <h5> COMO REALIZAR O LOGIN ? </h5>

                            <p> 1. Realize o Cadastro no site do : <a href=""> CADASTRO </a>
                            <p> 2. Com o Cadastro ja efetuado adicione nos campos seus dados cadastrados </p>
                            <p> 3. Clique no Botão login.</p>

                            <p> Qualquer erro nos envie no email: hippotec2021@etec.sp.gov.br</p>
                        </div>
                    </div>
                </div>
                <div class="w3-cell-row">
                    <div class="w3-container w3-cell w3-pale-green">

                        <div class="card-body">
                            <br>
                            <img src="IMG/about.png" width="300px" height="500px" class="card-img" alt="sobre">
                            <h4 class="card-title">SOBRE</h4>
                            <p class="card-text">Aqui na área de informações o usuário pode entender um pouco do nosso
                                projeto e da origem do nome e da ideia por trás de tudo.</p>
                            <h5> QUER SABER MAIS DA EMPRESA ? </h5>

                            <p> ACESSE O SITE DA NOSSA EMPRESA <a href="../index.php"> HIPPOTEC.COM
                                </a>
                                <hr>

                        </div>
                    </div>
                    <div class="w3-container w3-cell w3-pale-green">
                        <div class="card-body">
                            <br>
                            <img src="IMG/menu_leftside.png" width="300px" height="500px" class="card-img"
                                alt="sidenav">
                            <h4 class="card-title">SIDENAV</h4>
                            <p class="card-text">O sidenav contém a imagem do usuário e outros botões.</p>
                            <h5> BOTÕES: </h5>
                            <h6> DOENÇAS = Contém uma lista para acessar informações de algumas doenças </h6>
                            <h6> SOBRE = Contém informações sobre a empresa e o app </h6>
                        </div>
                    </div>
                    <div class="w3-container w3-cell w3-pale-green">
                        <div class="card-body">
                            <img src="IMG/quiz_home.png" width="300px" height="500px" class="card-img" alt="doe2">
                            <h4 class="card-title">Pré diagnóstico: </h4>
                            <h6>Descrição Do prediagnostico</h6>
                            <h6>Descrição Do prediagnostico</h6>
                            <h6>Descrição Do prediagnostico</h6>

                        </div>
                    </div>
                </div>
                <div class="w3-cell-row">
                    <div class="w3-container w3-cell w3-pale-green">
                        <div class="card-body">
                            <br>
                            <img src="IMG/doenca01.png" width="300px" height="500px" class="card-img" alt="doe1">

                            <h4 class="card-title">DOENÇAS</h4>
                            <p class="card-text">Zona com informações de doenças listadas em ordem alfabética</p>
                            <h6> Na primeira página você encontra a lista alfabética para acessar as doenças </h6>
                            
                           

                        </div>
                    </div>
                    <div class="w3-container w3-cell w3-pale-green">
                        <div class="card-body">
                            <img src="IMG/doenca02.png" width="300px" height="500px" class="card-img" alt="doe2">
                            <h4 class="card-title">DOENÇAS</h4>
                            <h6> A partir da letra selecionada poderá selecionar a doença que contém uma informação
                                superficial a mostra </h6>
                        </div>


                    </div>
                    <div class="w3-container w3-cell w3-pale-green">
                        <div class="card-body">
                            <img src="IMG/doenca03.png" width="300px" height="500px" class="card-img" alt="doe2">
                            <h4 class="card-title">DOENÇAS</h4>                           
                            <h6> Cada doença é acessivel para exibir maiores informações </h6>

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
        <p>Powered by <a href="https://www.linkei.com.br/dieguesmosken" target="_blank">@dieguesmosken @AntonyTheTenshi-
                HIPPOTEC2021</a></p>
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