<?php

// Pega a conexao
require 'conexao.php';

// Cria o sql
$sql = "INSERT INTO `app_teste`.`users` (`nome`, `sobrenome`, `username`) VALUES (:nome, :sobrenome, :username);";

// Prepara a declaracao
$stm = $conn->prepare($sql);

// VALIDAÇÃO DOS DADOS

// Se faltar algum dos parâmetros de entrada
if (!isset($_POST['nome']) || !isset($_POST['sobrenome']) || !isset($_POST['username'])) {
  // Retorna à página inicial indicando um erro
  header('Location: /index.php?Erro=ParametrosIncorretos');
  exit;
}
// Se o nome tiver mais de 255 caracteres
if (strlen($_POST['nome']) >= 15) {
  // Retorna à página inicial indicando um erro
  header('Location: /index.php?Erro=NomeGrande');
  exit;
}
// Se o sobrenome tiver mais de 255 caracteres
if (strlen($_POST['sobrenome']) >= 15) {
  // Retorna à página inicial indicando um erro
  header('Location: /index.php?Erro=SobrenomeGrande');
  exit;
}
// Se o username tiver mais de 255 caracteres OU se contiver apenas dígitos
if (
  strlen($_POST['username']) >= 15 ||
  preg_match('/^\W+$/', $_POST['username'])
) {
  // Retorna à página inicial indicando um erro
  header('Location: /index.php?Erro=UsernameErrado');
  exit;
}

// Executa
$stm->execute($_POST);

// Retorna à página inicial
header('Location: /index.php');
