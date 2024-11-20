<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigma</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/SIGMA_LOGO-removebg-preview.png" type="image/x-icon">

</head>
<div class="login-container">
    <img src="/assets/img/SIGMA LOGO.jpg" alt=" Logo Rede Sigma" class="logo">

    <?php if (isset($_GET['error'])) { ?>
				<p style="color: white; background-color: #ff8c00; border-radius: 3px; text-align: center; padding: 5px;">
					<?php echo $_GET['error']; ?>
				</p>
				<br>
	<?php } ?>

    <form action="login.php" method="post">
        <div class="input-group">
            <label for="username">Usuário</label>
            <input type="text" id="username" name="email">
        </div>
        <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="senha">
        </div>
        <input type="submit" class="login-btn" value="Entrar">
    </form>
    <br>
    <a href="../index.php">Admin</>
</div>
</body>
</html>