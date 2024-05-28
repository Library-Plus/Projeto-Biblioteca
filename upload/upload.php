<?php
	$arquivo = $_FILES['arquivo'];
	
	$tmp = $arquivo['tmp_name'];
	$name = $arquivo['name'];
	move_uploaded_file($tmp, "../capas/{$name}");
?>