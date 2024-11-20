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
    <title>Pedidos - Rede Sigma</title>
    <link rel="stylesheet" href="/assets/css/pedidos-style.css">
    <link rel="shortcut icon" href="/assets/img/SIGMA_LOGO-removebg-preview.png" type="image/x-icon">

</head>
<body>
    <div class="sidebar">
        <img src="/assets/img/SIGMA LOGO.jpg" alt="Logo Rede Sigma" class="logo">
        <nav>
            <ul>
                <li><a href="dashboard.php">Menu Principal</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="vendedores.php">Vendedores</a></li>
                <li><a href="veiculos.php">Veículos</a></li>
                <li><a href="operacoes.php">Operações</a></li>
                <li><a href="pedidos.php" class="active">Pedidos</a></li>
                <li><a href="montadoras.php">Montadoras</a></li>
                <li><a href="cadastros.php">Cadastros</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <h1>Pedidos</h1>
            <form method="post">
				<div class="parallel">
					<input type="text" class="search-box" id="search" name="search" placeholder="Pesquisa de número">
					<input type="submit" class="search-btn" name="submit-search" value="Pesquisa">
				</div>
			</form>
            <button onclick="showForm()">Adicionar Pedido</button>
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

        <table id="pedidosTable">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Montadora</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Acessórios</th>
                    <th>Valor</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php           
            $sql = "SELECT * FROM pedidos";
            $result = mysqli_query($conn, $sql);

            if (isset($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM pedidos WHERE numero LIKE '%$search%'";
            
                $result = mysqli_query($conn, $sql);
                $queryr = mysqli_num_rows($result);
            
                if ($queryr > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                <td><?php echo htmlspecialchars($row['numero']); ?></td>
                <td><?php echo htmlspecialchars($row['data']); ?></td>
                <td><?php echo htmlspecialchars($row['cliente']); ?></td>
                <td><?php echo htmlspecialchars($row['vendedor']); ?></td>
                <td><?php echo htmlspecialchars($row['montadora']); ?></td>
                <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                <td><?php echo htmlspecialchars($row['ano']); ?></td>
                <td><?php echo htmlspecialchars($row['cor']); ?></td>
                <td><?php echo htmlspecialchars($row['acessorios']); ?></td>
                <td><?php echo htmlspecialchars($row['valor']); ?></td>
                <td><a href="pedidos_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="pedidos_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
                        <?php
                        exit();
                    }
                } else {
                    header("Location: pedidos.php?error=Não há resultados que correspondem à sua pesquisa.");
                    exit();
                }
            }
                    
            if(!$result){
                die("Query Failed: " . mysqli_error($conn));
            } else {
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['numero']); ?></td>
                <td><?php echo htmlspecialchars($row['data']); ?></td>
                <td><?php echo htmlspecialchars($row['cliente']); ?></td>
                <td><?php echo htmlspecialchars($row['vendedor']); ?></td>
                <td><?php echo htmlspecialchars($row['montadora']); ?></td>
                <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                <td><?php echo htmlspecialchars($row['ano']); ?></td>
                <td><?php echo htmlspecialchars($row['cor']); ?></td>
                <td><?php echo htmlspecialchars($row['acessorios']); ?></td>
                <td><?php echo htmlspecialchars($row['valor']); ?></td>
                <td><a href="pedidos_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="pedidos_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
            <?php 
                }
            } 
        ?>
            </tbody>
        </table>

        <div id="formContainer" class="form-container">
            <h2 id="formTitle">Adicionar Pedido</h2>
            <form action="pedidos_data.php" method="post">
                <label for="numero">Número</label>
                <input type="text" id="numero" name="numero" required>
                <label for="data">Data</label>
                <input type="date" id="data" name="data" required>
                <label for="cliente">Cliente</label>
                <input type="text" id="cliente" name="cliente" required>
                <label for="vendedor">Vendedor</label>
                <input type="text" id="vendedor" name="vendedor" required>
                <label for="montadora">Montadora</label>
                <input type="text" id="montadora" name="montadora" required>
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo" required>
                <label for="ano">Ano</label>
                <input type="text" id="ano" name="ano" required>
                <label for="cor">Cor</label>
                <input type="text" id="cor" name="cor" required>
                <label for="acessorios">Acessórios</label>
                <input type="text" id="acessorios" name="acessorios">
                <label for="valor">Valor</label>
                <input type="number" id="valor" name="valor" required>
                <button type="submit">Salvar</button>
                <button type="button" onclick="hideForm()">Cancelar</button>
            </form>
        </div>
    </div>

    <script src="/assets/js/pedidos.js"></script>
</body>
</html>
