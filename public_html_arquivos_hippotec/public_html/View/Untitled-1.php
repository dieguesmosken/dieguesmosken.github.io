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
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
            <a href="#Tabela_user" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Painel Adm</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">TABELA DOENÇAS</a>
            <a href="/Cadastro" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">CADASTRO</a>
            <a href="https://coronavirus.saude.gov.br/"
                class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COVID-19</a>
            <a href="/How-It-Works" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COMO
                FUNCIONA</a>
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
                    <div class="w3-container w3-green">
                        <br>
                        <a class="w3-btn w3-green" href="frmCadastrarUser.php">Cadastrar um novo Usuario</a>
                        <hr>
                    </div>
                    <hr>
                    <div class="">
                    <table class="w3-table-all w3-hoverable">
                        <tr class="w3-teal">
                            <td>ID</td>
                            <td>NOME</td>
                            <td>SENHA</td>
                            <td>CPF</td>
                            <td>DT. NASC.</td>
                            <td>EMAIL</td>
                            <td>TIPO</td>
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
                            <td><?php echo $registro['pass_usr'];?></td>
                            <td><?php echo $registro['cpf_usr'];?></td>
                            <td><?php echo $registro['dtnasc_usr'];?></td>
                            <td><?php echo $registro['email_usr'];?></td>
                            <td><?php echo $registro['tipo_usr'];?></td>
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