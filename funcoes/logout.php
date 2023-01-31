<?php
    session_name("LiderMais");
    session_start();
    session_destroy();

    header("Location: ../index.php");
?>
