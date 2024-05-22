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
			
			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone= $_POST['telefone'];
			$cpf = $_POST['cpf'];
			$admissao = $_POST['admissao'];
			$status = $_POST['status'];

			$sql = "INSERT INTO vendedor VALUES (null, '{$nome}', '{$endereco}', '{$telefone}', '{$cpf}', '{$admissao}', '{$status}')";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível cadastrar o Vendedor! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo 'Vendedor cadastrado com sucesso! Código ' . mysqli_insert_id($conexao);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


