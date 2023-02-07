<?php
      include("classes/database.php");
      $curso_id = $_GET['curso'];
      $banco = new BancoDeDados; 
      $dbAtividades = new BancoDeDados; 
      $banco->query("SELECT * FROM cursos, usuario, matricula WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND usuario.id = $_SESSION[idUsrS] AND cursos.id = $curso_id");
      $valor = $banco->linhas();
      foreach ($banco->result() as $dados);   
    ?>
<!-- Cabeçalho do curso -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <span class="badge bg-success">Matrículado</span>
      <h1>
        <?php echo $dados["nome_curso"]; ?>
      </h1>
    </div>
  </div>

  <div class="row">
  <?php
      $banco->query("SELECT * FROM usuario, cursos, modulos, matricula WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND modulos.curso_id = cursos.id AND usuario.id = $_SESSION[idUsrS] AND cursos.id = $curso_id");
      $total = $banco->linhas();

      if ($total != 0){
          foreach ($banco->result() as $dados)
          {     
  ?> 
    <div class="col-md-4 mb-2">
      <div class="jumbotron modulos-lista">
        <h2><?php echo $dados['nome_modulo']; ?></h2>
        <p>Módulo <?php echo $dados['numero_modulo']; ?></p>
        <hr class="my-4">
        <a class="btn btn-primary btn-sm" href="index.php?pg=3&curso=<?php echo $curso_id;?>&modulo=<?php echo $dados['id_modulo']; ?>" role="button">Acessar</a>
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