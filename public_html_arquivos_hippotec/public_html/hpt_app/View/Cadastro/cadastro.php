<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width">
    <title>HIPPOTEC Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/ionic.css">
    <link rel="stylesheet" type="text/css" href="../../css/mobileui/style.css" />
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">

    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->

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
						echo "<br><img src='../../img/User/img_user".$_SESSION['id'].".png' class='img_personal1' width='50%' height='50%' alt='mg_user".$_SESSION['id'].".png'>";
					}else{
						echo "<br><img src='../../img/User/img_user0.png' width='50%' height='50%' alt='User_Empty'>";
					}
			   
                    ?>
                    <h3 style="color:white;">CADASTRO</h3>
                </div>
                <!-- Itens do Menu Lateral  -->
                <div class="clearfix"></div>
                <ul>
                    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i
                                class="fas fa-times"></i></a></li>
                    <li><a href="../profile.php"> PERFIL </a></li>
                    <li><a href="../doenca/doenca.php"> DOENÇAS </a></li>
                    <li><a href="../sobre.php"> SOBRE </a></li>
                    <li><a href="../Termos/politica.php"> TERMOS </a></li>
                    <li><a href="../index.php"> INICIO </a></li>
                    <li><a href="sair.php" onclick="javascript:window.close()"><i class="fas fa-sign-out-alt"></i>
                            Sair</a></li>
                </ul>
            </div>

            <div class="news">
                <div class="list">

                    <h2>Cadastro</h2>
                    <input type="text" disabled value=" <?php
			if(isset($_SESSION['msg'])){
				echo "Bem Vindo Ao Cadastro!";
				unset($_SESSION['msg']);
				
			}else{
				echo "Sem Mensagens Do Sistema";
			}
		?>">
                    <form method="POST" action="valida_c.php">
                        <label class="text-strong h6">Nome</label>
                        <input type="text" class="item" name="nome_usr" autofocus placeholder="Seu Nome Completo"><br>
						<label class="text-strong h6">Email</label>
                        <input type="text" class="item" name="email" placeholder="Seu Melhor Email"><br>
                        <label class="text-strong h6">Senha</label>
                        <input type="password" class="item" name="senha" placeholder="Sua Melhor Senha"><br><br>

                        <input type="submit" class="button button-block button-positive" name="btnLogin"
                            value="Acessar">

                    </form>
                </div>
            </div>
            <div class="bar bar-footer">
                <button class="button button-clear pull-right">@dieguesmosken - Hippotec 2021 &COPY;</button>
            </div>
        </div>
    </div>
    </div>


    <script src="../../js/jquery.min.js"></script>
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