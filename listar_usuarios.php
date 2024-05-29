<?php
	include('conexao.php');
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title>Lib+ Soluções</title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<?php
			$erro = @$_GET['erro'];
			$msg = @$_GET['msg'];
			$ok = @$_GET['ok'];
		?>
		
		<?php  if($erro) { ?>
			<span class="erro">
				<?php
					if ($erro == 1) {
						echo 'Não foi possível cadastrar o Usuário! Erro no banco: ' . $msg;
					} else if($erro == 2) {
						echo 'Não foi possível alterar o Usuário! Erro no banco: ' . $msg;
					} else if ($erro == 3) {
						echo 'Não foi possível excluir o Usuário! Erro no banco: ' . $msg;
					}
				?>
			</span><br><br>
		<?php  } ?>

		<?php  if($ok) { ?>
			<span class="ok">
				<?php
					if ($ok == 1) {
						echo '<p class="mensagem-cadastro"> Usuário cadastrado com sucesso! <img class="gif" src="imagens/sucesso.gif" alt="gif"> <br> Código '.$msg.' <br> <a href="listar_usuarios.php"><img class="button-fechar" src="imagens/fechar.png"></a></p>';
					} else if($ok == 2) {
						echo '<p class="mensagem-cadastro"> Usuário alterado com sucesso! <img class="gif" src="imagens/sucesso.gif" alt="gif"> <br> Código '.$msg.' <br> <a href="listar_usuarios.php"><img class="button-fechar" src="imagens/fechar.png"></a></p>';
					} else if($ok == 3) {
						echo '<p class="mensagem-cadastro"> Usuário excluído com sucesso! <img class="gif" src="imagens/sucesso.gif" alt="gif"> <br> Código '.$msg.' <br> <a href="listar_usuarios.php"><img class="button-fechar" src="imagens/fechar.png"></a></p>';
					}
				?>
			</span><br><br>
		<?php  } ?>
		

		<a class="button_cadastrar" href="cadastrar_usuarios.php">Cadastrar</a>
		<table class="tabela">
			<thead class="thead_tabela">
				<tr class="tr_tabela">
					<th>Código</th>
					<th>Nome</th>
					<th>Login</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody class="tbody_tabela">
			<?php
				$sql = 'SELECT id, nome, usuario FROM usuario';
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Erro no banco: ' . mysqli_error($conexao);
				}
				while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['nome']; ?></td>
					<td><?php echo $item['usuario']; ?></td>
					<td>
						<a href="alterar_usuarios.php?id=<?php echo $item['id']; ?>">Alterar</a><br>
						<a href="excluir_usuarios.php?id=<?php echo $item['id']; ?>">Excluir</a>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<p> Existe(m) <?php echo mysqli_num_rows($query); ?> registro(s)</p>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


