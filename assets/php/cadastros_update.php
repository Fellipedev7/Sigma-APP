<?php
session_start();

include("../../connection.php");
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$id = $_GET['id'];

	$sql_0 = "SELECT * FROM cadastrar WHERE id='$id'";
	$result = mysqli_query($conn, $sql_0);
	$row = $result->fetch_assoc();

	$nome = $row['nome'];
    $email = $row['email'];
    $senha = $row['senha'];
    $cpf = $row['cpf'];
    $cidade = $row['cidade'];
    $bairro = $row['bairro'];
    $estado = $row['estado'];
    $telefone = $row['telefone'];
    $celular = $row['celular'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];

    $query = "UPDATE cadastrar SET nome='$nome', email='$email', senha='$senha', cpf='$cpf', cidade='$cidade', bairro='$bairro', estado='$estado', telefone='$telefone', celular='$celular' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: cadastros.php?success=Atualização corretamente.");
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

        <a href="cadastros.php">Voltar</a>
    <form action="" method="post">
        <div class="input-group">
            <label>Nome: </label>
            <input type="text" name="nome" value="<?php echo $nome?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email?>">
        </div>
        <div class="input-group">
            <label>Senha</label>
            <input type="password" name="senha" value="<?php echo $senha?>">
        </div>
        <div class="input-group">
            <label>CPF: </label>
            <input type="text" name="cpf" value="<?php echo $cpf?>">
        </div>
        <div class="input-group">
            <label>Endereço: </label>
            <input type="text" name="cidade" value="<?php echo $cidade?>">
            <input type="text" name="bairro" value="<?php echo $bairro?>">
            <input type="text" name="estado" value="<?php echo $estado?>">
        </div>
        <div class="input-group">
            <label>Telefone Residencial: </label>
            <input type="text" name="telefone" value="<?php echo $telefone?>">
        </div>
        <div class="input-group">
            <label>Celular: </label>
            <input type="text" name="celular" value="<?php echo $celular?>">
        </div>
        <input type="submit" class="login-btn" value="Salvar" />
    </form>
</div>
<script src="/assets/js/cadastro.js"></script>
</body>
</html>