function validateCadastro() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const passwordConf = document.getElementById('passwordConf').value;
    const errorMessage = document.getElementById('errorMessage');
    
    // Exemplo de validação simples
    if (username === '' || password === '' || passwordConf === '') {
        errorMessage.textContent = 'Por favor, preencha todos os campos.';
        return false;
    }else{
        window.location.href = "index.html/../../..";
        errorMessage.textContent = '';
        alert('Cadastro realizado com sucesso!'); // Limpar mensagem de erro e continuar o login
    }
    
    
}