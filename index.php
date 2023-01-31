<?php
  include_once("funcoes/verificar_login.php");
  include("classes/database.php");
  $banco = new BancoDeDados;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php
    $usuarioId = $_SESSION["idUsrS"];    
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lider+ Cursos</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="icons/css/all.css">
</head>

<body>
  <div class="container-fluid">
    <header class="py-3 mb-3 border-bottom">
      <div class="d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <img src="img/logo.png" alt="Logotipo">
        <div class="d-flex align-items-center">
          <form class="w-100 me-3">
            <!-- <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search"> -->
          </form>

          <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> <span><?php echo $_SESSION["nomeUsrS"]; ?>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
              <li><a class="dropdown-item" href="index.php?pg=0">Meus Cursos</a></li>
              <li><a class="dropdown-item" href="#">Certificados</a></li>
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="funcoes/logout.php">Sair</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <!-- Inicio do curso -->
    <?php 
      include("./classes/pagina.php");
      $pagina = new Pagina;
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</html>