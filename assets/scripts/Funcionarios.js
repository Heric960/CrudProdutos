async function AdicionarFuncionario() {
 
    let nome = document.getElementById('username').value.trim();
    let senha = document.getElementById('password').value.trim();

    
    if (nome === "" || senha === "") {
        alert("Por favor, preencha todos os campos.");
        return;
    }


    let dadosFuncionario = {
        nome: nome,
        senha: senha
    };

    try {

        let response = await fetch('../php/AdicionarFuncionario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dadosFuncionario) 
        });


        if (response.ok) {
            let resultado = await response.json(); 
            alert(resultado.message); 
        } else {

            let errorText = await response.text();
            console.error("Erro ao adicionar funcionário:", errorText);
            alert("Erro ao adicionar funcionário: " + errorText);
        }
    } catch (erro) {
        console.error("Erro na requisição:", erro);
        alert("Falha na comunicação com o servidor.");
    }
}
