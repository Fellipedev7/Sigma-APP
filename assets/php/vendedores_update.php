<?php
session_start();

include("../../connection.php");
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$id = $_GET['id'];

	$sql_0 = "SELECT * FROM vendedores WHERE id='$id'";
	$result = mysqli_query($conn, $sql_0);
	$row = $result->fetch_assoc();

	$codigo = $row['codigo'];
    $usuario = $row['usuario'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];

    $codigo = $_POST['codigo'];
    $usuario = $_POST['usuario'];

    $query = "UPDATE vendedores SET codigo='$codigo', usuario='$usuario' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: vendedores.php?success=Atualização corretamente.");
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

        <a href="vendedores.php">Voltar</a>
    <form action="" method="post">
        <div class="input-group">
        <label>Código</label>
        <input type="text" name="codigo" value="<?php echo $codigo?>">
        </div>
        <div class="input-group">
        <label>Usuário</label>
        <input type="text" name="usuario" value="<?php echo $usuario?>">
        </div>
        <input type="submit" class="login-btn" value="Salvar" />
    </form>
</div>
<script src="/assets/js/cadastro.js"></script>
</body>
</html>