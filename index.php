<?php

// Pega a conexao
require 'conexao.php';

// Cria o sql
$sql = "SELECT * FROM `app_teste`.`users`;";

// Prepara a declaracao
$stm = $conn->prepare($sql);

// Executa
$stm->execute();

// Recupera os usuarios
$usuarios = $stm->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="navbar-toggler-icon"></span>
      </button> <a class="navbar-brand" href="#">Brand</a>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Link <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Dropdown link</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider">
              </div> <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </li>
        </ul>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="text" />
          <button class="btn btn-primary my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
        <ul class="navbar-nav ml-md-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Link <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Dropdown link</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider">
              </div> <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <?php if (isset($_GET['Erro'])) { ?>
      <!-- ISSO É HTML -->
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
          ×
        </button>
        <?php
        switch ($_GET['Erro']) {
          case 'NomeGrande':
            echo "O nome deve ter menos de 15 caracteres.";
            break;
          default:
            echo "Ocorreu um erro.";
        }
        ?>
      </div>
    <?php } ?>

    <h3>
      Listagem de usuários
    </h3>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Id</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario) { ?>
            <tr>
              <td><?php echo $usuario['id'] ?></td>
              <td><?php echo $usuario['nome'] ?></td>
              <td><?php echo $usuario['sobrenome'] ?></td>
              <td>@<?php echo $usuario['username'] ?></td>
              <td>
                <div class="btn-group" role="group">
                  <a href="./edit.html?id=<?php echo $usuario['id'] ?>" class="btn btn-primary" role="button">
                    ✏
                  </a>
                  <!-- Para que a exclusão funcione como um modal (sem recarregar a página), é necessário usar JavaScript. O código está na parte inferior desta página. -->
                  <a id="modal-button" href="#modal-container" role="button" class="btn btn-primary" data-toggle="modal" data-id="<?php echo $usuario['id'] ?>" data-username="<?php echo $usuario['username'] ?>">
                    🗑
                  </a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <a href="./new.html" class="btn btn-success float-md-right d-block d-md-inline-block" role="button">Adicionar
      novo</a>

    <div class="modal fade" id="modal-container" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">
              Confirmar exclusão
            </h5>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja mesmo excluir @<span id="username"></span>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
            <a href="#" id="delete-link" role="button" class="btn btn-danger">
              Excluir
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
  <script>
    $('#modal-container').on('shown.bs.modal', function(e) {
      // Pega o botão que ativou o modal e atribui em uma variável
      let button = $(e.relatedTarget)

      // Do botão, extrai os valores dos atributos data-id e o data-username
      let id = button.data().id
      let username = $(button).data().username

      // Define o username no span com id "username" dentro do modal
      $('span#username').text(username)

      // Define o atributo href do botão de dentro do modal, apontando para o
      // endereço "delete.php" e passando "id" como parâmetro por GET.
      // Observe os backticks (esses dois acentos graves, não são aspas simples) no link.
      // Isso indica o uso de template de string.
      $('a#delete-link').attr('href', `/delete.php?id=${id}`)
    })
  </script>
</body>

</html>