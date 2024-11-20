<?php
include("connection.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sec_senha = $_POST['sec_senha'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];

    if (empty($nome) || empty($email) || empty($senha) || empty($sec_senha) || empty($cpf) || empty($cidade) || empty($bairro) || empty($estado) || empty($telefone) || empty($celular)) {
        header("Location: cadastro.php?error=Todos os campos são obrigatórios.");
        exit();
    }

    $sql = "SELECT * FROM cadastrar WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: cadastro.php?error=O email foi recebido, tente outro.");
        exit();
    }else{
        $query = "INSERT INTO cadastrar (nome, email, senha, sec_senha, cpf, cidade, bairro, estado, telefone, celular) VALUES ('$nome', '$email', '$senha', '$sec_senha', '$cpf', '$cidade', '$bairro', '$estado', '$telefone', '$celular')";
        $data = mysqli_query($conn, $query);

        header("Location: cadastro.php?success=Sua conta foi criada com sucesso.");
        exit();
    }
}
