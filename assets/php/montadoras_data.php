<?php
include("../../connection.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnpj = $_POST['cnpj'];
    $social = $_POST['social'];
    $marca = $_POST['marca'];
    $contato = $_POST['contato'];
    $telefone = $_POST['telefone'];

    $sql = "SELECT * FROM montadores WHERE cnpj='$cnpj'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: montadoras.php?error=Erro ao adicionar montadora.");
        exit();
    }else {
        $query = "INSERT INTO montadores (cnpj, social, marca, contato, telefone) VALUES ('$cnpj', '$social', '$marca', '$contato', '$telefone')";
        $data = mysqli_query($conn, $query);

        header("Location: montadoras.php?success=Adicionar montadora com sucesso.");
        exit();
    }
}