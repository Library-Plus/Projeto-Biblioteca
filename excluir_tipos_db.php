<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
	</head>
	<body>
		<?php
			include('menu.php');
			
			$id = $_POST['id'];

			$sql = "DELETE FROM tipo WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível excluir o Tipo! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo '<p class="mensagem-cadastro"> Tipo excluído com sucesso!  <br> Código '.$id.' <br> <a href="listar_tipos.php"><button class="btn-close">Voltar</button></a></p>';
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


