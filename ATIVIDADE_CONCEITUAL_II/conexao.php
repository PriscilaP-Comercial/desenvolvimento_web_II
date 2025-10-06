<?php

$servidor = "127.0.0.1"; 
$usuario = "root";      
$senha = "usbw";         
$banco = "folha_pagto";  

$conecta_db = mysqli_connect($servidor, $usuario, $senha) or die (mysqli_connect_error());
mysqli_select_db($conecta_db, $banco) or die("Erro ao selecionar o banco de dados: " . mysqli_error($conecta_db));

mysqli_set_charset($conecta_db, "utf8");

?>