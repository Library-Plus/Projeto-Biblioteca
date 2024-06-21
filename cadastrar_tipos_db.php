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
			
			$genero = $_POST['genero'];

			$sql = "INSERT INTO tipo VALUES (null, '{$genero}')";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível cadastrar o Tipo! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo '<p class="mensagem-cadastro"> Tipo adicionado com sucesso!  <br> Código '.mysqli_insert_id($conexao).' <br> <a href="listar_tipos.php"><button class="btn-close">Voltar</button></a></p>';
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


