<?php
/*Datos de conexion a la base de datos*/
$db_host = "192.168.0.107";  //local host
$db_user = "root";          //usuario root
$db_pass = "12345";         //contraceña
$db_name = "sistema_sj";    //nombre de la base de datos para todo el sistema

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);  //conexion a la base de datos

if(!$con){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error()."\n";
}
else{
   //echo 'Se pudo conectar satisfactoriamente la base de datos'."\n";

   // $sql crea la tabla adm para un administrador quien va a ser CRUD con las salas
   $sql = "CREATE TABLE IF NOT EXISTS adm (
                nombre VARCHAR(50) NOT NULL,
                contracena VARCHAR(50) NOT NULL
            )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    
    // Se verifica si la tabla ha sido creado
    if ($con->query($sql) === TRUE) {
        //echo 'la tabla adm ha sido creado'."\n";
    } else {
        echo 'Hubo un error al crear la tabla adm: ' . $con->error."\n";
    }

    // $sqlw almacena la consulta de los atributos nombre ='admin' y contraceña="hola123" de la tabla adm    
    $sqlw = "SELECT * FROM adm WHERE nombre='admin' AND contracena='hola123'";
    $result = mysqli_query($con, $sqlw); //conexion de la base de datos con la consulta
    if(mysqli_num_rows($result)>0) 
    {
        // Si es mayor a cero imprimimos que ya existe el usuario
        //echo "Ya existe el registro que intenta registrar";
    }
    else
    {
        // Si no hay resultados, ingresamos el registro a la base de datos
            $sqll = "INSERT INTO adm(nombre, contracena) VALUES ('admin', 'hola123')";
            if (mysqli_query($con, $sqll)) {
       // Imprimimos que se ingreso correctamente
                //echo "Nuevo Registro Creado Exitosamente.";
            } else {
       // Mostramos si hay algun error al insertar registro
                echo "Error: " . $sqll . "" . mysqli_error($con);
            }
   }

    // sqlll se crea la tabla salas
    $sqlll = "CREATE TABLE IF NOT EXISTS salas (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        numero INT NOT NULL,
        estatus VARCHAR(50) NOT NULL
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    // Se verifica si la tabla ha sido creado
    if ($con->query($sqlll) === TRUE) {
        //echo 'la tabla salas ha sido creado'."\n";
    } else {
        echo 'Hubo un error al crear la tabla salas: ' . $con->error."\n";
    }



    // sqlv se crea la tabla juntas
    $sqlv = "CREATE TABLE IF NOT EXISTS juntas (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        ID_sala INT NOT NULL,
        h_inicio DATETIME NOT NULL,
        h_final DATETIME NOT NULL,        
        FOREIGN KEY (ID_sala) REFERENCES salas(ID) 
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    // Se verifica si la tabla ha sido creado
    if ($con->query($sqlv) === TRUE) {
        //echo 'la tabla juntas ha sido creado'."\n";
    } else {
        echo 'Hubo un error al crear la tabla juntas: ' . $con->error."\n";
    }

    //Trigger para la eliminación de registros cuya junta ya se terminó
    $tri = "CREATE TRIGGER `d_j` BEFORE INSERT ON `juntas`
                FOR EACH ROW BEGIN
                    DELETE FROM `juntas` WHERE `h_final` = now();
                END; 
    ";

    $con->query($tri);
    //var_dump($mysqli->error);
    // Cerramos la conexión
    //$con->close();
}

?>
