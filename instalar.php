<?php
require_once "conexao.php";
try {
  $sql = "DROP DATABASE IF EXISTS app_teste;
          CREATE DATABASE app_teste;
          CREATE TABLE app_teste.users (
            id        INT NOT NULL auto_increment PRIMARY KEY,
            nome      VARCHAR(255) NOT NULL,
            sobrenome VARCHAR(255) NOT NULL,
            username  VARCHAR(255) NOT NULL UNIQUE
          ) ENGINE = InnoDB;
          INSERT INTO app_teste.users (nome, sobrenome, username)
          VALUES  ('Mark', 'Otto', 'mdo'),
                  ('Jacob', 'Thornton', 'fat'),
                  ('Larry the Bird', '', 'twitter');";
  $conn->exec($sql);
  echo "<h1>Base de dados criada com sucesso</h1>";
} catch (PDOException $e) {
  echo "<h1>Erro</h1><p>"  . $e->getMessage() . "</p>";
}