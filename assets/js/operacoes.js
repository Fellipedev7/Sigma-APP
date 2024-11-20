let operacoes = [];

function showForm() {
    document.getElementById('formContainer').style.display = 'block';
}

function hideForm() {
    document.getElementById('formContainer').style.display = 'none';
    clearForm();
}

/*function clearForm() {
    document.getElementById('operacaoForm').reset();
    document.getElementById('operacaoId').value = '';
    document.getElementById('formTitle').textContent = 'Adicionar Operação';
}

function saveOperacao(event) {
    event.preventDefault();
    const id = document.getElementById('operacaoId').value;
    const numero = document.getElementById('numero').value;
    const data = document.getElementById('data').value;
    const tipo = document.getElementById('tipo').value;
    const cliente = document.getElementById('cliente').value;
    const vendedor = document.getElementById('vendedor').value;
    const veiculo = document.getElementById('veiculo').value;
    const valor = document.getElementById('valor').value;

    if (id) {
        const operacao = operacoes.find(op => op.id === id);
        operacao.numero = numero;
        operacao.data = data;
        operacao.tipo = tipo;
        operacao.cliente = cliente;
        operacao.vendedor = vendedor;
        operacao.veiculo = veiculo;
        operacao.valor = valor;
    } else {
        operacoes.push({ id: Date.now().toString(), numero, data, tipo, cliente, vendedor, veiculo, valor });
    }

    renderOperacoes();
    hideForm();
}

function renderOperacoes() {
    const tbody = document.querySelector('#operacoesTable tbody');
    tbody.innerHTML = '';
    operacoes.forEach(operacao => {
        const row = `<tr>
            <td>${operacao.numero}</td>
            <td>${operacao.data}</td>
            <td>${operacao.tipo}</td>
            <td>${operacao.cliente}</td>
            <td>${operacao.vendedor}</td>
            <td>${operacao.veiculo}</td>
            <td>${operacao.valor}</td>
            <td>
                <button onclick="editOperacao('${operacao.id}')">Editar</button>
                <button onclick="deleteOperacao('${operacao.id}')">Excluir</button>
            </td>
        </tr>`;
        tbody.innerHTML += row;
    });
}

function editOperacao(id) {
    const operacao = operacoes.find(op => op.id === id);
    document.getElementById('operacaoId').value = operacao.id;
    document.getElementById('numero').value = operacao.numero;
    document.getElementById('data').value = operacao.data;
    document.getElementById('tipo').value = operacao.tipo;
    document.getElementById('cliente').value = operacao.cliente;
    document.getElementById('vendedor').value = operacao.vendedor;
    document.getElementById('veiculo').value = operacao.veiculo;
    document.getElementById('valor').value = operacao.valor;

    document.getElementById('formTitle').textContent = 'Editar Operação';
    showForm();
}

function deleteOperacao(id) {
    operacoes = operacoes.filter(op => op.id !== id);
    renderOperacoes();
}

document.addEventListener('DOMContentLoaded', renderOperacoes);*/