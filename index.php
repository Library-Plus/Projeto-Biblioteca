<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <style>
			body{
				background: white;
				font-family: 'Source Code Pro', monospace;
				font-style: normal;
  				font-size: 16px;
			}
			.login{
				padding: 10% 0% 0% 45%;
			}
			.erro {
				border: 2px black solid;
				padding: 3px;
				background-color: #2ba5f7;
				color: black;
			}
			button{
				border: 1px black solid;
				font-size: 18px;
				font-family: 'Source Code Pro', monospace;
   				color: #F8C045;
				font-weight: bold;
			}
			button:hover{
				background: lightgrey;
			}
			label{
				font-weight: bold;
			}
			.logo{
				width: 8%;
				height: 8%;
				padding: 0% 0% 0% 47%;
			}
		</style>
    </head>
    <body>
        <?php
			$erro = @$_GET['erro'];
			$msg = @$_GET['msg'];
		?>
		
		<?php  if($erro) { ?>
			<span class="erro">
				<?php
					if ($erro == 1) {
						echo 'Usuário ou senha inválida!';
					} else if($erro == 2) {
						echo 'Não foi possível alterar o Cliente! Erro no banco: ' . $msg;
					}
				?>
			</span>
		<?php  } ?>

		<header>
			<img class="logo" src="imagens/logo.png" alt=	"logo" >
		</header><br><br><br>

		
        <div class="login">
			<form action="login_db.php" method="post">
				<label for="usuario">Usuário:</label><br>
				<input type="text" name="usuario" id="usuario" maxlength="50"><br><br>
				
				<label for="senha">Senha:</label><br>
				<input type="password" name="senha" id="senha" maxlength="100"><br><br>

				<button type="submit">Entrar</button>
			</form>
		</div>
    </body>
</html>
