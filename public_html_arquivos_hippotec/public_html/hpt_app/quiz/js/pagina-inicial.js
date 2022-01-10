$(function(){
    //abrir sidebar
    $('.container-hamburguer').on('click', function(e){
        
        e.stopPropagation();
        $('html, body').css({overflow:'hidden'});
        $('.sidebar').css({'width':'100%'});
        setTimeout(function(){
            $('.wraper-items').css({'width':'60%'})
        },200)
    })

    //fechar sidebar
    $(".sidebar").on('click', function(){

        $('html, body').css({overflow:'auto'});
        $('.wraper-items').css({'width':'0%'})  
        setTimeout(function(){
            $('.sidebar').css({'width':'0'});
        },200)   
    })

    $('.wraper-items').on('click',function(e){
        e.stopPropagation();
    })

    /*------------------- */
    /* efeito div conteudo para estudos */
    $('.active-disable').on('click',function(e){
        $(this).css({'width':'0','padding':'0'})
    })

    /*--------------------*/
    
})
