<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/cadastro-style.css">
    <link rel="shortcut icon" href="/assets/img/SIGMA_LOGO-removebg-preview.png" type="image/x-icon">

    <title>Cadastro</title>
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

        <a href="index.php">Voltar a tela de login</a>
    <form action="data.php" method="post">
        <div class="input-group">
            <label for="username">Nome: </label>
            <input type="text" id="username" name="nome" placeholder="Digite o seu nome">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="exemplo@exemplo.com">
        </div>
        <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" name="senha" id="password" placeholder="Digite sua senha">
        </div>
        <div class="input-group">
            <label for="passwordConf">Confirme sua senha</label>
            <input type="password" name="sec_senha" id="passwordConf" placeholder="Confirme sua senha">
        </div>
        <div class="input-group">
            <label for="CPF">CPF: </label>
            <input type="text" id="CPF" name="cpf" placeholder="Digite o seu CPF">
        </div>
        <div class="input-group">
            <label for="Endereço">Endereço: </label>
            <input type="text" name="cidade" id="Endereço" placeholder="Cidade">
            <input type="text" name="bairro" id="bairro" placeholder="Bairro">
            <input type="text" name="estado" id="estado" placeholder="Estado">
        </div>
        <div class="input-group">
            <label for="telefoneResidencial">Telefone Residencial: </label>
            <input type="text" name="telefone" id="telefone" placeholder="">
        </div>
        <div class="input-group">
            <label for="celular">Celular: </label>
            <input type="text" name="celular" id="celular" placeholder="(XX)9XXXX-XXXX">
        </div>
        <input type="submit" class="login-btn" value="Cadastre-se" />
    </form>
</div>
<script src="/assets/js/cadastro.js"></script>
</body>
</html>