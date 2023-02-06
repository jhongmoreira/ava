<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="icons/css/all.css">
</head>

<body>
    <div class="container-fluid">
<?php
$banco->query("SELECT * FROM modulos");
$total = $banco->linhas();

if ($total != 0){
    foreach ($banco->result() as $dados)
    {     
?> 
<div><a href="editar.php?modulo=<?php echo $dados['id_modulo']; ?>"><?php echo $dados['nome_modulo'];?></a></div>
<?php
    }
}
?>
    </div>
</body>
</html>