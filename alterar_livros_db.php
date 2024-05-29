<?php
	include('conexao.php');
	include('validar.php')
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
			$id_tipo = $_POST['id_tipo'];
			$titulo = $_POST['titulo'];
			$capa = $_FILES['capa'];
			$sinopse = $_POST['sinopse'];
			$status = $_POST['status'];

			$upload_sql = '';
			if(isset($capa['error']) && $capa['error'] == 0) {
				$name = $capa['name'];
				$tmp = $capa['tmp_name'];
				
				$extrair = explode('.', $name);
				$data = date('YmdHis');
				$name = "{$extrair[0]}-{$data}.{$extrair[1]}";
				move_uploaded_file($tmp, "capas/{$name}");
				
				$upload_sql = "capa = '{$name}', ";
			}

			$sql = "UPDATE livro SET id_tipo = '{$id_tipo}', titulo = '{$titulo}', {$upload_sql} sinopse = '{$sinopse}', status = '{$status}' WHERE id = {$id}";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível alterar o Livro! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo '<p class="mensagem-cadastro"> Livro alterado com sucesso! <img class="gif" src="imagens/sucesso.gif" alt="gif"> <br> Código '.$id.' <br> <a href="listar_livros.php"><img class="button-fechar" src="imagens/fechar.png"></a></p>';
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


