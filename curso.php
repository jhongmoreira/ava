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
    <div class="row">
      <div class="col-12">
        <span class="badge bg-success">Matrículado</span>
        <h1><?php echo $dados["nome_curso"]; ?></h1>
        <p><?php echo $dados["descricao"]; ?></p>
      </div>

      <!-- Inicio dos capitulos -->
      
      <div class="accordion" id="accordionExample">
      <?php
        $banco->query("SELECT * FROM usuario, cursos, modulos, matricula WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND modulos.curso_id = cursos.id AND usuario.id = $_SESSION[idUsrS] AND cursos.id = $_GET[curso]");
        $total = $banco->linhas();

        if ($total != 0){
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
              <ul>
                <?php 
                  $dbAtividades->query("SELECT * FROM cursos, modulos, atividades WHERE atividades.cod_modulo = modulos.id_modulo AND modulos.curso_id = $dados[id] AND cursos.id = $dados[id]");
                  $totalAtividades = $dbAtividades->linhas();
          
                  if ($totalAtividades != 0){
                      foreach ($dbAtividades->result() as $atividades)
                      {
                ?>
                    <li><a href="#">Leitura obrigatória</a></li>
                <?php
                      }
                    }
                ?>
              </ul>
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