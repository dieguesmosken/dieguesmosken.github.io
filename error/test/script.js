 // JS

 var content = 'Matheus Mosken Diegues. Tecnico em Desenvolvimento de Sistemas.';
 var text = document.getElementById('text');

 var speed = 190;
 var cont = 0;

 function typeWriter() {
     if (cont < content.length) { //verifica o comprimento da minha frase salva na variavel em content
         document.getElementById('text').textContent += content.charAt(cont);
         cont++;
         setTimeout(typeWriter, speed);
     } else {
         document.getElementById('text').textContent = '';
         cont = 0;
         typeWriter();
     }
 }

 typeWriter();