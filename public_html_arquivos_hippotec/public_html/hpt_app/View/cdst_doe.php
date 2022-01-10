<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport"
        content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />

    <meta http-equiv="Content-Security-Policy"
        content="default-src * 'unsafe-inline' gap:; style-src 'self' 'unsafe-inline'; media-src *" />

    <link rel="stylesheet" type="text/css" href="../css/ionic.css" />
    <title>Hippotec</title>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#insert").click(function() {
            var nome = $("#nome").val();
            var desc = $("#desc").val();
            var sint = $("#sint").val();
            var trat = $("#trat").val();
            var grau = $("#grau").val();
            var dataString = "nome=" + nome + "&desc=" + desc + "&sint=" + sint + "&trat=" + trat +
                "&grau=" + grau + "&insert=";
            if ($.trim(nome).length > 0 & $.trim(desc).length > 0 & $.trim(sint).length > 0 & $.trim(
                    trat).length > 0 & $.trim(grau).length > 0) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/2021/hpt/cadastrar_doe.php",
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
        <a href="index.php" class="button button-clear">Home</a>
        <h1 class="title">Cadastro Doença</h1>

    </div>
    <br>
    <br>
    <div class="list">
        <input type="hidden" id="id" value="" />
        <div class="item">
            <label>Nome da Doença</label>
            <input type="text" id="nome">
        </div>
        <div class="item">
            <label>Descrição</label>
            <input type="text" id="desc">
        </div>
        <div class="item">
            <label>Sintomas</label>
            <input type="text" id="sint">
        </div>
        <div class="item">
            <label>Tratamento</label>
            <input type="text" id="trat">
        </div>
        <div class="item">
            <label>Grau</label>
            <input type="text" id="grau">
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