<?php
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<div class="bem-vindo">
			<img class="user-painel" src="imagens/user.png" alt="user" > <br>
			<p class="nome-user"> <?php echo $_SESSION['usuario']['nome'];?> </p><br>
			<p> Conectado com sucesso!</p><br>
			<a href="sair.php"><img class="button-painel" src="imagens/sair.png"></a></a>
		</div>
	</body>
</html>