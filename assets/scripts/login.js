function Login(event) {
    event.preventDefault(); 

    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    // Verifica se os campos estão preenchidos
    if (username === "" || password === "") {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    // Cria o objeto de login
    let loginData = {
        username: username,
        password: password
    };

    // Envia os dados para o PHP
    fetch('../php/Login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(loginData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert("Login bem-sucedido!");
            window.location.href = 'dashboard.html'; // Redireciona para a página do dashboard
        } else {
            alert('Erro: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro ao realizar login:', error);
        alert('Ocorreu um erro ao tentar realizar o login. Tente novamente.');
    });
};
