<?php
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<form action="json_importar_clientes_db.php" method="post">			
			<label for="json">JSON:</label><br>
			<textarea name="json" id="json"></textarea><br><br>
						
			<button type="submit">Importar</button>
		</form>
	</body>
</html>