<?php
session_start();

include("../../connection.php");
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$id = $_GET['id'];

	$sql_0 = "SELECT * FROM pedidos WHERE id='$id'";
	$result = mysqli_query($conn, $sql_0);
	$row = $result->fetch_assoc();

	$numero = $row['numero'];
    $data = $row['data'];
    $cliente = $row['cliente'];
    $vendedor = $row['vendedor'];
    $montadora = $row['montadora'];
    $modelo = $row['modelo'];
    $ano = $row['ano'];
    $cor = $row['cor'];
    $acessorios = $row['acessorios'];
    $valor = $row['valor'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];

    $numero = $_POST['numero'];
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $vendedor = $_POST['vendedor'];
    $montadora = $_POST['montadora'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $acessorios = $_POST['acessorios'];
    $valor = $_POST['valor'];

    $query = "UPDATE pedidos SET numero='$numero', data='$data', cliente='$cliente', vendedor='$vendedor', montadora='$montadora', modelo='$modelo', ano='$ano', acessorios='$acessorios', valor='$valor' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: pedidos.php?success=Atualização corretamente.");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/cadastro-style.css">
    <link rel="shortcut icon" href="/assets/img/SIGMA_LOGO-removebg-preview.png" type="image/x-icon">

</head>
<body>
    <div class="container">

    <?php if (isset($_GET['error'])) { ?>
				<p style="color: white; background-color: #ff8c00; border-radius: 3px; text-align: center; padding: 5px;">
					<?php echo $_GET['error']; ?>
				</p>
				<br><br>
			<?php } ?>
			<?php if (isset($_GET['success'])) { ?>
				<p style="color: white; background-color: green; border-radius: 3px; text-align: center; padding: 5px;">
					<?php echo $_GET['success']; ?>
				</p>
				<br><br>
	<?php } ?>

        <a href="pedidos.php">Voltar</a>
    <form action="" method="post">
        <div class="input-group">
        <label for="numero">Número</label>
        <input type="text" id="numero" name="numero" value="<?php echo $numero?>">
        </div>
        <div class="input-group">
        <label for="data">Data</label>
        <input type="date" id="data" name="data" value="<?php echo $data?>">
        </div>
        <div class="input-group">
        <label for="cliente">Cliente</label>
        <input type="text" id="cliente" name="cliente" value="<?php echo $cliente?>">
        </div>
        <div class="input-group">
        <label for="vendedor">Vendedor</label>
        <input type="text" id="vendedor" name="vendedor" value="<?php echo $vendedor?>">
        </div>
        <div class="input-group">
        <label for="montadora">Montadora</label>
        <input type="text" id="montadora" name="montadora" value="<?php echo $montadora?>">
        </div>
        <div class="input-group">
        <label for="modelo">Modelo</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo $modelo?>">
        </div>
        <div class="input-group">
        <label for="ano">Ano</label>
        <input type="text" id="ano" name="ano" value="<?php echo $ano?>">
        </div>
        <div class="input-group">
        <label for="cor">Cor</label>
        <input type="text" id="cor" name="cor" value="<?php echo $cor?>">
        </div>
        <div class="input-group">
        <label for="acessorios">Acessórios</label>
        <input type="text" id="acessorios" name="acessorios" value="<?php echo $acessorios?>">
        </div>
        <div class="input-group">
        <label for="valor">Valor</label>
        <input type="number" id="valor" name="valor" value="<?php echo $valor?>">
        </div>
        <input type="submit" class="login-btn" value="Salvar" />
    </form>
</div>
<script src="/assets/js/cadastro.js"></script>
</body>
</html>