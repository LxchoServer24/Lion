<?php
    include("../service_php/conexion.php");
    session_start();
    if(isset($_POST['updatesala'])){
        $id = $_POST['ID'];
        $numero = $_POST['numero'];
        $estatus = $_POST['estatus'];
        
        $query = "UPDATE salas SET numero='$numero', estatus='$estatus' WHERE ID='$id'";
        $query_run = mysqli_query($con,$query);

    if($query_run){
        echo '<script> alert("Datos actualizados exitosamente"); </script>';
        header('Location: ../paginas/salas.php');
        //exit();
    }else{
        echo '<script> alert("Datos no actualizados"); </script>';
        header('Location: ../paginas/salas.php');
        //exit();
    }
}

?>