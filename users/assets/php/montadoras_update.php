<?php
session_start();

include("../../connection.php");
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$id = $_GET['id'];

	$sql_0 = "SELECT * FROM montadores WHERE id='$id'";
	$result = mysqli_query($conn, $sql_0);
	$row = $result->fetch_assoc();

    $cnpj = $row['cnpj'];
    $social = $row['social'];
    $marca = $row['marca'];
    $contato = $row['contato'];
    $telefone = $row['telefone'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];

    $cnpj = $_POST['cnpj'];
    $social = $_POST['social'];
    $marca = $_POST['marca'];
    $contato = $_POST['contato'];
    $telefone = $_POST['telefone'];

    $query = "UPDATE montadores SET cnpj='$cnpj', social='$social', marca='$marca', contato='$contato', telefone='$telefone' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: montadoras.php?success=Atualização corretamente.");
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

        <a href="montadoras.php">Voltar</a>
    <form action="" method="post">
        <div class="input-group">
        <label>CNPJ</label>
        <input type="text" name="cnpj" value="<?php echo $cnpj?>">
        </div>
        <div class="input-group">
        <label>Razão Social</label>
        <input type="text" name="social" value="<?php echo $social?>">
        </div>
        <div class="input-group">
        <label>Marca</label>
        <input type="text" name="marca" value="<?php echo $marca?>">
        </div>
        <div class="input-group">
        <label>Contato</label>
        <input type="text" name="contato" value="<?php echo $contato?>">
        </div>
        <div class="input-group">
        <label>Telefone Comercial</label>
        <input type="tel" name="telefone" value="<?php echo $telefone?>">
        </div>
        <input type="submit" class="login-btn" value="Salvar" />
    </form>
</div>
<script src="/assets/js/cadastro.js"></script>
</body>
</html>