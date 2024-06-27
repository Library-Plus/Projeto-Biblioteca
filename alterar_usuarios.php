<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM usuario WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
		<script>
			$(document).ready(function() {
			var tipoUserFromPHP = "<?php echo $item['tipo']; ?>";
			$("#tipo").val(tipoUserFromPHP);
		});
		</script>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<form class="cadastro" action="alterar_usuarios_db.php" method="post">
			<label>Código</label><br>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<?php echo $id; ?><br><br>
			
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="150" value="<?php echo $item['nome']; ?>"><br><br>
			
			<label for="usuario">Login</label><br>
			<input type="text" name="usuario" id="usuario" maxlength="50" value="<?php echo $item['usuario']; ?>"><br><br>
			
			<label for="senha">Senha</label><br>
			<input type="password" name="senha" id="senha" maxlength="20"><br><br>

			<label for="tipo">Tipo de Usuário</label><br>
			<select name="tipo" id="tipo">
				<option value="1">Administrador</option>
				<option value="2">Usuário Comum</option>
			</select><br><br>
			
			<button type="submit">Alterar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>
