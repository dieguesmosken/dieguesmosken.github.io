$(function () {
    //VARIÁVEIS
    //contador
    var cont = 0;
    var qst = 0;
    var error2 = 0;
    var error1 = "";
    var resposta_usuario
    //definir variaveis de doenças
    var saude = 0;
    var corona = 0;
    var gripe = 0;


    $(document).ready(function () {
        
    });






    //questões
    var questions = [
        {
            q: 'Você sente alguma dor?',
            options: ['leve', 'moderada', 'forte', 'não'],
            answer: 'op1'
        },
        {
            q: 'Você sente febre?',
            options: ['sim', '_', '_', 'não'],
            answer: 'op1'
        },
        {
            q: 'Tem tosse seca?',
            options: ['sim', '_', 'as vezes', 'não'],
            answer: 'op2'
        },
        {
            q: 'Utiliza remédios controlados?',
            options: ['sim', '_', '_', 'não'],
            answer: 'op1'
        },
        {
            q: 'Você possui esses sintomas?',
            options: ['Tosse', 'corisa', 'fadiga', 'não'],
            answer: 'op2'
        },
        {
            q: 'vc sente tontura ?',
            options: ['sim', 'as vezes', '_', 'não'],
            answer: 'op1'
        },
        {
            q: 'Os Sintomas apareceram após sair de casa ?',
            options: ['sim', 'não tenho certeza', '_', 'não'],
            answer: 'op4'
        },
        {
            q: 'Os Sintomas apareceram há menos de 1 semana ?',
            options: ['_', 'sim', 'a mais', 'não tive sintomas'],
            answer: 'op3'
        },
        {
            q: 'Você usa mascara ao sair de casa?',
            options: ['não', 'as vezes', 'parei', 'sim'],
            answer: 'op1'
        },
        {
            q: 'Tem dificuldade para respirar?',
            options: ['sim', 'as vezes', 'passou', 'não'],
            answer: 'op4'
        }
    ]
    //TELA APRESENTAÇÃO QUIZ 
    $('.quiz-pre input').on('click', function () {
        $('.quiz-pre').css({ 'opacity': '0' })
        setTimeout(function () {
            $('.quiz-pre').css({ 'display': 'none' })
        }, 400)
    })
    //SCORE
    var quant_perguntas = questions.length
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
                url: "http://localhost/2021/hpt/test/cadastrar_pre.php",
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




