<?php
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Lib+</title>
	</head>
	<body>
		<?php include('menu.php');?>
		<div class="bem-vindo">
			<img class="user-painel" src="imagens/user.png" alt="user" > <br>
			<p class="nome-user"> <?php echo $_SESSION['usuario']['nome'];?> </p><br>
			<p> Conectado com sucesso!</p><br>
		</div>
	</body>
</html>