<?php
// Salve esse arquivo com o nome “conexao.php”.
$hostname = "localhost";
$username = "root";
$password = "";
$conn;
try {
  $conn = new PDO(
    "mysql:host=$hostname;charset=utf8mb4",
    $username,
    $password
  );
  // Define o que os erros do PDO sejam exibidos como exceção
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Conectado com sucesso<br>";
} catch (PDOException $e) {
  echo "Falha na conexão: " . $e->getMessage();
}
