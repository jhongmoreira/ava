<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idModulo = $_GET['modulo'];
  $banco->query("SELECT * FROM modulos where id_modulo = $idModulo");
  $total = $banco->linhas();

    foreach ($banco->result() as $dados){};
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/assets/markitup/images/style.css">
    <!-- markItUp! skin -->
    <link rel="stylesheet" type="text/css" href="assets/markitup/markitup/skins/markitup/style.css">
    <!--  markItUp! toolbar skin -->
    <link rel="stylesheet" type="text/css" href="assets/markitup/markitup/sets/default/style.css">
    <!-- jQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
    <!-- markItUp! -->
    <script type="text/javascript" src="assets/markitup/markitup/jquery.markitup.js"></script>
    <!-- markItUp! toolbar settings -->
    <script type="text/javascript" src="assets/markitup/markitup/sets/default/set.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="icons/css/all.css">
</head>

<body>
    <!--Include the JS & CSS-->
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    
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
    
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $nome_modulo = addslashes($_POST["nomeModulo"]);
  $conteudo = $_POST["conteudo"];

    $banco->query("UPDATE modulos SET nome_modulo = '$nome_modulo', conteudo_modulo = '$conteudo' WHERE id_modulo = $idModulo");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro atualizado com sucesso</div>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível editar dados.</div>";
    }
}
?>
    </div>

</body>

</html>