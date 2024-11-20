<?php
session_start();

include("../../connection.php");
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$id = $_GET['id'];

	$sql_0 = "SELECT * FROM veiculos WHERE id='$id'";
	$result = mysqli_query($conn, $sql_0);
	$row = $result->fetch_assoc();

	$chassi = $row['chassi'];
    $placa = $row['placa'];
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $ano = $row['ano'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];

    $chassi = $_POST['chassi'];
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];

    $query = "UPDATE veiculos SET chassi='$chassi', placa='$placa', marca='$marca', modelo='$modelo', ano='$ano' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: veiculos.php?success=Atualização corretamente.");
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

        <a href="veiculos.php">Voltar</a>
    <form action="" method="post">
        <div class="input-group">
        <label>Número do Chassi</label>
        <input type="text" name="chassi" value="<?php echo $chassi?>">
        </div>
        <div class="input-group">
        <label>Placa</label>
        <input type="text" name="placa" value="<?php echo $placa?>">
        </div>
        <div class="input-group">
        <label>Marca</label>
        <input type="text" name="marca" value="<?php echo $marca?>">
        </div>
        <div class="input-group">
        <label>Modelo</label>
        <input type="text" name="modelo" value="<?php echo $modelo?>">
        </div>
        <div class="input-group">
        <label>Ano de Fabricação</label>
        <input type="text" name="ano" value="<?php echo $ano?>">
        </div>
        <input type="submit" class="login-btn" value="Salvar" />
    </form>
</div>
<script src="/assets/js/cadastro.js"></script>
</body>
</html>