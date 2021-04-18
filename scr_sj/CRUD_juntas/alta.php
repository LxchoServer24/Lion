<?php
    include("../service_php/conexion.php");
    session_start();
    if(isset($_POST['insertjuntas'])){
        $numero = $_POST['numero'];
        $estatus = $_POST['estatus'];

        $query = "INSERT INTO juntas (`numero`,`estatus`) VALUES ('$numero','$estatus')";
        $query_run = mysqli_query($con,$query);

    if($query_run){
        echo '<script> alert("Datos insertados exitosamente"); </script>';
        header('Location: ../paginas/salas.php');
        //exit();
    }else{
        echo '<script> alert("Datos no insertados"); </script>';
        header('Location: ../paginas/salas.php');
        //exit();
    }
}

?>