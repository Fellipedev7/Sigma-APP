<?php
include("../../connection.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $vendedor = $_POST['vendedor'];
    $montadora = $_POST['montadora'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $acessorios = $_POST['acessorios'];
    $valor = $_POST['valor'];

    $sql = "SELECT * FROM pedidos WHERE numero='$numero'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: pedidos.php?error=Erro ao adicionar pedido.");
        exit();
    }else {
        $query = "INSERT INTO pedidos (numero, data, cliente, vendedor, montadora, modelo, ano, cor, acessorios, valor) VALUES ('$numero', '$data', '$cliente', '$vendedor', '$montadora', '$modelo', '$ano', '$cor', '$acessorios', '$valor')";
        $data = mysqli_query($conn, $query);

        header("Location: pedidos.php?success=Adicionar pedido com sucesso.");
        exit();
    }
}