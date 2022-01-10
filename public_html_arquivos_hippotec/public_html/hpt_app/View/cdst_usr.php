<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
   
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline' gap:; style-src 'self' 'unsafe-inline'; media-src *" />
   
    <link rel="stylesheet" type="text/css" href="css/ionic.css" />
    <title>Hippotec</title>
    <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $("#insert").click(function() {
            var nome = $("#nome").val();
            var email = $("#email").val();
            var pass = $("#pass").val();
            var cpf = $("#cpf").val();
            var dtnasc = $("#dtnasc").val();
            var dataString = "nome=" + nome + "&email=" + email + "&pass=" + pass + "&cpf=" + cpf + "&dtnasc=" + dtnasc + "&insert=";
            if ($.trim(nome).length > 0 & $.trim(email).length > 0 & $.trim(pass).length > 0 & $.trim(cpf).length > 0 & $.trim(dtnasc).length > 0) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/2021/hpt/cadastrar_usr.php",
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                beforeSend: function() {
                        $("#insert").val('Connectando ao banco...');
                    },
                   success: function(data) {
                        if (data = "success") {
                            alert("Dados Inseridos com sucesso");
                            $("#insert").val('Cadastrar');
                        } else if (data == "error") {
                            alert("error");
                        }
                    }
                });
            }
            return false;
        });
    });
    </script>
</head>

<body>
    <div class="bar bar-hearder bar-calm" style="margin-bottom: 80px;">
        <a href="index.html" class="button button-clear">Home</a>
        <h1 class="title">Cadastro De Usuario</h1>
        
    </div>
    <br>
    <br>
    <div class="list">
        <input type="hidden" id="id" value=""/>
        <div class="item">
            <label>Nome do Usuario</label>
            <input type="text" id="nome">
        </div>
        <div class="item">
            <label>Email</label>
            <input type="email" id="email">
        </div>
        <div class="item">
            <label>Senha Usuario</label>
            <input type="password" id="pass">
        </div>
        <div class="item">
            <label>CPF Usuario</label>
            <input type="text" id="cpf">
        </div>
        <div class="item">
            <label>Data de Nascimento</label>
            <input type="date" id="dtnasc">
        </div>
        <div class="item">
            <input type="button" id="insert" class="button button-block button-positive" value="Cadastrar">
        </div>
    </div>
    <div class="bar bar-footer">
        <button class="button button-clear pull-right">@dieguesmosken - Hippotec 2020 &COPY;</button>
      </div>
</body>

</html>
