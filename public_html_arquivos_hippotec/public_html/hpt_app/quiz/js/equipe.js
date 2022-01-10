$(function(){
    // Mensagens de cada integrante
    var textoBertoldo = 'Olá, sou Matheus Bertoldo, programador mobile da equipe Maberzo, desejo a vocês uma ótima experiência em nosso APP, aproveite todo conhecimento disponível. Obrigado pela atenção, abs!';
    var textoLarissa = 'Bem vindos ao Prog\' me! Gostaria de agradecer sua presença aqui, sei que vai encontrar tudo o que precisa para ser um ótimo desenvolvedor, desejo a muito foco e sucesso :)';
    var textoMartins = '“Eu sempre quis que o meu computador fosse tão fácil de usar como o meu telefone, o meu desejo foi realizado pois eu já não consigo descobrir como usar o meu telefone.” Bjarne Stroustrup. Deixo você com essa mensagem de inspiração, boa sorte e sucesso!';
    var textoSamuel = 'Senhores, primeiramente agradeço a sua escolha do aplicativo, acredito que aqui você terá muito conhecimento importante para seu futuro na programação. Uma dica de amigo, não pare por aqui, a programação é um mundo incrivelmente grande, explore todo o seu potencial, apaixone-se pela programação tambêm.';
    var textoTrigo = 'Olá pequeno gafanhoto, tudo bem com você? Espero que sim. Passei para avisar que apartir daqui você estará trilhando um caminho mágico na sua vida, o caminho da programação. Dedique-se aos estudos e logo verá o quão incrível é ser um desenvolvedor de sistemas, desejo muito sucesso na sua vida, até mais.';
    
    $('.cracha').on('click',function(e){
        e.stopPropagation()
        var id = $(this).attr('id')
        
        //abrir tela de mensagens
        $('.container-mensagem').css({'width':'100%','background-color':'rgba(0, 0, 0, 0.562)'})
        setTimeout(function(){
            $('.img-usuario-mensagem').css({'opacity':'1'})
        },100)
        setTimeout(function(){
            $('.box-mensagem').css({'opacity':'1'})
        },300)

        //experiência do usuário
        $('.seta-voltar a').attr('href','equipe.php')

        //colocando foto de perfil
        if(id == 'cracha1'){
            $('.box-mensagem p').text(textoBertoldo)
            $('#foto-usuario img').attr('src','imagens/men.svg')
        }else if(id == 'cracha2'){
            $('.box-mensagem p').text(textoLarissa)
            $('#foto-usuario img').attr('src','imagens/woman.svg')
        }else if(id == 'cracha3'){
            $('.box-mensagem p').text(textoMartins)
            $('#foto-usuario img').attr('src','imagens/men.svg')
        }else if(id == 'cracha4'){
            $('.box-mensagem p').text(textoSamuel)
            $('#foto-usuario img').attr('src','imagens/men.svg')
        }else if(id == 'cracha5'){
            $('.box-mensagem p').text(textoTrigo)
            $('#foto-usuario img').attr('src','imagens/men.svg')
        }else{
            $('.box-mensagem p').text('Quem sou eu?')
        }
    })
    //fechando tela mensagem
    $('.container-mensagem').on('click',function(){
        $('.box-mensagem').css({'opacity':'0'},0)
        $('.container-mensagem').css({'background-color':'transparent'})
        setTimeout(function(){
            $('.img-usuario-mensagem').css({'opacity':'0'})
        },100)
        setTimeout(function(){
            $('.container-mensagem').css({'width':'0%'})
        },300)

        //experiência do usuário
        $('.seta-voltar a').attr('href','pagina-inicial.php')
    })
    //não fechar tela-mensagem ao clicar no cracha
    $('.wrap-mensagem').on('click',function(e){
        e.stopPropagation()
    })    
})
// 