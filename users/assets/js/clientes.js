
let clientes = [];


function showForm() {
    document.getElementById('formContainer').style.display = 'block';
}


function hideForm() {
    document.getElementById('formContainer').style.display = 'none';
    clearForm();
}


/*function clearForm() {
    document.getElementById('clienteForm').reset();
    document.getElementById('clienteId').value = '';
    document.getElementById('formTitle').textContent = 'Adicionar Cliente';
}


function saveCliente(event) {
    event.preventDefault();
    const id = document.getElementById('clienteId').value;
    const cpf = document.getElementById('cpf').value;
    const nome = document.getElementById('nome').value;
    const endereco = document.getElementById('endereco').value;
    const telefone = document.getElementById('telefone').value;
    const renda = document.getElementById('renda').value;

    if (id) {
        
        const cliente = clientes.find(cli => cli.id === id);
        cliente.cpf = cpf;
        cliente.nome = nome;
        cliente.endereco = endereco;
        cliente.telefone = telefone;
        cliente.renda = renda;
    } else {
        
        clientes.push({ id: Date.now().toString(), cpf, nome, endereco, telefone, renda });
    }

    renderClientes();
    hideForm();
}


function renderClientes() {
    const tbody = document.querySelector('#clientesTable tbody');
    tbody.innerHTML = '';
    clientes.forEach(cliente => {
        const row = `<tr>
            <td>${cliente.cpf}</td>
            <td>${cliente.nome}</td>
            <td>${cliente.endereco}</td>
            <td>${cliente.telefone}</td>
            <td>${cliente.renda}</td>
            <td>
                <button onclick="editCliente('${cliente.id}')">Editar</button>
                <button onclick="deleteCliente('${cliente.id}')">Excluir</button>
            </td>
        </tr>`;
        tbody.insertAdjacentHTML('beforeend', row);
    });
}


function editCliente(id) {
    const cliente = clientes.find(cli => cli.id === id);
    document.getElementById('clienteId').value = cliente.id;
    document.getElementById('cpf').value = cliente.cpf;
    document.getElementById('nome').value = cliente.nome;
    document.getElementById('endereco').value = cliente.endereco;
    document.getElementById('telefone').value = cliente.telefone;
    document.getElementById('renda').value = cliente.renda;
    document.getElementById('formTitle').textContent = 'Editar Cliente';
    showForm();
}*/