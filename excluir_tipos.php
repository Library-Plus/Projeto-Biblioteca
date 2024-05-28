<?php
	include('conexao.php');
	include('validar.php');
	$id = $_GET['id'];
	$sql = "SELECT id, genero FROM tipo WHERE id = {$id}";
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
		<form action="excluir_tipos_db.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			Deseja excluir o Tipo (<?php echo $id; ?>) <?php echo $item['genero']; ?>?<br><br>
						
			<button type="submit">Excluir</button> 
			<a href="listar_tipos.php">Cancelar</a>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>
