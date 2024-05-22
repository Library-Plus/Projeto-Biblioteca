<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<form action="cadastrar_tipos_db.php" method="post">
			<label for="genero">Gênero:</label><br>
			<input type="text" name="genero" id="genero" maxlength="50"><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>

