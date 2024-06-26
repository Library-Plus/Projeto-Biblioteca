<?php
include('conexao.php');

$texto = $_GET['txtBuscar'];

$sql = "SELECT id, nome, cpf, status FROM cliente WHERE nome LIKE '%{$texto}%'";

$query = mysqli_query($conexao, $sql);

if (!$query) {
    ?>
    <tr>
        <td colspan="4"><?php echo 'Erro no banco: ' . mysqli_error($conexao); ?></td>
    </tr>
    <?php
} else {
    if (mysqli_num_rows($query) == 0) {
        ?>
        <tr>
            <td colspan="4">Não foram encontrados dados!</td>
        </tr>
        <?php
    } else {

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
    }
}

mysqli_close($conexao);
?>