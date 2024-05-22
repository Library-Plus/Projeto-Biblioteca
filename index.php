<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <style>
			body{
				background: lightgreen;
			}
			.erro {
				background-color: red;
				color: white;
				padding: 5px;
			}
			.login{
				padding: 250px 250px 250px 650px; 
			}
			.erro {
				background-color: red;
				color: white;
				padding: 5px;
			}
			button{
				border: 3px #385170 solid;
				font-size: large;
   				background: rgb(173, 230, 203);
    			padding: 5px 5px 5px 115px;
			}
			button:hover{
				background: lightgrey;
			}
			label{
				font-size: large;
				font-family: Arial, Helvetica, sans-serif;
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
			</span><br><br>
		<?php  } ?>

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