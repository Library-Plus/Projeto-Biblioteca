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

		<div class="github-container-painel">
			<a class="github-link-painel" href="https://github.com/Library-Plus/Projeto-Biblioteca"><img class="github-icon" src="imagens/github.png"> Projeto </a><br>
            <a class="github-link-painel" href="https://github.com/patriciogabriel"><img class="github-icon" src="imagens/github.png"> Gabriel Patricio </a> <br>
            <a class="github-link-painel" href="https://github.com/rgValinhass"><img class="github-icon" src="imagens/github.png"> Raphael Valinhas </a>
        </div>
	</body>
</html>