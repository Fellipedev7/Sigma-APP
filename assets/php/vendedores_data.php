<?php
include("../../connection.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $usuario = $_POST['usuario'];

    $sql = "SELECT * FROM vendedores WHERE codigo='$codigo'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: clientes.php?error=Erro ao adicionar vendedor.");
        exit();
    }else {
        $query = "INSERT INTO vendedores (codigo, usuario) VALUES ('$codigo', '$usuario')";
        $data = mysqli_query($conn, $query);

        header("Location: vendedores.php?success=Adicionar vendedor com sucesso.");
        exit();
    }
}