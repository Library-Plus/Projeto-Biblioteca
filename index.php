<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    </head>
    <body>
        <?php
			$erro = @$_GET['erro'];
			$msg = @$_GET['msg'];
		?>
		
		<header>
			<div class="cabecalho-index">
				<img class="logo" src="imagens/logo.png" alt="logo">
			</div>
			<div class="cabecalho-index">
				<div class="teste">
					<h1>  Lib+ </h1>
				</div>
			</div>
			<div class="quebra"></div>
		</header>

        <div class="form-login <?php if($erro == 1){ echo 'has-error';}?>">
		<img class="user" src="imagens/user.png" alt="user" >
			<form class="formulario" action="login_db.php" method="post">
				<label for="usuario">Usuário:</label><br>
				<input type="text" name="usuario" id="usuario" maxlength="50"><br><br>
				
				<label for="senha">Senha:</label><br>
				<input type="password" name="senha" id="senha" maxlength="100"><br><br>

				<input class="entrar" type="image" name="submit" src="imagens/entrar.png" alt="submit">
			</form>
		</div>
		<div class="div-erro">
		<?php  if($erro) { ?>
			<span class="erro">
				<?php
					if ($erro == 1) {
						echo 'Usuário ou senha inválida!';
					} else if($erro == 2) {
						echo 'Não foi possível alterar o Cliente! Erro no banco: ' . $msg;
					}
				?>
			</span>
		<?php  } ?>
		</div>
    </body>
</html>
