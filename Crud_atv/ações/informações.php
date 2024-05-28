<?php
require '../database/conexao.php';
$sql = 'SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha';
