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
				echo '<p class="mensagem-cadastro"> Livro excluído com sucesso! <img class="gif" src="imagens/sucesso.gif" alt="gif"> <br> Código '.$id.' <br> <a href="listar_livros.php"><img class="button-fechar" src="imagens/fechar.png"></a></p>';
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


