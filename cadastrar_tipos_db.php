<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		<?php
			include('menu.php');
			
			$genero = $_POST['genero'];

			$sql = "INSERT INTO tipo VALUES (null, '{$genero}')";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível cadastrar o Tipo! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo 'Tipo cadastrado com sucesso! Código ' . mysqli_insert_id($conexao);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


