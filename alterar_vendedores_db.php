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
			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$cpf = $_POST['cpf'];
			$admissao = $_POST['admissao'];
			$admissao_hora = $_POST['admissao_hora'];
			$status = $_POST['status'];

			$sql = "UPDATE vendedor SET nome = '{$nome}', endereco = '{$endereco}', telefone = '{$telefone}', cpf = '{$cpf}', admissao = '{$admissao} {$admissao_hora}', status = '{$status}' WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível alterar o Vendedeor! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo '<p class="mensagem-cadastro"> Vendedor alterado com sucesso! <img class="gif" src="imagens/sucesso.gif" alt="gif"> <br> Código '.$id.' <br> <a href="listar_vendedores.php"><img class="button-fechar" src="imagens/fechar.png"></a></p>';
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


