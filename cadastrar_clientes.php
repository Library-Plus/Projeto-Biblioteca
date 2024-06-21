<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<form class="cadastro" action="cadastrar_clientes_db.php" method="post">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="150"><br><br>
			
			<label for="email">E-mail</label><br>
			<input type="text" name="email" id="email" maxlength="150"><br><br>
			
			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="14"><br><br>
			
			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="14"><br><br>
			
			<label for="status">Status</label><br>
			<select name="status" id="status">
				<option value="A">Ativo</option>
				<option value="I">Inativo</option>
			</select><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>

