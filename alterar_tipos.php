<?php
	include('conexao.php');
	include('validar.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM tipo WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<form class="cadastro" action="alterar_tipos_db.php" method="post">
			<label>Código:</label><br>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<?php echo $id; ?><br><br>
			
			<label for="genero">Gênero:</label><br>
			<input type="text" name="genero" id="genero" maxlength="50" value="<?php echo $item['genero']; ?>"><br><br>
			
			<button type="submit">Alterar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>
