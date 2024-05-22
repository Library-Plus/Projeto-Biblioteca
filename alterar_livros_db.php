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
			
			$id = $_POST['id'];
			$id_tipo = $_POST['id_tipo'];
			$titulo = $_POST['titulo'];
			$sinopse = $_POST['sinopse'];
			$status = $_POST['status'];

			$sql = "UPDATE livro SET id_tipo = '{$id_tipo}', titulo = '{$titulo}', sinopse = '{$sinopse}', status = '{$status}' WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível alterar o Livro! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo 'Livro alterada com sucesso! Código ' . $id;
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


