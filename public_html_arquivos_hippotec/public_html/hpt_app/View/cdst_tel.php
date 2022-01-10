<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
   
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline' gap:; style-src 'self' 'unsafe-inline'; media-src *" />
    <link rel="shortcut icon" type="image/x-icon" href="img/8646icon_32x32.ico">
    <link rel="stylesheet" type="text/css" href="../css/ionic.css" />
    <title>Hippotec</title>
    <script type="text/javascript" src="./js/jquery.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $("#insert").click(function() {
            var titulo = $("#title").val();
            var duracao = $("#duration").val();
            var preco = $("#price").val();
            var dataString = "title=" + titulo + "&duration=" + duracao + "&price=" + preco + "&insert=";
            if ($.trim(titulo).length > 0 & $.trim(duracao).length > 0 & $.trim(preco).length > 0) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/curso/cadastrar.php",
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
        <h1 class="title">Hippotec cadastro</h1>
        
        
    </div>
    <br>
    <br>
    <div class="list">
        <input type="hidden" id="id" value=""/>
        <div class="item">
            <label>Telefone</label>
            <input type="text" id="telephone">
        </div>
        <div class="item">
            <label>Descrição</label>
            <input type="text" id="description">
        </div>
        <div class="item">
            <label>Endereço</label>
            <input type="text" id="adress">
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
