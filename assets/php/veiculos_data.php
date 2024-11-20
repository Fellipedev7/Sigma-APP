<?php
include("../../connection.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chassi = $_POST['chassi'];
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];

    $sql = "SELECT * FROM veiculos WHERE chassi='$chassi'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: veiculos.php?error=Erro ao adicionar veículo.");
        exit();
    }else {
        $query = "INSERT INTO veiculos (chassi, placa, marca, modelo, ano) VALUES ('$chassi', '$placa', '$marca', '$modelo', '$ano')";
        $data = mysqli_query($conn, $query);

        header("Location: veiculos.php?success=Adicionar veículo com sucesso.");
        exit();
    }
}