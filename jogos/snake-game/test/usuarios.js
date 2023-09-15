function cadastrarUsuario() {
    const username = prompt('Insira um nome de usuário:');
    // Obtém a lista de usuários do localStorage, se existir
    const userListString = localStorage.getItem('userList');
    let userList = userListString ? JSON.parse(userListString) : [];

    // Verifica se o usuário já existe
    if (userList.find(user => user === username)) {
        alert('Usuário já existe!');
        return;
    }

    // Adiciona o novo usuário à lista
    userList.push(username);

    // Armazena a lista atualizada no localStorage
    localStorage.setItem('userList', JSON.stringify(userList));

    alert('Cadastro realizado com sucesso!');
}

// function fazerLogin() {
//     const username = prompt('Insira seu nome de usuário:');
//     const userListString = localStorage.getItem('userList');
//     const userList = userListString ? JSON.parse(userListString) : [];

//     if (userList.includes(username)) {
//         alert('Login realizado com sucesso!');
//         exibirNomeJogadorLogado(username);  // Adicionando esta linha
//     } else {
//         alert('Nome de usuário inválido!');
//     }
// }

// Função para manipular o clique no botão "Sair"
function sair() {
    localStorage.removeItem('username');
    // Redirecionar para a página de login ou qualquer outra ação necessária após sair
}




function exibirNomeJogadorLogado(username) {
    const nomeJogador = document.getElementById('nomeJogador');
    if (username) {
        nomeJogador.textContent = 'Logado como: ' + username;
    } else {
        nomeJogador.textContent = '';
    }
}

function fazerLogin() {
    // Verificar se já existe um nome de usuário
    let username = localStorage.getItem('username');
    if (!username) {
        username = prompt('Insira seu nome de usuário:');
        localStorage.setItem('username', username);
        
    } else {
        const userListString = localStorage.getItem('userList');
        const userList = userListString ? JSON.parse(userListString) : [];

        if (!userList.includes(username)) {
            userList.push(username);
            localStorage.setItem('userList', JSON.stringify(userList));
        }
        // exibirNomeJogadorLogado(username)
    }

    // Resto do código de login...
    exibirNomeJogadorLogado(username)
}

