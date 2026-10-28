setInterval(function() {

    let novaHora = new Date();

    let hora = novaHora.getHours(); // getHours trará a hora
    let minuto = novaHora.getMinutes(); // geMinutes trará os minutos
    let segundo = novaHora.getSeconds(); // getSeconds trará os segundos
    // Chamamos a função zero para que ela retorne a concatenação
    // com os minutos e segundos
    minuto = zero(minuto);
    segundo = zero(segundo);
    // Com o textContent, iremos inserir as horas, minutos e segundos
    // no nosso elemento HTML
    document.getElementById('hora').textContent = hora + ':' + minuto + ':' + segundo;
}, 1000)

function zero(x) {
    if (x < 10) {
        x = '0' + x;
    }
    return x;
}