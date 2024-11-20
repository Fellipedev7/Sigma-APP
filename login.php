<?php
session_start();

include("connection.php");
error_reporting(0);

if (isset($_POST['admin']) && isset($_POST['senha'])) {

    $admin = $_POST['admin'];
    $senha = $_POST['senha'];

    if (empty($admin) || empty($senha)) {
        header("Location: index.php?error=Todos os campos são obrigatórios.");
        exit();
    }

    $sql = "SELECT * FROM gerente WHERE admin='$admin' AND senha='$senha'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['admin'] === $admin && $row['senha'] === $senha) {
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['senha'] = $row['senha'];

            session_regenerate_id(true);
            header("Location: assets/php/dashboard.php");
            exit();
        }
    }
    header("Location: index.php?error=Senha ou admin incorreto.");
    exit();
}