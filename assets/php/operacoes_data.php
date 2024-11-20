<?php
include("../../connection.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    $data = $_POST['data'];
    $tipo = $_POST['tipo'];
    $cliente = $_POST['cliente'];
    $vendedor = $_POST['vendedor'];
    $veiculo = $_POST['veiculo'];
    $valor = $_POST['valor'];

    $sql = "SELECT * FROM operacoes WHERE numero='$numero'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: operacoes.php?error=Erro ao adicionar operação.");
        exit();
    }else {
        $query = "INSERT INTO operacoes (numero, data, tipo, cliente, vendedor, veiculo, valor) VALUES ('$numero', '$data', '$tipo', '$cliente', '$vendedor', '$veiculo', '$valor')";
        $data = mysqli_query($conn, $query);

        header("Location: operacoes.php?success=Adicionar operacão com sucesso.");
        exit();
    }
}