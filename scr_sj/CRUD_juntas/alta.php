<?php
    //proceso de dar de alta 
    include("../service_php/conexion.php"); //conexion a la base de datos
    session_start();
    if(isset($_POST['insertjunta'])){      //recoleccion de datos
        
        $id_sala = $_POST['salon'];
        $h_inicial = $_POST['h_inicial'];
        $h_final = $_POST['h_final'];

        //para validar si las juntas son más de dos horas
        $n_i = str_replace('T',' ',$h_inicial);  
        $n_f = str_replace('T',' ',$h_final);

        $dt1 = new DateTime($n_i);
        $dt2 = new DateTime($n_f);

        $intervalo = $dt1->diff($dt2);
        $dif = (int)($intervalo->format('%h'));
        //echo $dif;
        
        if($dif>2 || $dif==0){
            echo '<script> alert("No se permiten juntas de más de dos horas"); </script>
                  <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">ERROR: No se permiten juntas de más de dos horas</a>
                    <form class="form-inline">
                      <a href="../service_php/crudoff_j.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Regresar</button></a>
                    </form>
                  </nav> 
            ';
        }else{
            
          //codigo comentado para validar que las juntas no se empalmen
           /* $querty = "SELECT * FROM juntas WHERE ID=$id";
            $query_ran = mysqli_query($con,$querty);
            if(mysqli_num_rows($query_ran) == 1){
               $row = mysqli_fetch_array($query_ran);
              $numero = $row['numero'];
              $estatus = $row['estatus'];  
            }*/
            
            /*$sentencia="SELECT * FROM juntas";
            $resultado=mysqli_query($con,$sentencia);
            while($filas=mysqli_fetch_array($resultado)){  //assoc
              $q = 1
              $aux = '';  
              $aux = $filas[1];
              
              echo $aux;
             }*/

            //insersion
            $query = "INSERT INTO juntas (`ID_sala`,`h_inicio`,`h_final`) VALUES ('$id_sala','$h_inicial','$h_final')";
            $query_run = mysqli_query($con,$query);

            if($query_run){
                echo '<script> alert("Datos insertados exitosamente"); </script>
                  <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">Datos insertados exitosamente</a>
                    <form class="form-inline">
                        <a href="../service_php/crudoff_j.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Regresar</button></a>
                    </form>
                  </nav>
            ';
            }else{
                echo '<script> alert("Datos no insertados"); </script>
                  <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">Datos no insertados</a>
                    <form class="form-inline">
                        <a href="../service_php/crudoff_j.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Regresar</button></a>
                    </form>
                  </nav>
            ';
            }
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