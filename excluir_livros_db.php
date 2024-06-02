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

			$sql = "DELETE FROM livro WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível excluir o livro! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo '<p class="mensagem-cadastro"> Livro excluído com sucesso!  <br> Código '.$id.' <br> <a href="listar_livros.php"><button class="btn-close">Voltar</button></a></p>';
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


