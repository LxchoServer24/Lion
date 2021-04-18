<?php
    include("../service_php/conexion.php");
    session_start();
    if(isset($_POST['deletesala'])){
        $id = $_POST['ID'];
        $numero = $_POST['numero'];
        $estatus = $_POST['estatus'];

        $query = "DELETE FROM salas WHERE ID='$id'";
        $query_run = mysqli_query($con,$query);

    if($query_run){
        echo '<script> alert("Datos borrados exitosamente"); </script>';
        header('Location: ../paginas/salas.php');
        //exit();
    }else{
        echo '<script> alert("Datos no borrados"); </script>';
        header('Location: ../paginas/salas.php');
        //exit();
    }
}

?>