<?php 
session_start();
?>
<html>

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

</head>

<body style="background-color: PaleTurquoise">

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
                        echo "<br><img src='../img/User/img_user".$_SESSION['id'].".png' class='img_personal1' alt='img_user".$_SESSION['id'].".png'>";
                    }else{
                        echo "<br><img src='../img/User/img_user0.png class='img_personal1' alt='User_Empty'>";
                    }
               
                    ?>

                    <h4 style="color:white;">CONTATOS</h4>
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
                            echo "<li><a href='administrativo.php'>Painel Administrativo</a></li>";
                        }
                        else{

                        }
                    }else{
                       echo  "<li><a href='login.php'>Faça o login</a></li>";
                    }?>


                    <li><a href="profile.php"> PERFIL </a></li>
                    <li><a href="Doenca/doenca.php"> DOENÇAS </a></li>
                    <li><a href="sobre.php"> SOBRE </a></li>
                    <li><a href="Termos/politica.php"> Termos </a></li>
                    <li><a href="index.php" onclick="href='sair.php'"><i class="fas fa-sign-out-alt"></i>
                            Sair</a></li>
                </ul>
				</div>
            </div>
            <div class="news">
                <div class="col-12 texto_arredondado" style="background-color: #00BFEE ;" >
                    <br>
                    <hr>
                    
                    <h1 class="h6">CONTATOS DE EMERGÊNCIA</h1>
                    <hr>
                    <br>
                    <table class="table table-sm table-bordered table-hover">
                        <caption style="color: Indigo"> SERVIÇOS 24H</caption>
                        <thead>
                            <tr>
                                <th>SERVIÇO</th>
                                <th>NÚMERO</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>SAMU</th>
                                <td>192</td>

                            </tr>
                            <tr>
                                <th>POLICIA MILITAR</th>
                                <td>190</td>

                            </tr>
                            <tr>
                                <th>CORPO DE BOMBEIROS</th>
                                <td>193</td>

                            </tr>
                            <tr>
                                <th>DEFESA CIVIL</th>
                                <td>199</td>

                            </tr>
                            <tr>
                                <th>CVV</th>
                                <td>188</td>


                            </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
</body>
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