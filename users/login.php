<?php
session_start();

include("connection.php");
error_reporting(0);

if (isset($_POST['email']) && isset($_POST['senha'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        header("Location: index.php?error=Todos os campos são obrigatórios.");
        exit();
    }

    $sql = "SELECT * FROM cadastrar WHERE email='$email' AND senha='$senha'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['senha'] === $senha) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['senha'] = $row['senha'];
            $_SESSION['cpf'] = $row['cpf'];
            $_SESSION['cidade'] = $row['cidade'];
            $_SESSION['bairro'] = $row['bairro'];
            $_SESSION['estado'] = $row['estado'];
            $_SESSION['telefone'] = $row['telefone'];
            $_SESSION['celular'] = $row['celular'];

            session_regenerate_id(true);
            header("Location: assets/php/dashboard.php");
            exit();
        }
    }
    header("Location: index.php?error=Senha ou email incorreto.");
    exit();
}