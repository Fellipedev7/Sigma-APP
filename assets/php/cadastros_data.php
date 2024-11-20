<?php
include("../../connection.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];

    $sql = "SELECT * FROM cadastrar WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: cadastros.php?error=Erro ao adicionar cadastro.");
        exit();
    }else {
        $query = "INSERT INTO cadastrar (nome, email, senha, cpf, cidade, bairro, estado, telefone, celular) VALUES ('$nome', '$email', '$senha', '$cpf', '$cidade', '$bairro', '$estado', '$telefone', '$celular')";
        $data = mysqli_query($conn, $query);

        header("Location: cadastros.php?success=Adicionar cadastro com sucesso.");
        exit();
    }
}