<?php
  include_once("funcoes/verificar_login.php");
  include("classes/database.php");
  $banco = new BancoDeDados;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php
    $usuarioId = $_SESSION["idUsrS"];
    $banco->query("SELECT * FROM cursos, usuario, matricula WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND usuario.id = $usuarioId");
    $valor = $banco->linhas();
    foreach ($banco->result() as $dados);        
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
              <li><a class="dropdown-item" href="#">Meus Cursos</a></li>
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
    <!-- Cabeçalho do curso -->
    <div class="row">
      <div class="col-12">
        <span class="badge bg-success">Matrículado</span>
        <h1><?php echo $dados["nome_curso"]; ?></h1>
        <p><?php echo $dados["descricao"]; ?></p>
      </div>

      <!-- Inicio dos capitulos -->
      
      <div class="accordion" id="accordionExample">
      <?php
        $banco->query("SELECT * FROM usuario, cursos, modulos, matricula WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND modulos.curso_id = cursos.id AND usuario.id = $usuarioId");
        $total = $banco->linhas();

        if ($total != 0)
        {
            foreach ($banco->result() as $dados)
            {     
      ?> 
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#id<?php echo $dados['numero_modulo']; ?>" aria-expanded="true" aria-controls="id<?php echo $dados['numero_modulo']; ?>">
              <?php echo $dados['nome_modulo']; ?>
            </button>
          </h2>
          <div id="id<?php echo $dados['numero_modulo']; ?>" class="accordion-collapse collapse" aria-labelledby="head<?php echo $dados['numero_modulo']; ?>" data-bs-parent="#id<?php echo $dados['numero_modulo']; ?>">
            <div class="accordion-body">
              <?php echo $dados['conteudo_modulo']; ?>
            </div>
          </div>
        </div>
        <?php
              }
          }else
          {
              echo "Nada encontrado";
          }
        ?>
      </div>

    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</html>