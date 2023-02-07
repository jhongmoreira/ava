<?php
      include("classes/database.php");
      $moduloId = $_GET['modulo'];
      $curso_id  = $_GET['curso'];
      $banco = new BancoDeDados; 
      $banco->query("SELECT * FROM cursos, usuario, matricula, modulos WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND usuario.id = $_SESSION[idUsrS] AND modulos.id_modulo = $moduloId AND cursos.id = $curso_id");
      $valor = $banco->linhas();
      foreach ($banco->result() as $dados);   
    ?>
<!-- Cabeçalho do curso -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <span class="badge bg-success">Matrículado</span>
      <span class="badge bg-secondary"><?php echo $dados['nome_curso']; ?></span>
      <h1>
        <?php echo $dados["nome_modulo"]; ?>
      </h1>
    </div>
  </div>

  <hr>

  <?php
      $banco->query("SELECT * FROM usuario, cursos, modulos, matricula WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND modulos.curso_id = cursos.id AND usuario.id = $_SESSION[idUsrS] AND cursos.id = $curso_id AND modulos.id_modulo = $moduloId");
      $total = $banco->linhas();

      if ($total != 0){
          foreach ($banco->result() as $dados) {}   
      }else{
        echo "Nada encontrado";
        $dados = "Nada encontrado";
      }
    ?> 

  <div class="row">
    <div class="col-md-12">
        <?php 
            echo $dados['conteudo_modulo'];
        ?>
    </div>    
  </div>

  <hr>

  <div class="row mt-2">
    <div class="col-md-4">
      <a href="index.php?pg=1&curso=<?php echo $curso_id; ?>"><button class="btn btn-success"><i class="fa-solid fa-backward"></i> Voltar</button></a>
    </div>
  </div>

</div>

