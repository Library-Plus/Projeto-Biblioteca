<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<form class="cadastro" action="cadastrar_usuarios_db.php" method="post">
			<label for="nome">Nome:</label><br>
			<input type="text" name="nome" id="nome" maxlength="150"><br><br>

			<label for="sexo">Sexo biológico:</label><br>
			<select name="sexo" id="sexo">
  				<option value="m">Masculino</option>
  				<option value="f">Feminino</option>
			</select><br><br>
			
			<label for="usuario">Login:</label><br>
			<input type="text" name="usuario" id="usuario" maxlength="50"><br><br>
			
			<label for="senha">Senha:</label><br>
			<input type="password" name="senha" id="senha" maxlength="20"><br><br>

			<label for="tipo">Tipo de Usuário:</label><br>
			<select name="tipo" id="tipo">
				<option value="1">Administrador</option>
				<option value="2">Usuário Comum</option>
			</select><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>

