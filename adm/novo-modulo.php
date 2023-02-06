<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>   

<h1>Novo Módulo</h1>

    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="idCurso">Curso:</label>
                <select name="idCurso" id="idcurso" class="form-control">
                    <?php
                        $banco->query("SELECT * FROM cursos");
                        $total = $banco->linhas();

                        if ($total != 0){
                            foreach ($banco->result() as $dados)
                            {     
                    ?> 
                    <option value="<?php echo $dados['id'];?>"><?php echo $dados['nome_curso'];?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="numModulo">Número do Módulo</label>
                <input type="text" class="form-control" id="numModulo" name="numModulo">
            </div>
            <div class="form-group">
                <label for="nomeModulo">Nome do Módulo</label>
                <input type="text" class="form-control" id="nomeModulo" name="nomeModulo">
            </div>
            <div class="form-group mt-2 mb-2">
            <textarea id="div_editor1" name="conteudo"></textarea>
            <script>
                var editor1 = new RichTextEditor("#div_editor1");
            </script>
            </div>
    
            <button type="submit" class="btn btn-primary mt-2 mb-5">Enviar</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $id_curso = addslashes($_POST["idCurso"]);
  $num_modulo = addslashes($_POST["numModulo"]);
  $nome_modulo = addslashes($_POST["nomeModulo"]);
  $conteudo = addslashes($_POST["conteudo"]);

    $banco->query("INSERT INTO modulos VALUES('', '$id_curso', '$num_modulo', '$nome_modulo', '$conteudo')");

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