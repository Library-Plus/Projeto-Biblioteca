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
			$genero = $_POST['genero'];

			$sql = "UPDATE tipo SET genero = '{$genero}' WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível alterar o Tipo! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo 'Tipo alterado com sucesso! Código ' . $id;
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


