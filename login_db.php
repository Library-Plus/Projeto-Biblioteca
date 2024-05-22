<?php
	session_start();
    include('conexao.php');

    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));

    $sql = "SELECT id, nome, usuario FROM usuario WHERE usuario = '{$usuario}' AND senha = '{$senha}'";
    $query = mysqli_query($conexao, $sql);
    if(!$query) {
        header('Location: index.php?erro=2&msg=' .  mysqli_error($conexao));
    } else {
        $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if($item) {
			$_SESSION['usuario'] = $item;
            header('Location: painel.php');
        } else {
            header('Location: index.php?erro=1');
        }
    }

    mysqli_close($conexao);
?>