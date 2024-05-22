<?php
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		Bem vindo, <?php echo $_SESSION['usuario']['nome']; ?><br>
		<?php include('menu.php'); ?>
	</body>
</html>