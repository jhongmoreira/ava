<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>

<h1>Novo Curso</h1>
  
    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="nomeCurso">Nome do Curso</label>
                <input type="text" class="form-control" id="nomeCurso" name="nomeCurso">
            </div>

            <div class="form-group">
                <label for="descricaoCurso">Descrição</label>
                <input type="text" class="form-control" id="descricaoCurso" name="descricaoCurso">
            </div>

            <div class="form-group">
                <label for="modulos">N° de Módulos</label>
                <input type="text" class="form-control" id="modulos" name="modulos">
            </div>

            <div class="form-group">
                <label for="imgModulo">Imagem</label>
                <input type="text" class="form-control" id="imgModulo" name="imgModulo">
            </div>
            
    
            <button type="submit" class="btn btn-primary mt-2 mb-5">Enviar</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $nome_curso = addslashes($_POST["nomeCurso"]);
  $descricao_curso = addslashes($_POST["descricaoCurso"]);
  $num_modulos = addslashes($_POST["modulos"]);
  $img_curso = addslashes($_POST["imgModulo"]);

    $banco->query("INSERT INTO cursos VALUES('', '$nome_curso', '$descricao_curso', '$num_modulos', '$img_curso')");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro inserido com sucesso</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=1'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
    }
}
?>
    </div>

</body>

</html>