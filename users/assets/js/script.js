function validateLogin() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('errorMessage');
  
    // Exemplo de validação simples
    if (username === '' || password === '') {
        errorMessage.textContent = 'Por favor, preencha todos os campos.';
        return false
    }else{
        window.location.href = "http://localhost/assets/html/dashboard.html";
        errorMessage.textContent = '';
        alert('Login realizado com sucesso!');
    }
}