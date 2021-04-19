<?php
   include("service_php/conexion.php");  //conexión a la base de datos
?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
     <!--Head de la pagina principal, se incluyen links de bootstrap para un mejor diseño-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Sala de juntas</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

</head>
<body>
     <!--Header del cuerpo, estructura de la barra de navegación-->
    <header>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Salas de juntas</a>
            <form class="form-inline">
                <a href="paginas/logeoadm.php"><button class="btn btn-outline-primary my-2 my-sm-0" type="button">Gestionar salas</button></a>
            </form>
        </nav>
    </header>
     
     <!--Lineas introductorias al panorama-->
	 <h1 class="display-4" style="text-align: center;" >Aparta aquí tu sala para la junta</h1>
     <br>
     <h6 class="display-6">Salas de juntas programadas</h6>
     <br>

    <!--Tabla que muestra todas las juntas-->
    <div class="container">
        <table class="table table-hover">
            <thead class="table-primary">
                <th scope="col">ID de la junta</td>
                <th scope="col">ID de la sala</td>
                <th scope="col">Hora de inicio</td>
                <th scope="col">Hora de salida</td>
                <th scope="col"><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">Nueva junta</button></td>
                <th scope="col"><button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dModal">Ver salas disponibles</button></td>            
            </thead>
            <tbody>
                <?php
                    $sentencia="SELECT * FROM juntas";
                    $resultado=mysqli_query($con,$sentencia);
                    while($filas=mysqli_fetch_assoc($resultado)){?>
                        <tr>
                          <td><?php echo $filas['ID'] ?></td>
                          <td><?php echo $filas['ID_sala'] ?></td>
                          <td><?php echo $filas['h_inicio'] ?></td>
                          <td><?php echo $filas['h_final'] ?></td>
                          <td><a href="../CRUD_juntas/editable.php?ID=<?php echo $filas['ID']?>"><button type='button' class='btn btn-outline-warning updatebtn' >Editar sala de junta</button></a></td>
                          <td><a href="../CRUD_juntas/baja.php?ID=<?php echo $filas['ID']?>"><button type='button' class='btn btn-outline-danger deletebtn'>Eliminar sala de junta</button></a></td>
                        </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    <!-- Modal para agregar juntas-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-lg p-3 mb-5 bg-white ">
                                    <form action="../CRUD_juntas/alta.php" id="form1" method="post" class="needs-validation" novalidate>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Elejir numero de salon</label>
                                                <select class="form-control" id="salon" name="salon" values ="Elejir numero de salon" required>
                                                    <?php
                                                        $sentencia="SELECT * FROM salas WHERE estatus='Disponible'";  //la variable "$sentencia" recibe todas las salas disponibles para hacer juntas
                                                        $resultado=mysqli_query($con,$sentencia);
                                                        while($filas=mysqli_fetch_assoc($resultado)){?>
                                                          <option><?php echo $filas['numero'] ?></option>
                                                    <?php }?>
                                                </select>
                         
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Hora inicial</label>
                                                <input type="datetime-local" class="form-control" id="h_inicial" name="h_inicial" min="2021-04-18:10-00-00" required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Hora final</label>
                                                <input type="datetime-local" class="form-control" id="h_final" name="h_final" required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit" id="btnSave" name="insertjunta">Enviar</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal para ver todas las salas disponibles-->
    <div class="modal fade" id="dModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ver salas disponibles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-lg p-3 mb-5 bg-white ">
                                    <table class="table table-hover">
                                        <thead class="table-success">
                                            <th scope="col">ID</th>
                                            <th scope="col">Numero de sala</th>
                                            <th scope="col">Estatus</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sentencia="SELECT * FROM salas WHERE estatus='Disponible'";
                                                $resultado=mysqli_query($con,$sentencia);
                                                while($filas=mysqli_fetch_assoc($resultado)){
                                                    echo "<tr>";
                                                        echo "<td>"; echo $filas['ID']; echo "</td>";
                                                        echo "<td>"; echo $filas['numero']; echo "</td>";
                                                        echo "<td>"; echo $filas['estatus']; echo "</td>";
                                                    echo "</tr>";
                                                 }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!--script para bloquear fechas en dias pasados-->	                                              
    <script>
        $(document).ready(function(){
                minDate = new Date();
                $("#h_inicial").datepicker({
                    showAnim: 'drop',
                    numberOfMonth: 1,
                    minDate: minDate,
                    dateFormat: 'dd-mm-yy hh-mm-ss',
                    onClase: function (selectedDate){
                        $('#h_final').datapicker("option","minDate ","selectedDate");
                    }
                }); 
        });
    </script>

    <!--scripts de bootstrap para un mejor diseño-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>      
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/natural.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> 

</body>  
</html>
