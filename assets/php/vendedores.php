<?php
session_start();

include("../../connection.php");
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores - Rede Sigma</title>
    <link rel="stylesheet" href="/assets/css/vendedores-style.css">
    <link rel="shortcut icon" href="/assets/img/SIGMA_LOGO-removebg-preview.png" type="image/x-icon">

</head>
<body>
    
    <div class="sidebar">
        <img src="/assets/img/SIGMA LOGO.jpg" alt="Logo Rede Sigma" class="logo">
        <nav>
            <ul>
                <li><a href="dashboard.php">Menu Principal</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="vendedores.php" class="active">Vendedores</a></li>
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
            <h1>Vendedores</h1>
            <form method="post">
				<div class="parallel">
					<input type="text" class="search-box" id="search" name="search" placeholder="Pesquisa de código">
					<input type="submit" class="search-btn" name="submit-search" value="Pesquisa">
				</div>
			</form>
            <button onclick="showForm()">Adicionar Vendedor</button>
        </header>
        
        <?php if (isset($_GET['error'])) { ?>
				<p style="color: white; background-color: #ff8c00; border-radius: 3px; text-align: center; padding: 5px;">
					<?php echo $_GET['error']; ?>
				</p>
			<?php } ?>
        <?php if (isset($_GET['success'])) { ?>
				<p style="color: white; background-color: green; border-radius: 3px; text-align: center; padding: 5px;">
					<?php echo $_GET['success']; ?>
				</p>
	    <?php } ?>
        
        <table id="vendedoresTable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Usuário</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php           
                    $sql = "SELECT * FROM vendedores";
                    $result = mysqli_query($conn, $sql);

                    if (isset($_POST['submit-search'])) {
                        $search = mysqli_real_escape_string($conn, $_POST['search']);
                        $sql = "SELECT * FROM vendedores WHERE codigo LIKE '%$search%'";
                    
                        $result = mysqli_query($conn, $sql);
                        $queryr = mysqli_num_rows($result);
                    
                        if ($queryr > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                        <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                        <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                        <td><a href="vendedores_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                        <td><a href="vendedores_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
                    </tr>
                                <?php
                                exit();
                            }
                        } else {
                            header("Location: vendedores.php?error=Não há resultados que correspondem à sua pesquisa.");
                            exit();
                        }
                    }
                    
                    if(!$result){
                        die("Query Failed: " . mysqli_error($conn));
                    } else {
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                        <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                        <td><a href="vendedores_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                        <td><a href="vendedores_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
                    </tr>
                <?php 
                        }
                    }
                ?>
            </tbody>
        </table>
        
        <div id="formContainer" class="form-container">
            <h2 id="formTitle">Adicionar Vendedor</h2>
            <form action="vendedores_data.php" method="post">
                <label for="codigo">Código</label>
                <input type="text" id="codigo" name="codigo" required>
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" required>
                <button type="submit">Salvar</button>
                <button type="button" onclick="hideForm()">Cancelar</button>
            </form>
        </div>
    </div>
    
    <script src="/assets/js/vendedores.js"></script>
</body>
</html>
