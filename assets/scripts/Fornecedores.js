function AdicionarFornecedor(event) {
    event.preventDefault();
    let nomeFornecedor = document.getElementById('supplierName').value; 
    let contatoFornecedor = document.getElementById('supplierContact').value; 
    fetch('../php/AdicionarFornecedor.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ nomeFornecedor, contatoFornecedor })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(data.message); 
            TodosFornecedores(); 
            document.getElementById('supplierForm').reset(); 
        } else {
            alert('Erro: ' + data.message); 
        }
    })
    .catch(error => {
        console.error('Erro ao cadastrar fornecedor:', error);
        alert('Ocorreu um erro ao cadastrar o fornecedor. Tente novamente.');
    });
}

function TodosFornecedores() {
    fetch('../php/TodosFuncionarios.php', { 
        method: 'GET' 
    })
    .then(response => response.json()) 
    .then(data => {
        const suppliersUl = document.getElementById('suppliersUl');
        suppliersUl.innerHTML = ''; 

        if (data.status === 'success') {
            if (data.data.length === 0) { 
                suppliersUl.innerHTML = '<li>Nenhum fornecedor cadastrado.</li>'; 
            } else {
                data.data.forEach(fornecedor => { 
                    const li = document.createElement('li');
                    li.textContent = `${fornecedor.nome} - ${fornecedor.contato}`; 
                    li.setAttribute('data-id', fornecedor.id); 
                    li.onclick = () => { 
                        selectedFornecedorId = fornecedor.id;
                        document.querySelectorAll('#suppliersUl li').forEach(item => item.classList.remove('selected'));
                        li.classList.add('selected'); 
                    };
                    suppliersUl.appendChild(li);
                });
            }
        } else {
            console.error(data.message); 
        }
    })
    .catch(error => {
        console.error('Erro ao buscar fornecedor:', error); 
    });
}
