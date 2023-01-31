<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
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
<div class="container-fluid">
    <form method="post">
        <div class="form-group">
          <label for="idCurso">ID Curso</label>
          <input type="text" class="form-control" id="idCurso" name="idCurso">
        </div>
        <div class="form-group">
            <label for="numModulo">Número do Módulo</label>
            <input type="text" class="form-control" id="numModulo" name="numModulo">
        </div>
        <div class="form-group">
            <label for="nomeModulo">Nome do Módulo</label>
            <input type="text" class="form-control" id="nomeModulo" name="nomeModulo">
        </div>
      <textarea id="markItUp" name="conteudo" cols="80" rows="20"></textarea>
      <script type="text/javascript">
      $(function() {
          // Add markItUp! to your textarea in one line
          // $('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
          $('#markItUp').markItUp(mySettings);
      
      
      
          // You can add content from anywhere in your page
          // $.markItUp( { Settings } );	
          $('.add').click(function() {
               $('#markItUp').markItUp('insert',
                  { 	openWith:'<opening tag>',
                      closeWith:'<\/closing tag>',
                      placeHolder:"New content"
                  }
              );
               return false;
          });
          
          // And you can add/remove markItUp! whenever you want
          // $(textarea).markItUpRemove();
          $('.toggle').click(function() {
              if ($("#markItUp.markItUpEditor").length === 1) {
                   $("#markItUp").markItUp('remove');
                  $("span", this).text("get markItUp! back");
              } else {
                  $('#markItUp').markItUp(mySettings);
                  $("span", this).text("remove markItUp!");
              }
               return false;
          });
      });
      </script>
        <button type="submit" class="btn btn-primary">Enviar</button>
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
    }else
    {
        echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
    }
}
?>
</div>

</body>
</html>
