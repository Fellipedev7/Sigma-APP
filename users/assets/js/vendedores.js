// Dados dos vendedores
let vendedores = [];

// Função para mostrar o formulário de adicionar/editar
function showForm() {
    document.getElementById('formContainer').style.display = 'block';
}

// Função para esconder o formulário
function hideForm() {
    document.getElementById('formContainer').style.display = 'none';
    clearForm();
}

// Função para limpar o formulário
/*function clearForm() {
    document.getElementById('vendedorForm').reset();
    document.getElementById('vendedorId').value = '';
    document.getElementById('formTitle').textContent = 'Adicionar Vendedor';
}

// Função para salvar vendedor
function saveVendedor(event) {
    event.preventDefault();
    const id = document.getElementById('vendedorId').value;
    const codigo = document.getElementById('codigo').value;
    const usuario = document.getElementById('usuario').value;

    if (id) {
        // Atualizar vendedor existente
        const vendedor = vendedores.find(vend => vend.id === id);
        vendedor.codigo = codigo;
        vendedor.usuario = usuario;
    } else {
        // Adicionar novo vendedor
        vendedores.push({ id: Date.now().toString(), codigo, usuario });
    }

    renderVendedores();
    hideForm();
}

// Função para renderizar a tabela de vendedores
function renderVendedores() {
    const tbody = document.querySelector('#vendedoresTable tbody');
    tbody.innerHTML = '';
    vendedores.forEach(vendedor => {
        const row = `<tr>
            <td>${vendedor.codigo}</td>
            <td>${vendedor.usuario}</td>
            <td>
                <button onclick="editVendedor('${vendedor.id}')">Editar</button>
                <button onclick="deleteVendedor('${vendedor.id}')">Excluir</button>
            </td>
        </tr>`;
        tbody.insertAdjacentHTML('beforeend', row);
    });
}

// Função para editar vendedor
function editVendedor(id) {
    const vendedor = vendedores.find(vend => vend.id === id);
    document.getElementById('vendedorId').value = vendedor.id;
    document.getElementById('codigo').value = vendedor.codigo;
    document.getElementById('usuario').value = vendedor.usuario;
    document.getElementById('formTitle').textContent = 'Editar Vendedor';
    showForm();
}

// Função para excluir vendedor
function deleteVendedor(id) {
    vendedores = vendedores.filter(vend => vend.id !== id);
    renderVendedores();
}

// Render inicial para popular a tabela vazia
renderVendedores();*/