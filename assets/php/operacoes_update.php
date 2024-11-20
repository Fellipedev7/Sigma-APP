<?php
session_start();

include("../../connection.php");
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$id = $_GET['id'];

	$sql_0 = "SELECT * FROM operacoes WHERE id='$id'";
	$result = mysqli_query($conn, $sql_0);
	$row = $result->fetch_assoc();

	$numero = $row['numero'];
    $data = $row['data'];
    $tipo = isset($row['tipo']) ? 'Compra' : 'Venda';
    $cliente = $row['cliente'];
    $vendedor = $row['vendedor'];
    $veiculo = $row['veiculo'];
    $valor = $row['valor'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];

    $numero = $_POST['numero'];
    $data = $_POST['data'];
    $tipo = $_POST['tipo'];
    $cliente = $_POST['cliente'];
    $vendedor = $_POST['vendedor'];
    $veiculo = $_POST['veiculo'];
    $valor = $_POST['valor'];

    $query = "UPDATE operacoes SET numero='$numero', data='$data', tipo='$tipo', cliente='$cliente', vendedor='$vendedor', veiculo='$veiculo', valor='$valor' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: operacoes.php?success=Atualização corretamente.");
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

        <a href="operacoes.php">Voltar</a>
    <form action="" method="post">
        <div class="input-group">
        <label>Número</label>
        <input type="text" name="numero" value="<?php echo $numero?>">
        </div>
        <div class="input-group">
        <label>Data</label>
        <input type="date" name="data" value="<?php echo $data?>">
        </div>
        <div class="input-group">
        <label>Tipo: (Compra ou Venda)</label>
        <input type="text" name="tipo" value="<?php echo $tipo?>">
        </div>
        <div class="input-group">
        <label>Cliente</label>
        <input type="text" name="cliente" value="<?php echo $cliente?>">
        </div>
        <div class="input-group">
        <label>Vendedor</label>
        <input type="text" name="vendedor" value="<?php echo $vendedor?>">
        </div>
        <div class="input-group">
        <label>Veículo</label>
        <input type="text" name="veiculo" value="<?php echo $veiculo?>">
        </div>
        <div class="input-group">
        <label>Valor</label>
        <input type="number" name="valor" value="<?php echo $valor?>">
        </div>
        <input type="submit" class="login-btn" value="Salvar" />
    </form>
</div>
<script src="/assets/js/cadastro.js"></script>
</body>
</html>