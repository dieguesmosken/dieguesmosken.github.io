<?php
require_once '../Controller/UsersController.php';

$id = $_GET['id'];

$objetoUser = UsersController::excluirUserID($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuario</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="w3-container w3-gray">
    <br>
<?php
    if(isset($id)){
        
        if($objetoUser > 0){
            echo "<h4><b>INFO: </b>o registro foi excluido com sucesso!</h4><br>";
        }else{
            echo "<h4><b>INFO: </b>Ocorreu um erro ao excluir o registro!</h4><br>";
        }
    }
    
?>
    <h4> <a class="w3-button w3-black" href="index.php"> Voltar para a lista</a></h4>
    <hr>
</div>
</body>
</html>
