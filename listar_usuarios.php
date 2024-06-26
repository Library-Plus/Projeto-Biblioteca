<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Lib+</title>
		<script src="jquery/jquery-3.7.0.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$(document).on('click', '.excluir', function () {
					var retorno = confirm('Deseja excluir este item?');
					if(retorno) {
						var obj = $(this);
						var ID = obj.closest('tr').find('td').html();

						$.ajax({
							url: 'excluir_usuarios_db.php',
							method: 'GET',
							data: {
								id: ID,
							}
						}) 
						.done(function (dados) {
							var item = JSON.parse(dados);
							alert(item.msg);
							if (item.tipo == 'ok') {
								obj.closest('tr').remove();
							}
						});
					}
				});
				$('#buscar').on('click', function () {
            		var txtBuscar = $('#txtBuscar').val();
            		$.ajax({
                		url: 'listar_usuarios_db.php',
                		method: 'GET',
                		data: {
                    	txtBuscar: txtBuscar,
                	}
            		}).done(function (dados) {
                		$('#tabela_usuarios tbody').html(dados);
            		});
        		});
			});
		</script>
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
						echo '<p class="mensagem-cadastro"> Usuário cadastrado com sucesso!  <br> Código '.$msg.' <br> <a href="listar_usuarios.php"><button class="btn-close">Voltar</button></a></p>';
					} else if($ok == 2) {
						echo '<p class="mensagem-cadastro"> Usuário alterado com sucesso!  <br> Código '.$msg.' <br> <a href="listar_usuarios.php"><button class="btn-close">Voltar</button></a></p>';
					} else if($ok == 3) {
						echo '<p class="mensagem-cadastro"> Usuário excluído com sucesso!  <br> Código '.$msg.' <br> <a href="listar_usuarios.php"><button class="btn-close">Voltar</button></a></p>';
					}
				?>
			</span><br><br>
		<?php  } ?>
		
		<label>Buscar Usuário</label><br>
		<form class="buscar">
    		<input type="text" name="txtBuscar" id="txtBuscar">
    		<button type="button" class="btn-actions" id="buscar">Buscar</button>
		</form>

		<a class="button_cadastrar" href="cadastrar_usuarios.php"><button class="btn-actions">Cadastrar</button></a>
		<table class="tabela" id="tabela_usuarios">
			<thead class="thead_tabela">
				<tr class="tr_tabela">
					<th>Código</th>
					<th>Nome</th>
					<th>Login</th>
					<th>Tipo de Usuário</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody class="tbody_tabela">
			<?php
				$sql = 'SELECT id, nome, usuario, tipo FROM usuario';
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
					<td><?php echo $item['tipo']; ?></td>
					<td>
						<a href="alterar_usuarios.php?id=<?php echo $item['id']; ?>">Alterar</a><br>
						<a class="excluir">Excluir</a>
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