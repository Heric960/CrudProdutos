async function AdicionarProdutosCesta(event) {
    event.preventDefault(); 

    let nomeProduto = document.getElementById('productName').value;
    let quantidade = parseInt(document.getElementById('productQuantity').value);

    if (!nomeProduto || quantidade <= 0) {
        alert('Por favor, preencha todos os campos corretamente.');
        return;
    }

    try {
        const response = await fetch('../php/AdicionarCesta.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ nomeProduto, quantidade }) 
        });

        const data = await response.json();

        if (data.status === 'success') {
            alert(data.message);
            AtualizarListaCesta(); 
            document.getElementById('basketForm').reset(); 
        } else {
            alert('Erro: ' + data.message);
        }
    } catch (error) {
        console.error('Erro ao adicionar produto à cesta:', error);
        alert('Ocorreu um erro. Tente novamente.');
    }
}

async function AtualizarListaCesta() {
    try {
        const response = await fetch('../php/ObterCesta.php'); 
        const data = await response.json();

        const basketUl = document.getElementById('basketUl');
        basketUl.innerHTML = ''; 

        if (data.status === 'success') {
            if (data.data.length === 0) {
                basketUl.innerHTML = '<li>Nenhum produto na cesta.</li>';
            } else {
                data.data.forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = `${item.nome} - Quantidade: ${item.quantidade}`;
                    basketUl.appendChild(li);
                });
            }
        } else {
            console.error(data.message);
            basketUl.innerHTML = '<li>Erro ao carregar produtos na cesta.</li>';
        }
    } catch (error) {
        console.error('Erro ao buscar produtos da cesta:', error);
    }
}

window.onload = AtualizarListaCesta;
