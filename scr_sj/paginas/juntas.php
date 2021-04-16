<?php
    include("../service_php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartado de salas de juntas</title>
</head>
<body>
    <h1>Aparta aquí tu sala para la junta</h1>
    <h6>Salas de juntas programadas</h6>
    <div>
        <table>
            <thead>
                <td>ID de la junta</td>
                <td>ID de la sala</td>
                <td>Hora de inicio</td>
                <td>Hora de salida</td>
                <td>Modificar</td>            
            </thead>

            <?php
                $sentencia="SELECT * FROM juntas";
                $resultado=mysqli_query($con,$sentencia);
                while($filas=mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                     echo "<td>"; echo $filas['ID']; echo "</td>";
                     echo "<td>"; echo $filas['ID_sala']; echo "</td>";
                     echo "<td>"; echo $filas['h_inicio']; echo "</td>";
                     echo "<td>"; echo $filas['h_final']; echo "</td>";
                     echo "<td>boton</td>";
                     echo "<td>boton</td>";
                     echo "</tr>";
                }
            ?>

        </table>
    </div>
</body>
</html>