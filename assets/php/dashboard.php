<?php
session_start();

include("../../connection.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal - Rede Sigma</title>
    <link rel="stylesheet" href="/assets/css/dashboard-style.css">
    <link rel="shortcut icon" href="/assets/img/SIGMA_LOGO-removebg-preview.png" type="image/x-icon">

</head>
<body>
    
    <div class="sidebar">
        <img src="/assets/img/SIGMA LOGO.jpg" alt="Logo Rede Sigma" class="logo">
        <nav>
            <ul>
                <li><a href="dashboard.php" class = "active">Menu Principal</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="vendedores.php">Vendedores</a></li>
                <li><a href="veiculos.php">Veículos</a></li>
                <li><a href="operacoes.php">Operações</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="montadoras.php">Montadoras</a></li>
                <li><a href="cadastros.php">Cadastros</a></li>
            </ul>
        </nav>
    </div>

   
    <div class="main-content">
        <header>
            <h1>Menu Principal</h1>
            <div class="user-info">
                <p>Usuário: <strong>Admin</strong></p>
                <a href="logout.php"><button>Logout</button></a>
            </div>
        </header>
        <section class="dashboard-cards">
            <div class="card">
                <h2>Veículos em Estoque</h2>
                <p>120</p>
            </div>
            <div class="card">
                <h2>Pedidos Recentes</h2>
                <p>35</p>
            </div>
            <div class="card">
                <h2>Operações Pendentes</h2>
                <p>22</p>
            </div>
        </section>
    </div>
    
    <script src="/assets/js/dashboard.js"></script>
</body>
</html>
