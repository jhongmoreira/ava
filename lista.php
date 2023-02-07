    <?php
      include("classes/database.php");
      $banco = new BancoDeDados; 
      $banco->query("SELECT * FROM cursos, usuario, matricula WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND usuario.id = $_SESSION[idUsrS]");
      $valor = $banco->linhas();
      foreach ($banco->result() as $dados);   
    ?> 
    <!-- Cabeçalho do curso -->

    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Cursos Matriculados</h1>
        </div>        
    </div>
    <div class="row">
       <?php 
        $banco->query("SELECT * FROM usuario, cursos, matricula WHERE matricula.id_usuario = usuario.id AND matricula.id_curso = cursos.id AND usuario.id = $_SESSION[idUsrS]");
        $total = $banco->linhas();

        if ($total != 0)
        {
            foreach ($banco->result() as $dados)
            {   
        ?> 
            <div class="col-md-6 card">
                <img class="card-img-top" src="<?php echo $dados['imagem']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $dados['nome_curso']; ?></h5>
                    <p class="card-text"><?php echo $dados['descricao']; ?></p>
                    <a href="index.php?pg=1&curso=<?php echo $dados['id_curso'];?>" class="btn btn-secondary">Acessar</a>
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
</div>