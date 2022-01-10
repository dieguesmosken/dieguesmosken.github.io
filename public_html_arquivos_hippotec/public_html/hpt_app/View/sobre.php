<?php
session_start();

	
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/ionic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mobileui/style.css" />
    <style>
    a {
        text-decoration: none;
    }
    </style>

    <title>Sobre APP</title>

</head>

<body style="background-color: PaleTurquoise">

    <!-- Botões MenuShape Menu Superior  -->
    <div class="container">
        <div class="app">

            <ul class="menubar">
                <li><a class="active" href="javascript:void(0)" onclick="openNav()"><i class="fas fa-bars"
                            style="color: Teal;"></i></a></li>

                <li><a href="index.php"><i class="fas fa-h-square"></i></li>



            </ul>
            <!-- Menu Lateral-->
            <div class="sidenav" id="sidenav">
                <div class="sidenavshape"></div>
                <div class="profile">
                    <?php
                     if(!empty($_SESSION['id'])){
						echo "<br><img src='../img/User/img_user".$_SESSION['id'].".png' class='img_personal1'  alt='mg_user".$_SESSION['id'].".png'>";
					}else{
						echo "<br><img src='../img/User/img_user0.png' class='img_personal1' alt='User_Empty'>";
					}
			   
                    ?>
                    <h3 style="color:white;">SOBRE</h3>
                </div>
                <!-- Itens do Menu Lateral  -->
                <div class="clearfix"></div>
                <ul>
                    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i
                                class="fas fa-times"></i></a></li>
                    <?php
                     if(!empty($_SESSION['id'])){
						echo "<li><a href='#'>".$_SESSION['nome']."</a></li>";
					}else{
						echo "<li><a href='#'>Não logado</a></li>";
					}
			   
                    ?>


                    <?php if (!empty($_SESSION['nome'])) {
                        if($_SESSION['tipousr'] == 1){
                            echo "<li><a href='administrativo.php'>Painel Administrativo</a></li>";
                        }
                        else{

                        }
                    }else{
                       echo  "<li><a href='Login/login.php'>Faça o login</a></li>";
                    }?>

                    <li><a href="Termos/politica.php"> Termos </a></li>
                    <li><a href="Doenca/doenca.php"> DOENÇAS </a></li>
                    <li><a href="index.php"> INICIO </a></li>
                    <li><a onclick="href='sair.php'"><i class="fas fa-sign-out-alt"></i>Sair</a></li>
                </ul>
            </div>
            <div class="news">



                <br>
               
                <p class="text-strong"> Sobre o Aplicativo: </p>
                    <div class="item" style="border: 1px solid">
                        <img class="left circle avatar" width="50px" height="50px" src="../img/icon_v2_preview.png">
                        <h1>Hippotec Versão 1.3.1</h1>
                        <p> > Corrigida pagina de Cadastro</p>
                    </div>

                
                <br>
                <p class="text-strong"> Desenvovedores: </p>
                <div class="item" style="border: 1px solid">
                    <img class="left circle avatar" width="50px" height="50px" src="../img/User/img_user1.png">
                    <h1>&nbsp; Matheus Mosken Diegues</h1>
                    <p>&nbsp;Back-End</p>
                </div>
                <div class="item" style="border: 1px solid">
                    <img class="left circle avatar" width="50px" height="50px" src="../img/User/img_user3.png">
                    <h1>&nbsp; Bruno Taiki Sadano Chiga</h1>
                    <p>&nbsp; Front-End, Back-End e Docs</p>
                </div>
                <div class="item" style="border: 1px solid">
                    <img class="left circle avatar" width="50px" height="50px" src="../img/User/img_user5.png">
                    <h1>&nbsp; George Antony dos Santos</h1>
                    <p>&nbsp; Design</p>
                </div>
                <br>
                <br>
                




            </div>

            <div class="row">

                <div class="col">
                    <h6 class='h5 underline highlight' style='text-align: center;'><a href="../../hpt_CRUD/index.php">
                    &nbsp; &nbsp;  Hippotec 2021 &copy;</a></h6>
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
</body>

</html>