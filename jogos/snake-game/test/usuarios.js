function cadastrarUsuario() {
    const username = prompt('Insira um nome de usuário:');
    localStorage.setItem('username', username);
    alert('Cadastro realizado com sucesso!');
}

function fazerLogin() {
    const username = prompt('Insira seu nome de usuário:');
    const savedUsername = localStorage.getItem('username');
    if (username === savedUsername) {
        alert('Login realizado com sucesso!');
        exibirNomeJogadorLogado();
    } else {
        alert('Nome de usuário inválido!');
    }
}

function exibirNomeJogadorLogado() {
    const username = localStorage.getItem('username');
    const nomeJogador = document.getElementById('nomeJogador');
    if (username) {
        nomeJogador.textContent = 'Jogador: ' + username;
    } else {
        nomeJogador.textContent = '';
    }
}