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
			
			$titulo = $_POST['titulo'];
			$id_tipo = $_POST['id_tipo'];
			$capa = $_FILES['capa'];
			$sinopse = $_POST['sinopse'];
			$status = $_POST['status'];

			$name = '';
			if($capa['error'] == 0) {
				$name = $capa['name'];
				$tmp = $capa['tmp_name'];
				
				$extrair = explode('.', $name);
				$data = date('YmdHis');
				$name = "{$extrair[0]}-{$data}.{$extrair[1]}";
				move_uploaded_file($tmp, "capas/{$name}");
			}

			$sql = "INSERT INTO livro VALUES (null, '{$id_tipo}', '{$titulo}', '{$name}', '{$sinopse}', '{$status}')";
			$query = mysqli_query($conexao, $sql);
			if (!$query) {
				echo 'Não foi possível cadastrar o livro! Erro no banco: ' . mysqli_error($conexao);
			} else {
				echo '<p class="mensagem-cadastro"> Livro cadastrado com sucesso!  <br> Código '.mysqli_insert_id($conexao).' <br> <a href="listar_livros.php"><button class="btn-close">Voltar</button></a></p>';
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


