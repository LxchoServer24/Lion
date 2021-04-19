<?php
    //Redirección a la pagina del CRUD de las salas cada que el admin haga una acción 
    session_start();
    session_destroy();

    header('location: ../paginas/salas.php');
    exit();

?>