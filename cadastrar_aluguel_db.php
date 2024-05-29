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
			
			$id_cliente = $_POST['id_cliente'];
			$id_vendedor = $_POST['id_vendedor'];
			$data_venda = $_POST['data_venda'];
			$id_livros = $_POST['id_livro'];

			$sql = "INSERT INTO aluguel VALUES (null, '{$id_cliente}', '{$id_vendedor}', '{$data_venda}')";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível cadastrar a Locação! Erro no banco: ' . mysqli_error($conexao);
			} else {
				$id_venda = mysqli_insert_id($conexao);
				$sucesso = false;

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
					echo '<p class="mensagem-cadastro"> Aluguel cadastrado com sucesso! <img class="gif" src="imagens/sucesso.gif" alt="gif"> <br> Código '.$id_venda.' <br> <a href="listar_aluguel.php"><img class="button-fechar" src="imagens/fechar.png"></a></p>';
				}
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


