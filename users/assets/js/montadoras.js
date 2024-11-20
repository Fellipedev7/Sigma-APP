let montadoras = [];

function showForm() {
    document.getElementById('formContainer').style.display = 'block';
}

function hideForm() {
    document.getElementById('formContainer').style.display = 'none';
    clearForm();
}

/*function clearForm() {
    document.getElementById('montadoraForm').reset();
    document.getElementById('montadoraId').value = '';
    document.getElementById('formTitle').textContent = 'Adicionar Montadora';
}

function saveMontadora(event) {
    event.preventDefault();
    const id = document.getElementById('montadoraId').value;
    const cnpj = document.getElementById('cnpj').value;
    const razaoSocial = document.getElementById('razaoSocial').value;
    const marca = document.getElementById('marca').value;
    const contato = document.getElementById('contato').value;
    const telefoneComercial = document.getElementById('telefoneComercial').value;

    if (id) {
        const montadora = montadoras.find(m => m.id === id);
        montadora.cnpj = cnpj;
        montadora.razaoSocial = razaoSocial;
        montadora.marca = marca;
        montadora.contato = contato;
        montadora.telefoneComercial = telefoneComercial;
    } else {
        montadoras.push({ id: Date.now().toString(), cnpj, razaoSocial, marca, contato, telefoneComercial });
    }

    renderMontadoras();
    hideForm();
}

function renderMontadoras() {
    const tbody = document.querySelector('#montadorasTable tbody');
    tbody.innerHTML = '';
    montadoras.forEach(montadora => {
        const row = `<tr>
            <td>${montadora.cnpj}</td>
            <td>${montadora.razaoSocial}</td>
            <td>${montadora.marca}</td>
            <td>${montadora.contato}</td>
            <td>${montadora.telefoneComercial}</td>
            <td>
                <button onclick="editMontadora('${montadora.id}')">Editar</button>
                <button onclick="deleteMontadora('${montadora.id}')">Excluir</button>
            </td>
        </tr>`;
        tbody.insertAdjacentHTML('beforeend', row);
    });
}

function editMontadora(id) {
    const montadora = montadoras.find(m => m.id === id);
    document.getElementById('montadoraId').value = montadora.id;
    document.getElementById('cnpj').value = montadora.cnpj;
    document.getElementById('razaoSocial').value = montadora.razaoSocial;
    document.getElementById('marca').value = montadora.marca;
    document.getElementById('contato').value = montadora.contato;
    document.getElementById('telefoneComercial').value = montadora.telefoneComercial;
    document.getElementById('formTitle').textContent = 'Editar Montadora';
    showForm();
}

function deleteMontadora(id) {
    montadoras = montadoras.filter(m => m.id !== id);
    renderMontadoras();
}

renderMontadoras();*/