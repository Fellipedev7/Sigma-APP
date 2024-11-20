let pedidos = [];

function showForm() {
    document.getElementById('formContainer').style.display = 'block';
}

function hideForm() {
    document.getElementById('formContainer').style.display = 'none';
    clearForm();
}

/*function clearForm() {
    document.getElementById('pedidoForm').reset();
    document.getElementById('pedidoId').value = '';
    document.getElementById('formTitle').textContent = 'Adicionar Pedido';
}

function savePedido(event) {
    event.preventDefault();
    const id = document.getElementById('pedidoId').value;
    const numero = document.getElementById('numero').value;
    const data = document.getElementById('data').value;
    const cliente = document.getElementById('cliente').value;
    const vendedor = document.getElementById('vendedor').value;
    const montadora = document.getElementById('montadora').value;
    const modelo = document.getElementById('modelo').value;
    const ano = document.getElementById('ano').value;
    const cor = document.getElementById('cor').value;
    const acessorios = document.getElementById('acessorios').value;
    const valor = document.getElementById('valor').value;

    if (id) {
        const pedido = pedidos.find(p => p.id === id);
        pedido.numero = numero;
        pedido.data = data;
        pedido.cliente = cliente;
        pedido.vendedor = vendedor;
        pedido.montadora = montadora;
        pedido.modelo = modelo;
        pedido.ano = ano;
        pedido.cor = cor;
        pedido.acessorios = acessorios;
        pedido.valor = valor;
    } else {
        pedidos.push({ id: Date.now().toString(), numero, data, cliente, vendedor, montadora, modelo, ano, cor, acessorios, valor });
    }

    renderPedidos();
    hideForm();
}

function renderPedidos() {
    const tbody = document.querySelector('#pedidosTable tbody');
    tbody.innerHTML = '';
    pedidos.forEach(pedido => {
        const row = `<tr>
            <td>${pedido.numero}</td>
            <td>${pedido.data}</td>
            <td>${pedido.cliente}</td>
            <td>${pedido.vendedor}</td>
            <td>${pedido.montadora}</td>
            <td>${pedido.modelo}</td>
            <td>${pedido.ano}</td>
            <td>${pedido.cor}</td>
            <td>${pedido.acessorios}</td>
            <td>${pedido.valor}</td>
            <td>
                <button onclick="editPedido('${pedido.id}')">Editar</button>
                <button onclick="deletePedido('${pedido.id}')">Excluir</button>
            </td>
        </tr>`;
        tbody.innerHTML += row;
    });
}

function editPedido(id) {
    const pedido = pedidos.find(p => p.id === id);
    document.getElementById('pedidoId').value = pedido.id;
    document.getElementById('numero').value = pedido.numero;
    document.getElementById('data').value = pedido.data;
    document.getElementById('cliente').value = pedido.cliente;
    document.getElementById('vendedor').value = pedido.vendedor;
    document.getElementById('montadora').value = pedido.montadora;
    document.getElementById('modelo').value = pedido.modelo;
    document.getElementById('ano').value = pedido.ano;
    document.getElementById('cor').value = pedido.cor;
    document.getElementById('acessorios').value = pedido.acessorios;
    document.getElementById('valor').value = pedido.valor;

    document.getElementById('formTitle').textContent = 'Editar Pedido';
    showForm();
}

function deletePedido(id) {
    pedidos = pedidos.filter(p => p.id !== id);
    renderPedidos();
}*/