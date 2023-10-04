<?php

// Pega a conexao
require 'conexao.php';

// Cria o sql
$sql = "DELETE FROM `app_teste`.`users` WHERE `id` = :id;";

// Prepara a declaracao
$stm = $conn->prepare($sql);

// VALIDAÇÃO DOS DADOS

// Executa
$stm->execute($_GET);

// VERIFICA A REALIZAÇÃO DA ALTERACAO

/*
 * rowCount() retorna o número de linhas afetadas.
 * 
 * Como estou definindo que será apagada apenas a linha com id
 * definido e só é possível existir uma linha com aquele id 
 * (porque é chave primária), o resultado só pode ser:
 * - 1 (true): caso a linha tenha sido excluída;
 * - 0 (false): caso a linha não tenha sido excluída;
 * 
 * Por isso chamei o rowCount() direto dentro do if.
 */
if ($stm->rowCount()) {
  header('Location: /index.php');
  exit;
} else {
  header('Location: /index.php?Erro=FalhaNaExclusao');
  exit;
}
