let canvas = document.getElementById("snake");
let context = canvas.getContext("2d");
let box = 32;
let snake = [];
snake[0] = {
    x: 8 * box,
    y: 8 * box
}

let direction = "right";
let food = {
    x: Math.floor(Math.random() * 15 + 1) * box,
    y: Math.floor(Math.random() * 15 + 1) * box
}

function criarBG() {
    context.fillStyle = "lightgreen";
    context.fillRect(0, 0, 16 * box, 16 * box);

}

function criarCobrinha() {
    for (i = 0; i < snake.length; i++) {
        context.fillStyle = "green";
        context.fillRect(snake[i].x, snake[i].y, box, box);
    }
}

function drawFood() {
    context.fillStyle = "red";
    context.fillRect(food.x, food.y, box, box);
}



document.addEventListener("keydown", update);

function update(event) {
    if (event.keyCode == 37 && direction != "right") direction = "left";
    if (event.keyCode == 38 && direction != "down") direction = "up";
    if (event.keyCode == 39 && direction != "left") direction = "right";
    if (event.keyCode == 40 && direction != "up") direction = "down";


}

function iniciarJogo() {

    if (snake[0].x > 15 * box && direction == "right") snake[0].x = 0;
    if (snake[0].x < 0 && box && direction == "left") snake[0].x = 16 * box;
    if (snake[0].y > 15 * box && direction == "down") snake[0].y = 0;
    if (snake[0].y < 0 && box && direction == "up") snake[0].y = 16 * box;

    for (i = 1; i < snake.length; i++) {
        if (snake[0].x == snake[i].x && snake[0].y == snake[i].y) {
            clearInterval(jogo);
            alert('Game Over :/ ');
        }
    }

    criarBG();
    criarCobrinha();
    drawFood();


    let snakeX = snake[0].x;
    let snakeY = snake[0].y;

    if (direction == "right") snakeX += box;
    if (direction == "left") snakeX -= box;
    if (direction == "up") snakeY -= box;
    if (direction == "down") snakeY += box;

    if (snakeX != food.x || snakeY != food.y) {
        snake.pop();
    }
    else {
        food.x = Math.floor(Math.random() * 15 + 1) * box;
        food.y = Math.floor(Math.random() * 15 + 1) * box;
    }

    let newHead = {
        x: snakeX,
        y: snakeY
    }

    snake.unshift(newHead);

    // inicio da area em desenvolvimento 
    function placar() {

        for (i = 1; i < snake.length; i++) {

            if (snakeX != food.x || snakeY != food.y) {
                i += 1;
                document.getElementById("placar").innerHTML = ('0000' + (snake.length - 1)).slice(-4);
            }
        }
    }

    placar();
    // Verifica se já existe um nome de usuário
    let username = localStorage.getItem('username');
    if (!username) {
        username = prompt('Insira seu nome de usuário:');
        localStorage.setItem('username', username);
    }

    // Obtém a pontuação máxima do usuário
    let maxScore = localStorage.getItem(username);
    if (maxScore === null) {
        maxScore = 0;
    }

    function updateMaxScore() {
        if (snake.length > maxScore) {
            maxScore = snake.length;
            localStorage.setItem(username, maxScore);
        }
    }

    // Chamar essa função para atualizar a pontuação máxima
    updateMaxScore();

    // Exibir a pontuação máxima
    document.getElementById('maxScore').innerText = maxScore;

    // Exibir a pontuação máxima
    document.getElementById('maxScore').innerText = maxScore;
    // fim da area em desenvolvimento

    // ... Código JavaScript scorelist ...

    function updateScoresList() {
        // Limpar a lista de pontuações
        const scoresList = document.getElementById('scoresList');
        scoresList.innerHTML = '';

        // Obter a lista de usuários do localStorage
        const userListString = localStorage.getItem('userList');
        const userList = userListString ? JSON.parse(userListString) : [];

        // Adicionar as pontuações dos jogadores da lista ao localStorage
        userList.forEach(player => {
            const score = localStorage.getItem(player);
            if (score !== null) {
                const li = document.createElement('li');
                li.textContent = `${player}: ${score}`;
                scoresList.appendChild(li);
            }
        });
    }

    // Atualizar a lista de pontuações quando necessário
    updateScoresList();

    // ... Código JavaScript scorelist ...

}

let jogo = setInterval(iniciarJogo, 100);

