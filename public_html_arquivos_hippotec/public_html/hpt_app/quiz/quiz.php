<?php
session_start();
if(!empty($_SESSION['id'])){
	
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PréDiag</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    



$(function () {
    //VARIÁVEIS
    //contador
    var cont = 0;
    var qst = 0;
    var error2 = 0;
    var error1;
    var resposta_usuario;
    //definir variaveis de doenças
    var saude = 0;
    var corona = 0;
    var gripe = 0;
    /**  */
    var questions = [
                    {
                        q: "Você sente alguma dor?",
                        options: ["Leve", "Moderada", "Forte", "Não"],
                        answer: 'op1'
                    }
                    ];
    //questões
    
        //$("#pronto").click(function () {

            var url = "http://localhost/2021/000HIPPOTEC_WEB/logar.php";

            $.ajax({
                type: "POST",
                crossDomain: true,
                cache: false,
                url: url,
                data: url,
                success: function (data) {

                    console.log(data);
                    console.log(" array.length ");
                    console.log(data.length);
                    $.getJSON(url, function (result) {

                        $.each(result, function (i, field) {

                            var idq = field.id;
                            var questao = field.question;
                            var resposta1 = field.answer1;
                            var resposta2 = field.answer2;
                            var resposta3 = field.answer3;
                            var resposta4 = field.answer4;

                            

                           // for (var i = 0; i < 1; i++) {
                                
                                var total = questions.push(
                                    {
                                        q: questao,
                                        options: [resposta1, resposta2, resposta3, resposta4],
                                        answer: 'op1'
                                    }
                                );

                           // }
                           var questnum = questions.length;
                            
                            console.log(" ");
                            console.log(idq +" " + questao + " " + resposta1);
                            
                            
                        
        
        
    //});





});


});

}
});

    //TELA APRESENTAÇÃO QUIZ 
    $('.quiz-pre input').on('click', function () {
        $('.quiz-pre').css({ 'opacity': '0' })
        setTimeout(function () {
            $('.quiz-pre').css({ 'display': 'none' })
        }, 400)
    })
    //SCORE
    var quant_perguntas = 10;
    $('.score span').text(quant_perguntas)
    $('.score p').text(0)

    //ATRIBUINDO PERGUNTA E OPÇÕES
    $('.question_titulo h2').text(questions[cont].q)
    $('.option[id=0]').text(questions[cont].options[0])
    $('.option[id=1]').text(questions[cont].options[1])
    $('.option[id=2]').text(questions[cont].options[2])
    $('.option[id=3]').text(questions[cont].options[3])

    //AO CLICAR EM UMA OPÇÃO
    $('.option').on('click', function () {

        id_resposta = $(this).attr('id');
        resposta_usuario = questions[cont].options[id_resposta]

        //inpedir click apos escolher
        $('.wrap_options').css({ 'opacity': '0.5', 'pointer-events': 'none' });
        //ativar btn prox quest
        $('.prox input').css({ 'display': 'inline-block' }).animate({ 'opacity': '1' }, 200);

        if ($.trim(resposta_usuario).length > 0) {
            var dataString = "resposta=" + resposta_usuario + "&insert=";
            $.ajax({
                type: "POST",
                url: "http://localhost/2021/000HIPPOTEC_WEB/hpt_app/cadastrar_pre.php",
                data: dataString,
                crossDomain: true,
                cache: false,
                beforeSend: function () {
                    $('.verifica_resp').css({ 'display': 'block', 'background-color': 'rgb(90, 90, 30)', 'border': '2px solid rgb(70, 70, 20)', 'color': 'rgb(70, 80, 10)' }).text('Conectando!');
                },
                success: function (data) {
                    if (data = "success") {
                        $('.verifica_resp').css({ 'display': 'block', 'background-color': 'rgb(59, 230, 96)', 'border': '2px solid rgb(7, 83, 20)', 'color': 'rgb(7, 83, 20)' }).text('Registrado!');
                    } else if (data == "error") {
                        $('.verifica_resp').css({ 'display': 'block', 'background-color': 'rgb(230, 59, 59)', 'border': '2px solid rgb(83, 7, 7)', 'color': 'rgb(83, 7, 7)' }).text('Error!');
                    }
                }
            });
        }


        // definir variaveis de opções
        aswr1 = (questions[cont].options[0]);
        aswr2 = (questions[cont].options[1]);
        aswr3 = (questions[cont].options[2]);
        aswr4 = (questions[cont].options[3]);
        //verificar se foi clicado no não
        if (resposta_usuario == aswr4) {
            saude += 1;
            qst += 1;
            error1 = "erro no if: ";
            error2 += 1;
        } else if (resposta_usuario == aswr3) {
            corona += 1;
            qst += 1;
            error1 = "erro no if: ";
            error2 += 1;
        } else if (resposta_usuario == "leve") {
            saude += 1;
            qst += 1;
            error1 = "erro no if: ";
            error2 += 1;
        } else if (resposta_usuario == aswr1) {
            corona += 1;
            qst += 1;
            error1 = "erro no if: ";
            error2 += 1;
        } else if (resposta_usuario == "as vezes") {
            gripe += 1;
            qst += 1;
            error1 = "erro no if: ";
            error2 += 1;
        } else if (resposta_usuario == "tosse") {
            corona += 1;
            gripe += 1;
            qst += 1;
            error1 = "erro no if: ";
            error2 += 1;
        } else if (resposta_usuario == "corisa" || resposta_usuario == "fadiga") {
            gripe += 1;
            qst += 1;
            error1 = "erro no if: ";
            error2 += 1;
        }
        /*else{
                qst +=1;
                error1 = "erro no if: ";
                error2 +=1;   
        }*/

        //Atribuindo score 
        $('.score p').text(qst);



    })

    //CLICAR EM PROX PERG
    $('.prox input').on('click', function () {

        //alterando texto do botão na última perg
        if (cont == questions.length - 2) {
            setTimeout(function () {
                $('.prox input').val('Finalizar')
            }, 600)
        }
        //RESULTADOS TELA FINAL
        if (cont < questions.length - 1) {
            cont++
        } else {
            $('.tela_final').css({ 'display': 'block' }).animate({ 'opacity': '1' }, 300)


            // ifs para testar
            if (gripe == 3) {
                $('#result').text('com uma gripe leve');
            } else if (corona > 5) {
                $('#result').text('com Coronavirus');
            } else if (saude > 5) {
                $('#result').text('Saudavel');
            } else if (gripe == 0 || corona == 0 || saude == 0) {
                $('#result').text(error1 + error2);
            }



        }

        //MOSTRANDO NOVAS PERGUNTAS
        setTimeout(function () {
            $('.question_titulo h2').text(questions[cont].q)
            $('.option[id=0]').text(questions[cont].options[0])
            $('.option[id=1]').text(questions[cont].options[1])
            $('.option[id=2]').text(questions[cont].options[2])
            $('.option[id=3]').text(questions[cont].options[3])

            $('.wrap_options').css({ 'opacity': '1', 'pointer-events': 'all' })
            $('.verifica_resp').css({ 'display': 'none' })
            $('.prox input').css({ 'display': 'none', 'opacity': '0' })
        }, 400)
    })


})





    </script>
    <header>
        <div class="header-tipe2">
            <h1>PréDiag</h1>

            <div class="seta-voltar">
                <a href="../View/index.php">
                    <img src="imagens/setaVoltar.svg" alt="...">
                </a>
            </div>
            <!--seta-voltar-->
            <div class="clear"></div>
            <!--clear-->
        </div>
        <!--header-tipe2-->
        <div class="reset-height"></div>
        <!--reset-height-->
    </header>

    <section>
        <div class="quiz-pre">
            <h2>Você está preparado para responder o Pre-diagnostico?</h2>
            <p>Aqui teremos algumas perguntas sobre seus sintomas. </p>
            <input type="button" id="pronto" value="Estou preparado!">
        </div>
        <!--quiz-pre-->
    </section>
    <section>
        <div class="container-quiz">
            <div class="box_questions">
                <div class="conteudo_atual">
                    <h1>Responda as questões</h1>
                </div>
                <!---conteudo_atual-->
                <div class="perguntas_quiz">
                    <div class="question_titulo">
                        <h2></h2>
                    </div>
                    <!--question_titulo-->

                    <div class="wrap_options">
                        <div class="option" id="0">
                            <p></p>
                        </div>
                        <!--option-->

                        <div class="option" id="1">
                            <p></p>
                        </div>
                        <!--option-->

                        <div class="option" id="2">
                            <p></p>
                        </div>
                        <!--option-->

                        <div class="option" id="3">
                            <p></p>
                        </div>
                        <!--option-->

                        <div class="verifica_resp">
                            <p>Resposta correta!</p>
                        </div>
                        <!--verifica_resp-->
                    </div>
                    <!--wrap_options-->

                    <div class="prox">
                        <input type="button" value="Proxima questão">
                    </div>
                    <!--prox-->
                </div>
                <!--perguntas_quiz-->
            </div>
            <!--box_questions-->
        </div>
        <!--container-quiz-->
    </section>

    <section>
        <div class="score">
            <h3>Questão:</h3>
            <p style="color:white"></p> / <span></span>
        </div>
        <!--score-->
    </section>

    <section>
        <div class="tela_final">
            <h1>RESULTADO FINAL</h1>
            <p>Você pode estar <span id="result" style="color:gold"></span> </p>
            <p>Consulte um Médico para mais informações sobre sua Saúde</p>
            <a href="../View/index.php">SAIR</a>
            <a onclick="location.reload();">Refazer</a>
        </div>
        <!--tela_final-->
    </section>

    <script src="js/jquery.js"></script>
    
    <!--<script src="js/quizbd.js"></script>-->
</body>

</html>
<?php
}else{
	$_SESSION['msg'] = "Usuario não logado - Faça seu login";
	header("Location: ../View/Login/login.php");	
}
?>