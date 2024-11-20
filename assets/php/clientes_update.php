<?php
session_start();

include("../../connection.php");
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$id = $_GET['id'];

	$sql_0 = "SELECT * FROM clientes WHERE id='$id'";
	$result = mysqli_query($conn, $sql_0);
	$row = $result->fetch_assoc();

    $cpf = $row['cpf'];
    $nome = $row['nome'];
    $endereco = $row['endereco'];
    $telefone = $row['telefone'];
    $renda = $row['renda'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $renda = $_POST['renda'];

    $query = "UPDATE clientes SET cpf='$cpf', nome='$nome', endereco='$endereco', telefone='$telefone', renda='$renda' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: clientes.php?success=Atualização corretamente.");
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

        <a href="clientes.php">Voltar</a>
    <form action="" method="post">
        <div class="input-group">
        <label>CPF</label>
        <input type="text" name="cpf" value="<?php echo $cpf?>">
        </div>
        <div class="input-group">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $nome?>">
        </div>
        <div class="input-group">
        <label>Endereço</label>
        <input type="text" name="endereco" value="<?php echo $endereco?>">
        </div>
        <div class="input-group">
        <label>Telefone</label>
        <input type="text" name="telefone" value="<?php echo $telefone?>">
        </div>
        <div class="input-group">
        <label>Renda</label>
        <input type="text" name="renda" value="<?php echo $renda?>">
        </div>
        <input type="submit" class="login-btn" value="Salvar" />
    </form>
</div>
<script src="/assets/js/cadastro.js"></script>
</body>
</html>