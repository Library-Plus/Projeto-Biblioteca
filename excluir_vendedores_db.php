<?php
	include('conexao.php');
	include('validar.php');
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

			$sql = "DELETE FROM vendedor WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível excluir o Vendedor! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo 'Vendedor excluído com sucesso! Código ' . $id;
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


