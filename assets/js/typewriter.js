 // JS

 var content = '< Programador e Web Designer. />';
 var text = document.getElementById('text');

 var speed = 150;
 var cont = 0;

 function typeWriter() {
     if (cont < content.length) { //verifica o comprimento da minha frase salva na variavel em content
         document.getElementById('textTP').textContent += content.charAt(cont);
         cont++;
         setTimeout(typeWriter, speed);
     } else {
         document.getElementById('textTP').textContent = '';
         cont = 0;
         typeWriter();
     }
 }

 typeWriter();