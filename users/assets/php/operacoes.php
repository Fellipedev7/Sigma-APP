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
    <title>Operações - Rede Sigma</title>
    <link rel="stylesheet" href="/assets/css/operacoes-style.css">
    <link rel="shortcut icon" href="/assets/img/SIGMA_LOGO-removebg-preview.png" type="image/x-icon">

</head>
<body>
    <div class="sidebar">
        <img src="/assets/img/SIGMA LOGO.jpg" alt="Logo Rede Sigma" class="logo">
        <nav>
            <ul>
                <li><a href="dashboard.php">Menu Principal</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="veiculos.php">Veículos</a></li>
                <li><a href="operacoes.php" class="active">Operações</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="montadoras.php">Montadoras</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <h1>Operações de Compra e Venda</h1>
            <form method="post">
				<div class="parallel">
					<input type="text" class="search-box" id="search" name="search" placeholder="Pesquisa de número">
					<input type="submit" class="search-btn" name="submit-search" value="Pesquisa">
				</div>
			</form>
            <button onclick="showForm()">Adicionar Operação</button>
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

        <table id="operacoesTable">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Veículo</th>
                    <th>Valor</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php           
            $sql = "SELECT * FROM operacoes";
            $result = mysqli_query($conn, $sql);

            if (isset($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM operacoes WHERE numero LIKE '%$search%'";
            
                $result = mysqli_query($conn, $sql);
                $queryr = mysqli_num_rows($result);
            
                if ($queryr > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                <td><?php echo htmlspecialchars($row['numero']); ?></td>
                <td><?php echo htmlspecialchars($row['data']); ?></td>
                <td><?php echo htmlspecialchars(isset($row['tipo']) ? 'Compra' : 'Venda'); ?></td>
                <td><?php echo htmlspecialchars($row['cliente']); ?></td>
                <td><?php echo htmlspecialchars($row['vendedor']); ?></td>
                <td><?php echo htmlspecialchars($row['veiculo']); ?></td>
                <td><?php echo htmlspecialchars($row['valor']); ?></td>
                <td><a href="operacoes_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="operacoes_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
                        <?php
                        exit();
                    }
                } else {
                    header("Location: operacoes.php?error=Não há resultados que correspondem à sua pesquisa.");
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
                <td><?php echo htmlspecialchars(isset($row['tipo']) ? 'Compra' : 'Venda'); ?></td>
                <td><?php echo htmlspecialchars($row['cliente']); ?></td>
                <td><?php echo htmlspecialchars($row['vendedor']); ?></td>
                <td><?php echo htmlspecialchars($row['veiculo']); ?></td>
                <td><?php echo htmlspecialchars($row['valor']); ?></td>
                <td><a href="operacoes_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="operacoes_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
            <?php 
                }
            } 
        ?>
            </tbody>
        </table>

        <div id="formContainer" class="form-container">
            <h2 id="formTitle">Adicionar Operação</h2>
            <form action="operacoes_data.php" method="post">
                <label for="numero">Número</label>
                <input type="text" id="numero" name="numero" required>
                
                <label for="data">Data</label>
                <input type="date" id="data" name="data" required>
                
                <label for="tipo">Tipo</label>
                <select id="tipo" name="tipo" required>
                    <option value="Compra" >Compra</option>
                    <option value="Venda" >Venda</option>
                </select>
                
                <label for="cliente">Cliente</label>
                <input type="text" id="cliente" name="cliente" required>
                
                <label for="vendedor">Vendedor</label>
                <input type="text" id="vendedor" name="vendedor" required>
                
                <label for="veiculo">Veículo</label>
                <input type="text" id="veiculo" name="veiculo" required>
                
                <label for="valor">Valor</label>
                <input type="number" id="valor" name="valor" required>
                
                <button type="submit">Salvar</button>
                <button type="button" onclick="hideForm()">Cancelar</button>
            </form>
        </div>
    </div>

    <script src="/assets/js/operacoes.js"></script>
</body>
</html>
