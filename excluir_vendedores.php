<?php
	include('conexao.php');
	$id = $_GET['id'];
	$sql = "SELECT id, nome FROM vendedor WHERE id = {$id}";
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
		<form action="excluir_vendedores_db.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			Deseja excluir o Vendedor? (<?php echo $id; ?>) <?php echo $item['nome']; ?>?<br><br>
						
			<button type="submit">Excluir</button> 
			<a href="listar_vendedores.php">Cancelar</a>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>
