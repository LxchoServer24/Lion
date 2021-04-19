<?php
    include("../service_php/conexion.php");  //conecta a la base de datos
    session_start();
    
    $id_s = '';
    $h_i = '';
    $h_f = '';

    if(isset($_GET['ID'])){   //recoge datos para editar

        $id = $_GET['ID'];  
        $querty = "SELECT * FROM juntas WHERE ID=$id";
        $query_ran = mysqli_query($con,$querty);
        if(mysqli_num_rows($query_ran) == 1){
           $row = mysqli_fetch_array($query_ran);
           $id_s = $row['ID_sala'];
           $h_i = $row['h_inicio'];
           $h_f = $row['h_final'];  
        }
    }

    if(isset($_POST['updatejunta'])){  //brinda los datos para actualizar
        
        $id = $_POST['ID'];  //get
        $id_s = $_POST['salon'];
        $h_i = $_POST['h_inicial'];
        $h_f = $_POST['h_final'];
        
        $query = "UPDATE juntas SET ID_sala='$id_s', h_inicio='$h_i', h_final='$h_f' WHERE ID=$id";
        $query_run = mysqli_query($con,$query);

        if($query_run){  //comprobación
            echo '<script> alert("Datos editados exitosamente"); </script>
                  <nav class="navbar navbar-light bg-light justify-content-between">
                        <a class="navbar-brand">Datos editados exitosamente</a>
                        <form class="form-inline">
                            <a href="../service_php/crudoff_j.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Regresar</button></a>
                        </form>
                  </nav>
                ';
        }else{
            echo '<script> alert("Datos no editados"); </script>
                  <nav class="navbar navbar-light bg-light justify-content-between">
                        <a class="navbar-brand">Datos no editados</a>
                        <form class="form-inline">
                            <a href="../service_php/crudoff_j.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Regresar</button></a>
                        </form>
                  </nav>
                ';
        }    
    }
?>

<!--Links bootstrap para un mejor diseño -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link href="https://code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

<!--Form para la edición-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg p-3 mb-5 bg-white ">
                <div class="card-body">
                    <form id="form1" method="POST" class="needs-validation" action="editable.php?id=<?php echo $_GET['ID'];?>" novalidate>
                    <input type="hidden" class="form-control" value="<?php echo $id;?>" id="ID" name="ID" required>
                    <div class="form-group">
                                                <label>ID del salon</label>
                                                <select class="form-control" id="salon" name="salon" values ="<?php echo $id_s?>" required> <!---->
                                                    <?php
                                                        $sentencia="SELECT * FROM juntas ";  //la variable "$sentencia" recibe todas las salas disponibles para hacer juntas    ---SELECT salas.ID FROM salas WHERE estatus='Disponible' INNER JOIN juntas ON salas.ID=juntas.ID_sala";
                                                        $resultado=mysqli_query($con,$sentencia);
                                                        while($filas=mysqli_fetch_assoc($resultado)){?>
                                                          <option><?php echo $filas['ID_sala'] ?></option>
                                                    <?php }?>
                                                </select>
                         
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Hora inicial</label>
                                                <input type="datetime-local" class="form-control" id="h_inicial" name="h_inicial" value="<?php echo $h_i;?>" required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Hora final</label>
                                                <input type="datetime-local" class="form-control" id="h_final" name="h_final" value="<?php echo $h_f;?>" required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>
                                            </div>
                        <button class="btn btn-primary" type="submit" id="btnSave-edit" name="updatejunta">Editar</button>
                        <a href="../service_php/crudoff_j.php"><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--script para bloquear fechas en dias pasados-->	                                              
<script>
        let start = document.getElementById('h_inicial');
        start.min = (new Date()).toISOString().substr(0,19);
        let final = document.getElementById('h_final');
        final.min = (new Date()).toISOString().substr(0,19);
</script>

<!--Links bootstrap para un mejor diseño -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>     <!--Plugin Para hacer sumas en tablas--> 
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script><!---- Es necesario para el datetimepicker--->
<script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/natural.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><!--- Esto hace que los nuevos targ de html5 se visualicen bien en navegadores antiguos--->
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> 