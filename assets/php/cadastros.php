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
                <li><a href="vendedores.php">Vendedores</a></li>
                <li><a href="veiculos.php">Veículos</a></li>
                <li><a href="operacoes.php">Operações</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="montadoras.php">Montadoras</a></li>
                <li><a href="cadastros.php" class="active">Cadastros</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <h1>Cadastros</h1>
            <form method="post">
				<div class="parallel">
					<input type="text" class="search-box" id="search" name="search" placeholder="Pesquisa de email">
					<input type="submit" class="search-btn" name="submit-search" value="Pesquisa">
				</div>
			</form>
            <button onclick="showForm()">Adicionar Cadastro</button>
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>CPF</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Estado</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php           
            $sql = "SELECT * FROM cadastrar";
            $result = mysqli_query($conn, $sql);

            if (isset($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM cadastrar WHERE email LIKE '%$search%'";
            
                $result = mysqli_query($conn, $sql);
                $queryr = mysqli_num_rows($result);
            
                if ($queryr > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $link = $row['nome'];
                        ?>
                            <tr>
                            <td><?php echo htmlspecialchars($row['nome']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['senha']); ?></td>
                            <td><?php echo htmlspecialchars($row['cpf']); ?></td>
                            <td><?php echo htmlspecialchars($row['cidade']); ?></td>
                            <td><?php echo htmlspecialchars($row['bairro']); ?></td>
                            <td><?php echo htmlspecialchars($row['estado']); ?></td>
                            <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                            <td><?php echo htmlspecialchars($row['celular']); ?></td>
                            <td><a href="cadastros_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                            <td><a href="cadastros_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
                            </tr>
                        <?php
                        exit();
                    }
                } else {
                    header("Location: cadastros.php?error=Não há resultados que correspondem à sua pesquisa.");
                    exit();
                }
            }
                    
            if(!$result){
                die("Query Failed: " . mysqli_error($conn));
            } else {
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['senha']); ?></td>
                <td><?php echo htmlspecialchars($row['cpf']); ?></td>
                <td><?php echo htmlspecialchars($row['cidade']); ?></td>
                <td><?php echo htmlspecialchars($row['bairro']); ?></td>
                <td><?php echo htmlspecialchars($row['estado']); ?></td>
                <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                <td><?php echo htmlspecialchars($row['celular']); ?></td>
                <td><a href="cadastros_update.php?id=<?php echo $row['id']; ?>"><button>Alterar</button></a></td>
                <td><a href="cadastros_delete.php?id=<?php echo $row['id']; ?>"><button>Excluir</button></a></td>
            </tr>
            <?php 
                }
            } 
        ?>
            </tbody>
        </table>

        <div id="formContainer" class="form-container">
            <h2 id="formTitle">Adicionar Cadastro</h2>
            <form action="cadastros_data.php" method="post">
                <label for="username">Nome: </label>
                <input type="text" id="username" name="nome">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="password">Senha</label>
                <input type="password" name="senha" id="password">
                <label for="CPF">CPF: </label>
                <input type="text" id="CPF" name="cpf">
                <label for="Endereço">Endereço: </label>
                <input type="text" name="cidade" id="Endereço" placeholder="Cidade">
                <input type="text" name="bairro" id="bairro" placeholder="Bairro">
                <input type="text" name="estado" id="estado" placeholder="Estado">
                <label for="telefoneResidencial">Telefone Residencial: </label>
                <input type="text" name="telefone" id="telefone">
                <label for="celular">Celular: </label>
                <input type="text" name="celular" id="celular">
                <input type="submit" class="login-btn" value="Cadastre-se" />
            </form>
        </div>
    </div>
    
    <script src="/assets/js/montadoras.js"></script>
</body>
</html>
