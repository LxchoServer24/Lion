<?php
    //Redirección a la pagina principal del CRUD de las juntas cada que cualquier usuario haga una acción
    session_start();
    session_destroy();

    header('location: ../index.php');
    exit();

?>