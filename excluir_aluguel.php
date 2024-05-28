<?php
	include('conexao.php');
	include('validar.php');
	$id = $_GET['id'];
	$sql = "SELECT id, id_cliente, id_vendedor, data_venda FROM aluguel";
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
		<form action="excluir_aluguel_db.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			Deseja excluir o aluguel?<br><br>
						
			<button type="submit">Excluir</button> 
			<a href="listar_aluguel.php">Cancelar</a>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>
