<?php
include("../../connection.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $renda = $_POST['renda'];

    /*if (empty($cpf) || empty($nome) || empty($endereco) || empty($telefone) || empty($renda)) {
        header("Location: clientes.php?error=Todos os campos são obrigatórios.");
        exit();
    }*/

    $sql = "SELECT * FROM clientes WHERE cpf='$cpf'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: clientes.php?error=Erro ao adicionar cliente.");
        exit();
    }else {
        $query = "INSERT INTO clientes (cpf, nome, endereco, telefone, renda) VALUES ('$cpf', '$nome', '$endereco', '$telefone', '$renda')";
        $data = mysqli_query($conn, $query);

        header("Location: clientes.php?success=Adicionar cliente com sucesso.");
        exit();
    }
}