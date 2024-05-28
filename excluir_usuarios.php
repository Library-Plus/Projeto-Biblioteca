<?php
	include('conexao.php');
	include('validar.php');
	$id = $_GET['id'];
	$sql = "SELECT id, nome FROM usuario WHERE id = {$id}";
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
		<form action="excluir_usuarios_db.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			Deseja excluir o Usuário (<?php echo $id; ?>) <?php echo $item['nome']; ?>?<br><br>
						
			<button type="submit">Excluir</button> 
			<a href="listar_usuarios.php">Cancelar</a>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>
