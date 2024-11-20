let veiculos = [];

function showForm() {
    document.getElementById('formContainer').style.display = 'block';
}

function hideForm() {
    document.getElementById('formContainer').style.display = 'none';
    clearForm();
}

/*function clearForm() {
    document.getElementById('veiculoForm').reset();
    document.getElementById('veiculoId').value = '';
    document.getElementById('formTitle').textContent = 'Adicionar Veículo';
}

function saveVeiculo(event) {
    event.preventDefault();
    const id = document.getElementById('veiculoId').value;
    const chassi = document.getElementById('chassi').value;
    const placa = document.getElementById('placa').value;
    const marca = document.getElementById('marca').value;
    const modelo = document.getElementById('modelo').value;
    const anoFabricacao = document.getElementById('anoFabricacao').value;

    if (id) {
        const veiculo = veiculos.find(v => v.id === id);
        veiculo.chassi = chassi;
        veiculo.placa = placa;
        veiculo.marca = marca;
        veiculo.modelo = modelo;
        veiculo.anoFabricacao = anoFabricacao;
    } else {
        veiculos.push({ id: Date.now().toString(), chassi, placa, marca, modelo, anoFabricacao });
    }

    renderVeiculos();
    hideForm();
}

function renderVeiculos() {
    const tbody = document.querySelector('#veiculosTable tbody');
    tbody.innerHTML = '';
    veiculos.forEach(veiculo => {
        const row = `<tr>
            <td>${veiculo.chassi}</td>
            <td>${veiculo.placa}</td>
            <td>${veiculo.marca}</td>
            <td>${veiculo.modelo}</td>
            <td>${veiculo.anoFabricacao}</td>
            <td>
                <button onclick="editVeiculo('${veiculo.id}')">Editar</button>
                <button onclick="deleteVeiculo('${veiculo.id}')">Excluir</button>
            </td>
        </tr>`;
        tbody.insertAdjacentHTML('beforeend', row);
    });
}

function editVeiculo(id) {
    const veiculo = veiculos.find(v => v.id === id);
    document.getElementById('veiculoId').value = veiculo.id;
    document.getElementById('chassi').value = veiculo.chassi;
    document.getElementById('placa').value = veiculo.placa;
    document.getElementById('marca').value = veiculo.marca;
    document.getElementById('modelo').value = veiculo.modelo;
    document.getElementById('anoFabricacao').value = veiculo.anoFabricacao;
    document.getElementById('formTitle').textContent = 'Editar Veículo';
    showForm();
}

function deleteVeiculo(id) {
    veiculos = veiculos.filter(v => v.id !== id);
    renderVeiculos();
}

renderVeiculos();*/