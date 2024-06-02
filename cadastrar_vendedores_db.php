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
			
			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone= $_POST['telefone'];
			$cpf = $_POST['cpf'];
			$admissao = $_POST['admissao'];
			$admissao_hora = $_POST['admissao_hora'];
			$status = $_POST['status'];

			$sql = "INSERT INTO vendedor VALUES (null, '{$nome}', '{$endereco}', '{$telefone}', '{$cpf}', '{$admissao} {$admissao_hora}', '{$status}')";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível cadastrar o Vendedor! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo '<p class="mensagem-cadastro"> Vendedor alterado com sucesso!  <br> Código '.mysqli_insert_id($conexao).' <br> <a href="listar_vendedores.php"><button class="btn-close">Voltar</button></a></p>';
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


