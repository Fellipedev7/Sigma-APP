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
    <title>Montadoras - Rede Sigma</title>
    <link rel="stylesheet" href="/assets/css/montadoras-style.css">
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
                <li><a href="operacoes.php">Operações</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="montadoras.php" class="active">Montadoras</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <h1>Montadoras</h1>
            <form method="post">
				<div class="parallel">
					<input type="text" class="search-box" id="search" name="search" placeholder="Pesquisa de CNPJ">
					<input type="submit" class="search-btn" name="submit-search" value="Pesquisa">
				</div>
			</form>
            <button onclick="showForm()">Adicionar Montadora</button>
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
        
        <table id="montadorasTable">
            <thead>
                <tr>
                    <th>CNPJ</th>
                    <th>Razão Social</th>
                    <th>Marca</th>
                    <th>Contato</th>
                    <th>Telefone Comercial</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php           
            $sql = "SELECT * FROM montadores";
            $result = mysqli_query($conn, $sql);

            if (isset($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM montadoras WHERE cnpj LIKE '%$search%'";
            
                $result = mysqli_query($conn, $sql);
                $queryr = mysqli_num_rows($result);
            
                if ($queryr > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                <td><?php echo htmlspecialchars($row['cnpj']); ?></td>
                <td><?php echo htmlspecialchars($row['social']); ?></td>
                <td><?php echo htmlspecialchars($row['marca']); ?></td>
                <td><?php echo htmlspecialchars($row['contato']); ?></td>
                <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                <td><a href="montadoras_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="montadoras_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
                        <?php
                        exit();
                    }
                } else {
                    header("Location: montadoras.php?error=Não há resultados que correspondem à sua pesquisa.");
                    exit();
                }
            }
                    
            if(!$result){
                die("Query Failed: " . mysqli_error($conn));
            } else {
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['cnpj']); ?></td>
                <td><?php echo htmlspecialchars($row['social']); ?></td>
                <td><?php echo htmlspecialchars($row['marca']); ?></td>
                <td><?php echo htmlspecialchars($row['contato']); ?></td>
                <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                <td><a href="montadoras_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="montadoras_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
            <?php 
                }
            } 
        ?>
            </tbody>
        </table>

        <div id="formContainer" class="form-container">
            <h2 id="formTitle">Adicionar Montadora</h2>
            <form action="montadoras_data.php" method="post">
                <label for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" required>
                <label for="razaoSocial">Razão Social</label>
                <input type="text" id="razaoSocial" name="social" required>
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" required>
                <label for="contato">Contato</label>
                <input type="text" id="contato" name="contato" required>
                <label for="telefoneComercial">Telefone Comercial</label>
                <input type="tel" id="telefoneComercial" name="telefone" required>
                <button type="submit">Salvar</button>
                <button type="button" onclick="hideForm()">Cancelar</button>
            </form>
        </div>
    </div>
    
    <script src="/assets/js/montadoras.js"></script>
</body>
</html>
