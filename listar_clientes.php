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
							url: 'excluir_clientes_db.php',
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
                		url: 'listar_clientes_db.php',
                		method: 'GET',
                		data: {
                    		txtBuscar: txtBuscar,
                		}
            		}).done(function (dados) {
                		$('#tabela_clientes tbody').html(dados);
            		});
        		});
			});
		</script>
	</head>
	<body>
		<?php include('menu.php'); ?>

		<label>Buscar Cliente por nome</label><br>
		<form class="buscar">
    		<input type="text" name="txtBuscar" id="txtBuscar">
    		<button type="button" class="btn-actions" id="buscar">Buscar</button>
		</form>

		<a href="cadastrar_clientes.php"><button class="btn-actions">Cadastrar</button></a>
		<a href="json_listar_clientes.php"><button class="btn-actions">Exportar</button></a>
		<a href="json_importar_clientes.php"><button class="btn-actions">Importar</button></a>
		<a href="json_importar_clientes_tabela.php"><button class="btn-actions">Tabela</button></a>
		<?php
			$erro = @$_GET['erro'];
			$msg = @$_GET['msg'];
			$ok = @$_GET['ok'];
			?>
		<?php  if($erro) { ?>
			<span class="erro">
				<?php
					if ($erro == 1) {
						echo 'Não foi possível cadastrar o Cliente! Erro no banco: ' . $msg;
					} else if($erro == 2) {
						echo 'Não foi possível alterar o Cliente! Erro no banco: ' . $msg;
					} else if ($erro == 3) {
						echo 'Não foi possível excluir o Cliente! Erro no banco: ' . $msg;
					}
				?>
			</span><br><br>
		<?php  } ?>

		<?php  if($ok) { ?>
			<span class="ok">
				<?php
					if ($ok == 1) {
						echo '<p class="mensagem-cadastro"> Cliente cadastrado com sucesso!  <br> Código '.$msg.' <br> <a href="listar_clientes.php"><button class="btn-close">Voltar</button></a></p>';
					} else if($ok == 2) {
						echo '<p class="mensagem-cadastro"> Cliente alterado com sucesso!  <br> Código '.$msg.' <br> <a href="listar_clientes.php"><button class="btn-close">Voltar</button></a></p>';
					} else if($ok == 3) {
						echo '<p class="mensagem-cadastro"> Cliente excluído com sucesso!  <br> Código '.$msg.' <br> <a href="listar_clientes.php"><button class="btn-close">Voltar</button></a></p>';
					}
				?>
			</span><br><br>
		<?php  } ?>
		

		<table class="tabela" id="tabela_clientes">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>Status</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody id="body_clientes">
			<?php
				$sql = 'SELECT id, nome, cpf, status FROM cliente';
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Erro no banco: ' . mysqli_error($conexao);
				}
				while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['nome']; ?></td>
					<td><?php echo $item['cpf']; ?></td>
					<td><?php echo $item['status'] == 'A' ? 'Ativo' : 'Inativo'; ?></td>
					<td>
						<a href="alterar_clientes.php?id=<?php echo $item['id']; ?>">Alterar</a><br>
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


