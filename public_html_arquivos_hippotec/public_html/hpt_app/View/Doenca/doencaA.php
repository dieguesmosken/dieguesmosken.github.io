<?php 
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width">
    <title>Doença A</title>
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
                <li><a href="../index.php"><i class="fas fa-h-square"></i></li>
                <li><a href="doenca.php"><i class="fas fa-arrow-left"></i></a></li>

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

                    <h3 style="color:white;">DOE A</h3>
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
                       echo  "<li><a href='Login/login.php'>Faça o login</a></li>";
                    }?>


                    <li><a href="../profile.php"> PERFIL </a></li>
                    <li><a href="doenca.php"> DOENÇAS </a></li>
                    <li><a href="./sobre.php"> SOBRE </a></li>
                    <li><a href="../Termos/politica.php"> Termos </a></li>
                    <li><a href="../index.php" onclick="href='Login/sair.php'"><i class="fas fa-sign-out-alt"></i>
                            Sair</a></li>
                </ul>
            </div>
            <div class="news">

                <div class="table item" style="border: 1px solid" onclick="location.href='acne.html'">
                    <img class="left square avatar" width="50px" height="50px" src="../img/letter/letterA.png">
                    <br>
                    <h2 class="text-strong">IDS</h2>
                    <p class="opacity-60">A AIDS é causada pelo vírus HIV, que interfere na capacidade do organismo de
                        combater infecções.
                        O vírus pode ser transmitido pelo contato com sangue, sêmen ou fluidos vaginais infectados.
                        Algumas semanas depois da infecção pelo HIV, podem ocorrer sintomas semelhantes aos da gripe,
                        como febre, dor de garganta e fadiga. A doença costuma ser assintomática até evoluir para AIDS.
                        Os sintomas da AIDS incluem perda de peso, febre ou sudorese noturna, fadiga e infecções
                        recorrentes.
                        Não existe cura para a AIDS, mas uma adesão estrita aos regimes antirretrovirais (ARVs) pode
                        retardar significativamente o progresso da doença, bem como prevenir infecções secundárias e
                        complicações.</p>
                </div>
                <div class="table item" style="border: 1px solid" onclick="location.href='acneINFO.php'">
                    <img class="left square avatar" width="50px" height="50px" src="../img/letter/letterA.png">
                    <br>
                    <h2 class="text-strong">CNE</h2>
                    <p class="opacity-60">A Acne nada mais é que uma lesão causada pelo aumento da produção de sebo
                        vinda das glândulas sebáceas.
                        Esse excesso de oleosidade deixa os poros obstruídos e aumenta a proliferação de bactérias,
                        resultando nos comedões,
                        que chamamos mais comumente de cravos. Quando ocorre a inflamação, chamamos de espinha.</p>
                </div>

                <div class="table item" style="border: 1px solid">
                    <img class="left square avatar" width="50px" height="50px" src="../img/letter/letterA.png"><br>
                    <h2 class="text-strong">LZHEIMER</h2>
                    <p class="opacity-60">O Alzheimer um grupo de distúrbios cerebrais que causam a perda de
                        habilidades intelectuais e sociais.
                        Na doença de Alzheimer,
                        as células cerebrais degeneram e morrem, causando um declínio constante na memória e na
                        função mental.</p>
                </div>
            </div>

        </div>
    </div>
</body>
<script src="../../js/jquery.min.js"></script>
<script>
function openNav() {
    document.getElementById("sidenav").style.width = "300px";
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0";
}
</script>

</html>