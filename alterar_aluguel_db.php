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
			$id_cliente = $_POST['id_cliente'];
			$data_venda = $_POST['data_venda'];
			$id_livros = $_POST['id_livro'];

			$sql = "UPDATE aluguel SET id_cliente = '{$id_cliente}', data_venda = '{$data_venda}' WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível alterar o aluguel! Erro no banco: ' . mysqli_error($conexao);
			} else {
				$id_venda = $id;
				$sucesso = false;

				$sql = "DELETE FROM aluguel_livro WHERE id_venda = {$id}";
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Não foi possível excluir os Itens da Locação! Erro no banco: ' . mysqli_error($conexao);
				}

				foreach($id_livros as $id_livro) {
					$sql = "INSERT INTO aluguel_livro VALUES ('{$id_venda}', '{$id_livro}')";
					$query = mysqli_query($conexao, $sql);
					if (!$query) {
						echo 'Não foi possível cadastrar a Item da Locação! Erro no banco: ' . mysqli_error($conexao);
						break;
					} else {
						$sucesso = true;
					}
				}

				if($sucesso) {
					echo 'Locação alterado com sucesso! Código ' . $id;
				}				
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


