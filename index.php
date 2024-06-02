<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Lib+ Soluções</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    </head>
    <body>
        <?php
			$erro = @$_GET['erro'];
		?>
		
		<header class="header-container">
			<div class="logo">
				<h1>  Lib+ </h1>
			</div>
		</header>

        <div class="form-login <?php if($erro == 1){ echo 'has-error';}?>">
			<img class="user" src="imagens/user.png" alt="user" >
			<form class="formulario" action="login_db.php" method="post">
				<div class="login-id">
					<img class="button-id" src="imagens/id.png" alt="id">
				</div>
				<div class="login-id">
					<input class="id" type="text" name="usuario" id="usuario" maxlength="50"><br><br>
				</div>
				<div class="quebra"></div>
				
				<div class="login-senha">
					<img class="button-senha" src="imagens/senha.png" alt="senha">
				</div>
				<div class="login-senha">
					<input class="senha" type="password" name="senha" id="senha" maxlength="100"><br><br>
				</div>
				<div class="quebra"></div>

				<button class="btn-submit" type="submit">Entrar</button>
			</form>
		</div>
    </body>
</html>
