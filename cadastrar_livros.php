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
		<?php include('menu.php'); ?>
		<form class="cadastro" action="cadastrar_livros_db.php" method="post" enctype="multipart/form-data">
			<label for="titulo">Titulo</label><br>
			<input type="text" name="titulo" id="titulo" maxlength="150"><br><br>
			
			<label for="id_tipo">Tipo</label><br>
			<select name="id_tipo" id="id_tipo">
				<?php
					$sql = 'SELECT id, genero FROM tipo';
					$query = mysqli_query($conexao, $sql);
					while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item['id']; ?>"><?php echo "{$item['genero']}"; ?></option>
				<?php
					}
				?>
			</select><br><br>

			<label for="capa">Capa</label><br>
			<input type="file" name="capa" id="capa"><br><br>

			<label for="sinopse">Sinopse</label><br>
			<textarea name="sinopse" id="sinopse"></textarea><br><br>
			
			<label for="status">Status</label><br>
			<select name="status" id="status">
				<option value="A">Ativo</option>
				<option value="I">Inativo</option>
			</select><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>

