<?php
	include('conexao.php');
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
    <head>
        <title>Lib+</title>
    </head>
    <body>
        <?php include('menu.php'); ?>
        <div class="form-text">
            <p>Deixe aqui seu feedback sobre sua experiência com o atendimento, local, condições do livros e oque podemos melhorar.</p>
            <p>Sua opinião é importante para o crescimento da nossa companhia, fica a vontade para falar.</p>
        </div>
        <br>

            <form class="cadastro" method="post" enctype="text/plain" action="mailto:contato@libplus.com.br">
                <label for="nome" class="nomeText">Nome</label><br>
                <input id="nome" class="nome" type="text" name="Nome do cliente: " maxlength="30"><br><br>

                <label for="email">E-mail</label><br>
                <input id="email" class="email" type="text" name="Email: " maxlength="50"><br><br>

			    <label for="nome_vendedor">Vendedor que lhe atendeu:</label><br>
			    <select name="Nome do Vendedor: " id="nome">
				    <?php
				        $sql = 'SELECT id, nome FROM vendedor';
                        $query = mysqli_query($conexao, $sql);
                        while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			        ?>
                    <option value="<?php echo $item['nome']; ?>"><?php echo $item['nome']; ?></option>
                    <?php
                        }
			        ?>
                </select><br><br>           
                <label for="mensagem">Mensagem</label><br>
                <textarea id="mensagem" rows="5" cols="20" name="Mensagem" ></textarea><br><br>
                <button type="submit"> Enviar</button>
                <button type="reset"> Limpar</button>
            </form>
    </body>
</html>