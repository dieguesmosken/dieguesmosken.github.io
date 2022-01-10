<?php
session_start();
if(!empty($_SESSION['id'])){
	
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

    <title>Perfil</title>

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
						echo "<br><img src='../img/User/img_user".$_SESSION['id'].".png' class='img_personal1' width='50%' height='50%' alt='mg_user".$_SESSION['id'].".png'>";
					}else{
						echo "<br><img src='../img/User/img_user0.png' width='50%' height='50%' alt='User_Empty'>";
					}
			   
                    ?>
                    <h3 style="color:white;">PERFIL</h3>
                </div>
                <!-- Itens do Menu Lateral  -->
                <div class="clearfix"></div>
                <ul>
                    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i
                                class="fas fa-times"></i></a></li>
                    <li><a href="#"><?php echo $_SESSION['nome'];?></a></li>

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
                    <li><a href="sobre.php"> SOBRE </a></li>
                    <li><a href="index.php"> INICIO </a></li>
                    <li><a onclick="href='sair.php'"><i class="fas fa-sign-out-alt"></i>Sair</a></li>
                </ul>
            </div>
            <div class="news">
                <?php
                echo "<h2 class='h5 underline highlight' style='text-align: center;'>".$_SESSION['nome']."</h2>";
                ?>
                <br>
                <div class="news">

                    <div class="personal1"><?php
                  
                        
                    
                        if(!empty($_SESSION['id'])){
                            echo "<br><img src='../img/User/img_user".$_SESSION['id'].".png' class='img_personal2' width='50%' height='50%' alt='img_user".$_SESSION['id'].".png'>";
                        }else{
                            echo "<br><img src='../img/User/img_user0.png' class='img_personal2' alt='User_Empty'>";
                        }
                   
                    ?>
                    </div>
                    <ul>


                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <?php
                        echo "<li><p><b>ID <i class='fas fa-key'></i>: </b>".$_SESSION['id']."</p></li>";
                        ?>
                                </div>

                                <div class="col">
                                    <?php
                        echo "<li><p><b>DTNasc <i class='fas fa-calendar-alt'></i>: </b>".$_SESSION['dtnasc']."</p></li>";
                        ?>
                                </div>
                                <div class="col">
                                    <?php
                        if($_SESSION['tipousr'] == 1){
                            echo "<li><p><b>Tipo <i class='fas fa-user-shield'></i>: </b>".$_SESSION['tipousr']." - Usuario Administador</p></li>";
                           
                        }else{
                            echo "<li><p><b>Tipo <i class='fas fa-user-cog'></i>: </b>".$_SESSION['tipousr']." - Usuario Comum</p></li>";
                           
                        }
                        ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php
                        echo "<li><p><b>Nome <i class='fas fa-user'></i>: </b>".$_SESSION['nome']."</p></li>";
                        ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php
                        echo "<li><p><b>Email <i class='fas fa-envelope'></i>: </b>".$_SESSION['email']."</p></li>";
                        ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php
                        echo "<li><p><b>Cpf <i class='fas fa-code'></i>: </b>".$_SESSION['cpf_usr']."</p></li>";
?>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-info"><a href="Login/sair.php">Sair</button>
                                </div>

                            </div>

                        </div>


                    </ul>
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
<?php
}else{
	$_SESSION['msg'] = "Usuario não logado - Faça seu login";
	header("Location: Login/login.php");	
}
?>