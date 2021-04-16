
<?php
/*
    session_start();
    $usuario =  $_SESSION['username'];

    if(!isset($usuario)){
        header('location: logeoadm.php');
    }else{
        echo '<h3>Bienvenido $usuario</h3>';
        include("../service_php/conexion.php");
    }*/
    include("../service_php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Salas de juntas agregadas</h1>
    <div>
        <table>
            <thead>
                <td>ID</td>
                <td>Numero</td>
                <td>Estatus</td>
                <td> <a href=""> <button type="button">Agregar sala nueva</button> </a> </td>            
            </thead>

            <?php
                $sentencia="SELECT * FROM salas";
                $resultado=mysqli_query($con,$sentencia);
                while($filas=mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                     echo "<td>"; echo $filas['ID']; echo "</td>";
                     echo "<td>"; echo $filas['numero']; echo "</td>";
                     echo "<td>"; echo $filas['estatus']; echo "</td>";
                     echo "<td> <a href=''> <button type='button'>Modificar sala</button> </a> </td>";
                     echo "<td> <a href=''> <button type='button'>Eliminar sala</button> </a> </td>";
                     echo "</tr>";
                }
            ?>

        </table>
    </div>
    <a href="../service_php/logoff.php">salir</a>
</body>
</html>