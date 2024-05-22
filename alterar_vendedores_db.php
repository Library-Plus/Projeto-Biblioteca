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
			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$cpf = $_POST['cpf'];
			$status = $_POST['status'];

			$sql = "UPDATE vendedor SET nome = '{$nome}', endereco = '{$endereco}', telefone = '{$telefone}', cpf = '{$cpf}', status = '{$status}' WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível alterar o Vendedeor! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo 'Vendedor alterado com sucesso! Código ' . $id;
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


