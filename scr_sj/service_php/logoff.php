<?php
    //Redirección a la pagina principal cada vez que el admin cierre sesión 
    session_start();
    session_destroy();

    header('location: ../index.php');
    exit();
?>