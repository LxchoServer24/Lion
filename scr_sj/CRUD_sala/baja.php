<?php
    include("../service_php/conexion.php");  //conecta ala base de datos
    session_start();
    if(isset($_GET['ID'])){  //brinda datos
        
        $id = $_GET['ID'];

        $query = "DELETE FROM salas WHERE ID='$id'";  //elimina
        $query_run = mysqli_query($con,$query);

    if($query_run){   //comprueba
        echo '<script> alert("Datos borrados exitosamente"); </script>
              <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">Datos borrados exitosamente</a>
                    <form class="form-inline">
                        <a href="../service_php/crudoff.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Regresar</button></a>
                    </form>
              </nav>
            ';
    }else{
        echo '<script> alert("Datos no borrados"); </script>
              <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">Datos no borrados</a>
                    <form class="form-inline">
                        <a href="../service_php/crudoff.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Regresar</button></a>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>     <!--Plugin Para hacer sumas en tablas--> 
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script><!---- Es necesario para el datetimepicker--->
<script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/natural.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><!--- Esto hace que los nuevos targ de html5 se visualicen bien en navegadores antiguos--->
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> 