<h1>Editando</h1>
<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idModulo = $_GET['modulo'];
  $banco->query("SELECT * FROM modulos where id_modulo = $idModulo");
  $total = $banco->linhas();

    foreach ($banco->result() as $dados){};
    
?> 
    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="numModulo">Número do Módulo</label>
                <input type="text" class="form-control" id="numModulo" name="numModulo" value="<?php echo $dados["numero_modulo"]; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="nomeModulo">Nome do Módulo</label>
                <input type="text" class="form-control" id="nomeModulo" name="nomeModulo" value="<?php echo $dados["nome_modulo"]; ?>">
            </div>
            <div class="form-group mt-2 mb-5">
            <textarea id="div_editor1" name="conteudo">
            <?php echo $dados['conteudo_modulo']; ?>
            </textarea>
            <script>
                var editor1 = new RichTextEditor("#div_editor1");
            </script>
            </div>
    
            <button type="submit" class="btn btn-primary mb-5">Enviar</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $nome_modulo = addslashes($_POST["nomeModulo"]);
  $conteudo = $_POST["conteudo"];
  $moduloAtual = $idModulo;

    $banco->query("UPDATE modulos SET nome_modulo = '$nome_modulo', conteudo_modulo = '$conteudo' WHERE id_modulo = $idModulo");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro atualizado com sucesso</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=3&modulo=".$moduloAtual."'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível editar dados.</div>";
    }
}
?>
    </div>

</body>

</html>