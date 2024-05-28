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

			$sql = "DELETE FROM aluguel_livro WHERE id_venda = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível excluir os Itens da Locação! Erro no banco: ' . mysqli_error($conexao);
			} else {
				$sql = "DELETE FROM aluguel WHERE id = {$id}";
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Erro! Erro no banco: ' . mysqli_error($conexao);
				} else {
					echo 'Sucesso! Código ' . $id;
				}
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


