<?php
$servidor="127.0.0.1";
$usuario="root";
$senha="usbw";
$banco="cad_contas";
$conecta_db=mysqli_connect($servidor, $usuario, $senha) or die (mysqli_connect_error());
mysqli_select_db($conecta_db, $banco) or die("Erro ao conectar: " . mysqli_error($conecta_db));
?>
