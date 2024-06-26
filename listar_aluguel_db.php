<?php
include('conexao.php');

$texto = $_GET['txtBuscar'];

$sql = "SELECT l.id,  
			   l.id_cliente, 
			   l.id_vendedor,
			   l.data_venda, 
			   c.nome AS nome_cliente,
			   v.nome AS nome_vendedor
		        FROM aluguel AS l
		        INNER JOIN cliente AS c ON (l.id_cliente = c.id) INNER JOIN vendedor AS v ON (l.id_vendedor = v.id)
                WHERE C.NOME LIKE '%{$texto}%' ";

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
				<td><?php echo $item['data_venda']; ?></td>
				<td><?php echo $item['id_cliente']; ?></td>
				<td><?php echo $item['nome_cliente']; ?></td>
				<td><?php echo $item['id_vendedor']; ?></td>
				<td><?php echo $item['nome_vendedor']; ?></td>
                <td>
                    <a href="edit_vendedor.php?id=<?php echo $arr['ID'];?>">Alterar</a>
                </td>
                <td>
                    <a class="excluir">Excluir</a>
                </td>
            </tr>
            <?php
        }
    }
}

mysqli_close($conexao);
?>