<?php 
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width">
    <title>Doenças 4</title>
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/ionic.css">
    <link rel="stylesheet" type="text/css" href="../../css/mobileui/style.css" />

</head>

<body style="background-color: PaleTurquoise">

    <div class="container">
        <div class="app">

            <ul class="menubar">
                <li><a class="active" href="javascript:void(0)" onclick="openNav()"><i class="fas fa-bars"
                            style="color: Teal;"></i></a></li>
                <li><a href="index.php"><i class="fas fa-h-square"></i></li>
                <li><a href="doenca3.php"><i class="fas fa-arrow-left"></i></a></li>
               

            </ul>
            <!-- Menu Lateral-->
            <div class="sidenav" id="sidenav">
                <div class="sidenavshape"></div>
                <div class="profile">
                    <?php
                     if(!empty($_SESSION['id'])){
                        echo "<br><img src='../../img/User/img_user".$_SESSION['id'].".png' class='img_personal1' alt='img_user".$_SESSION['id'].".png'>";
                    }else{
                        echo "<br><img src='../../img/User/img_user0.png' class='img_personal1' alt='User_Empty'>";
                    }
               
                    ?>

                    <h3 style="color:white;">Menu</h3>
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
                            echo "<li><a href='../administrativo.php'>Painel Administrativo</a></li>";
                        }
                        
                    }else{
                       echo  "<li><a href='../Login/login.php'>Faça o login</a></li>";
                    }?>


                    <li><a href="../profile.php"> PERFIL </a></li>
                    <li><a href="doenca.php"> DOENÇAS </a></li>
                    <li><a href="../sobre.php"> SOBRE </a></li>
                    <li><a href="../Termos/politica.php"> Termos </a></li>
                    <li><a href="../index.php" onclick="href='Login/sair.php'"><i class="fas fa-sign-out-alt"></i>
                            Sair</a></li>
                </ul>
            </div>
            <div class="news">
                <div class="list">
                    
                    
                    <div class="table item" style="border: 1px solid">
					<img class="left square avatar" width="50px" height="50px" src="../img/letter/letterY.png">
                        <h2 class="text-strong">Y</h2>
						<p>Lista de Doenças Y</p>
                    </div>
                    <div class="table item" style="border: 1px solid">
					<img class="left square avatar" width="50px" height="50px" src="../img/letter/letterZ.png">
                        <h2 class="text-strong">Z</h2>
						<p>Lista de Doenças Z</p>
                    </div>
                    
             
                </div>
            </div>
</body>
<script src="./../js/jquery.min.js"></script>
<script>
function openNav() {
    document.getElementById("sidenav").style.width = "300px";
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0";
}
</script>

</html>