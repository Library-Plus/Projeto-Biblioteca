<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM cliente WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<form class="cadastro" action="alterar_clientes_db.php" method="post">
			<label>Código</label><br>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<?php echo $id; ?><br><br>
			
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="150" value="<?php echo $item['nome']; ?>"><br><br>
			
			<label for="email">Email</label><br>
			<input type="text" name="email" id="email" maxlength="150" value="<?php echo $item['email']; ?>"><br><br>
			
			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="14" value="<?php echo $item['telefone']; ?>"><br><br>
			
			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="14" value="<?php echo $item['cpf']; ?>"><br><br>
			
			<label for="status">Status</label><br>
			<select name="status" id="status">
				<option value="A"<?php if ($item['status'] == 'A') { ?> selected="selected"<?php } ?>>Ativo</option>
				<option value="I"<?php if ($item['status'] == 'I') { ?> selected="selected"<?php } ?>>Inativo</option>
			</select><br><br>
			
			<button type="submit">Alterar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>
