<?php
    session_name("LiderMaisAdm");
    session_start();
    //verifica se os dados da sessões estão instanciados
    if (isset($_SESSION["idUsrSAdm"]) and isset($_SESSION["nomeUsrSAdm"]))
    {

    }else
    {
     session_destroy();
     //Limpa
     unset($_SESSION['idUsrSAdm']);
     unset($_SESSION['nomeUsrSAdm']);
     header("Location:login.php");
     die();
   }
?>
