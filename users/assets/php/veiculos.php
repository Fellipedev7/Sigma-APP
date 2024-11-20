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
    <title>Veículos - Rede Sigma</title>
    <link rel="stylesheet" href="/assets/css/veiculos-style.css">
    <link rel="shortcut icon" href="/assets/img/SIGMA_LOGO-removebg-preview.png" type="image/x-icon">

</head>
<body>
    <div class="sidebar">
        <img src="/assets/img/SIGMA LOGO.jpg" alt="Logo Rede Sigma" class="logo">
        <nav>
            <ul>
                <li><a href="dashboard.php">Menu Principal</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="veiculos.php" class="active">Veículos</a></li>
                <li><a href="operacoes.php">Operações</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="montadoras.php">Montadoras</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <h1>Veículos</h1>
            <form method="post">
				<div class="parallel">
					<input type="text" class="search-box" id="search" name="search" placeholder="Pesquisa de chassi">
					<input type="submit" class="search-btn" name="submit-search" value="Pesquisa">
				</div>
			</form>
            <button onclick="showForm()">Adicionar Veículo</button>
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

        <table id="veiculosTable">
            <thead>
                <tr>
                    <th>Número do Chassi</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano de Fabricação</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php           
            $sql = "SELECT * FROM veiculos";
            $result = mysqli_query($conn, $sql);

            if (isset($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM veiculos WHERE chassi LIKE '%$search%'";
            
                $result = mysqli_query($conn, $sql);
                $queryr = mysqli_num_rows($result);
            
                if ($queryr > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                <td><?php echo htmlspecialchars($row['chassi']); ?></td>
                <td><?php echo htmlspecialchars($row['placa']); ?></td>
                <td><?php echo htmlspecialchars($row['marca']); ?></td>
                <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                <td><?php echo htmlspecialchars($row['ano']); ?></td>
                <td><a href="veiculos_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="veiculos_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
                        <?php
                        exit();
                    }
                } else {
                    header("Location: veiculos.php?error=Não há resultados que correspondem à sua pesquisa.");
                    exit();
                }
            }
                    
            if(!$result){
                die("Query Failed: " . mysqli_error($conn));
            } else {
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['chassi']); ?></td>
                <td><?php echo htmlspecialchars($row['placa']); ?></td>
                <td><?php echo htmlspecialchars($row['marca']); ?></td>
                <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                <td><?php echo htmlspecialchars($row['ano']); ?></td>
                <td><a href="veiculos_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="veiculos_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
            <?php 
                }
            } 
        ?>
            </tbody>
        </table>

        <div id="formContainer" class="form-container">
            <h2 id="formTitle">Adicionar Veículo</h2>
            <form action="veiculos_data.php" method="post">
                <label for="chassi">Número do Chassi</label>
                <input type="text" id="chassi" name="chassi" required>
                <label for="placa">Placa</label>
                <input type="text" id="placa" name="placa" required>
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" required>
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo" required>
                <label for="anoFabricacao">Ano de Fabricação</label>
                <input type="text" id="anoFabricacao" name="ano" required>
                <button type="submit">Salvar</button>
                <button type="button" onclick="hideForm()">Cancelar</button>
            </form>
        </div>
    </div>
    
    <script src="/assets/js/veiculos.js"></script>
</body>
</html>
