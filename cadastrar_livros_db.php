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
			
			$titulo = $_POST['titulo'];
			$id_tipo = $_POST['id_tipo'];
			$sinopse = $_POST['sinopse'];
			$status = $_POST['status'];

			$sql = "INSERT INTO livro VALUES (null, '{$id_tipo}', '{$titulo}', '{$sinopse}', '{$status}')";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível cadastrar o livro! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo 'Livro cadastrado com sucesso! Código ' . mysqli_insert_id($conexao);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


