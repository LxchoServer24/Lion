<?php
    include("../service_php/conexion.php");
?>

<!DOCTYPE html>
<html lang="es-mx">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Salas de juntas - Gestion</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

</head>
<body>

    <header>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Salas de juntas</a>
            <form class="form-inline">
                <a href="../service_php/logoff.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Salir</button></a>
            </form>
        </nav>
    </header>

    <h1 class="display-4">Gestión de salas de juntas</h1>

    <div class="container">
        <table class="table table-hover">
            <thead class="table-success">
                <th scope="col">ID</th>
                <th scope="col">Numero</th>
                <th scope="col">Estatus</th>
                <th scope="col" colspan="2"> <button id="btnShowModal" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">Nueva sala</button><!--<a href="../CRUD_sala/alta.php"> <button type="button">Agregar sala nueva</button> </a>--> </th>            
            </thead>
            <tbody>
                <?php
                    $sentencia="SELECT * FROM salas";
                    $resultado=mysqli_query($con,$sentencia);
                    while($filas=mysqli_fetch_assoc($resultado)){
                        echo "<tr>";
                            echo "<td>"; echo $filas['ID']; echo "</td>";
                            echo "<td>"; echo $filas['numero']; echo "</td>";
                            echo "<td>"; echo $filas['estatus']; echo "</td>";
                            echo "<td><button type='button' class='btn btn-outline-warning updatebtn' >Editar sala</button></td>";
                            echo "<td><button type='button' class='btn btn-outline-danger deletebtn'>Eliminar sala</button></td>";
                            echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- Modal para agregar sala-->
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
                                    <form action="../CRUD_sala/alta.php" id="form1" method="post" class="needs-validation" novalidate>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Número</label>
                                                <input type="number" class="form-control" id="numero" name="numero" placeholder="Número para la nueva sala" required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Estatus</label>
                                                <select class="form-control" id="seleccionestatus" name="estatus" required>
                                                    <option value="Disponible" class="form-control" >Disponible</option>
                                                </select>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit" id="btnSave" name="insertsalon">Enviar</button>
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

    <!-- Modal para editar sala-->
    <div id="myModalEdit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Sala</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-lg p-3 mb-5 bg-white ">
                                    <div class="card-body">
                                        <form id="form1" method="put" class="needs-validation" action="../CRUD_sala/editable.php" novalidate>
                                            <div class="form-group">
                                                <input type="text"  id="ID" name="ID">
                                                <label>Número</label>
                                                <input type="text" class="form-control" id="numero" name="numero" required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Estatus</label>
                                                <input type="text" class="form-control" id="estatus" name="estatus" required>
                                                <select class="form-control" id="estatus" name="estatus" required>
                                                    <option value="Disponible" class="form-control">Disponible</option>
                                                    <option value="Cerrada" class="form-control">Cerrada</option>
                                                </select>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" id="btnSave-edit" name="updatesala">Editar</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal para borrar sala-->
    <div id="myModalDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Sala</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-lg p-3 mb-5 bg-white ">
                                    <div class="card-body">
                                        <form id="form1" method="put" class="needs-validation" action="../CRUD_sala/baja.php" novalidate>
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" class="form-control" id="ID" name="ID" required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Número</label>
                                                <input type="text" class="form-control" id="numero" name="numero" required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Estatus</label>
                                                <input type="text" class="form-control" id="estatus" name="estatus" required>
                                                <!--<select class="form-control" id="estatus" name="estatus" required>
                                                    <option value="Disponible" class="form-control">Disponible</option>
                                                    <option value="Cerrada" class="form-control">Cerrada</option>
                                                </select>-->
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" id="btnSave-edit" name="deletesala">Eliminar</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $('.updatebtn').on('click', function(){
                    
                    $('#myModalEdit').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();
                    
                    console.log(data);
                    
                    $('#ID').val(data[0]);
                    $('#numero').val(data[1]);
                    $('#estatus').val(data[2]); 

            });
        });
    </script>


    <script>
        $(document).ready(function(){
            $('.deletebtn').on('click', function(){
                    
                    $('#myModalDelete').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();
                    
                    console.log(data);
                    
                    $('#ID').val(data[0]);
                    $('#numero').val(data[1]);
                    $('#estatus').val(data[2]); 

            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>     <!--Plugin Para hacer sumas en tablas--> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script><!---- Es necesario para el datetimepicker--->
    <script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/natural.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><!--- Esto hace que los nuevos targ de html5 se visualicen bien en navegadores antiguos--->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> 

</body>
</html>