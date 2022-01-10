<?php
session_start();

if((!empty($_SESSION['id'])) && $_SESSION['tipousr'] == 1){
//	if($_SESSION['tipo_usr'] == 1){
?>


<!DOCTYPE html>
<html lang="pt-BR">
<title>Crud Hippotec</title>
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
}/*
body{
    background-color: #84e2f1;
}*/
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
            <a href="../index.php" class="w3-bar-item w3-button  w3-padding-large w3-hover-white">HOME</a>

            <a href="#Tabela_user" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">PAINEL ADM</a>
            <a href="../doenca.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">TABELA DOENÇAS</a>

            <a href="https://coronavirus.saude.gov.br/"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COVID-19</a>
           
            <?php 
                if(!empty($_SESSION['id'])){
                    ?>
            <a
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php echo $_SESSION['nome'] ?></a>
            <a href="Login/sair.php"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-red">SAIR</a>
            <?php
                }else{
                    echo "<a href='Login/login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>LOGIN</a>";
                }
               
                     if(!empty($_SESSION['id'])){?>
                        <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Perfil de "<?= $_SESSION['nome']; ?>>
                        <?php
						echo "<img src='../img/Users/img_user".$_SESSION['id'].".png' class='w3-circle' style='height:23px;width:23px' alt='mg_user".$_SESSION['id'].".png'>";
					}else{
                        echo "<a href='profile.php' class='w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white' title='Perfil Não Acessivel'>";
						echo "<img src='../img/Users/img_user0.png' class='w3-circle' style='height:23px;width:23px' alt='User_Empty'>";
					}
			   
                    ?>
            </a>


        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <a href="#tabela_user" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
            <a href="sobre.html" class="w3-bar-item w3-button w3-padding-large">Sobre</a>
            <a href="#tabela_user" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
            <a href="#tabela_user" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
        </div>
    </div>
    <?php 
require_once '../Controller/UsersController.php';

$users = UsersController::listarUsers();

?>
    <!-- Header -->


    <!-- First Grid -->
    <div class="w3-row-padding w3-padding-64 ">
        <div class="w3-content w3-container w3-col-12">
            <div class="">
                <div class="w3-container" style="background-color: #84e2f1">
                    <br>
                    <a class="w3-btn w3-blue"  href="frmCadastrarUser.php">Cadastrar um novo Usuario</a>
                    <hr>
                </div>
                <hr>
                <div class="">
                    <table class="w3-table-all w3-hoverable">
                        <tr class="" style="background-color: #84e2f1">
                            <td>ID</td>
                            <td>NOME</td>
                            <td>DT CRIADO</td>
                            <td>DT MODIFICADO</td>
                            <td>TIPO USER</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <?php
foreach($users as $registro){
    ?>
                        <tr>
                            <td class=""><?php echo $registro['id'];?></td>
                            <td><?php echo $registro['nome_usr'];?></td>
                            <td><?php echo $registro['dtcriado_usr'];?></td>
                            <td><?php echo $registro['dtmodificado_usr'];?></td>
                            <td><?php 
                                if($registro['tipo_usr'] == 1){
                                    echo $registro['tipo_usr']." - Administrador";
                                }else{
                                    echo $registro['tipo_usr']." - Comum";
                                }?>
                            </td>
                            <td>
                                <a href="detalharUser.php?id=<?= $registro['id']; ?>" alt="detalhe_user">
                                    <i class="fa fa-commenting-o"></i>
                                </a>
                            </td>
                            <td>
                                <a href="excluirUser.php?id=<?= $registro['id']; ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                <a href="frmEditarUser.php?id=<?= $registro['id']; ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>

                        <?php
    }
?>

                    </table>
                </div>
            </div>
        </div>
    </div>



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
<?php
    /*}else{
        $_SESSION['msg'] = "USER NOT ADMIN!";
	    header("Location: Login/login.php");	
    }*/

}else{
	$_SESSION['msg'] = "POR QUE VOCÊ FEZ ISSO!";
	header("Location: Login/login.php");	
}
?>