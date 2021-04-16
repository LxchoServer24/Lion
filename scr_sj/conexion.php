<?php
/*Datos de conexion a la base de datos*/
$db_host = "192.168.0.101";
$db_user = "root";
$db_pass = "12345";
$db_name = "sistema_sj";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$con){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error()."\n";
}
else{
   echo 'Se pudo conectar satisfactoriamente la base de datos'."\n";

   // sql Crea la tabla usando Lenguaje PHP
   $sql = "CREATE TABLE IF NOT EXISTS adm (
                nombre VARCHAR(50) NOT NULL,
                contracena VARCHAR(50) NOT NULL
            )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    
    // Se verifica si la tabla ha sido creado
    if ($con->query($sql) === TRUE) {
        echo 'la tabla adm ha sido creado'."\n";
    } else {
        echo 'Hubo un error al crear la tabla adm: ' . $con->error."\n";
    }

    /*$sqll = " CREATE PROCEDURE Insertifnoexist
              AS
              IF NOT EXISTS ( SELECT nombre FROM adm WHERE nombre = 'admin')
              BEGIN
                  INSERT INTO adm(nombre,contracena) values ('admin','hola123');
              END    
              ";*/


    // sql Crea la tabla usando Lenguaje PHP
    $sqlll = "CREATE TABLE IF NOT EXISTS salas (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        numero INT NOT NULL,
        estatus VARCHAR(50) NOT NULL
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    // Se verifica si la tabla ha sido creado
    if ($con->query($sqlll) === TRUE) {
        echo 'la tabla salas ha sido creado'."\n";
    } else {
        echo 'Hubo un error al crear la tabla salas: ' . $con->error."\n";
    }



    // sql Crea la tabla usando Lenguaje PHP
    $sqlv = "CREATE TABLE IF NOT EXISTS juntas (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        ID_sala INT NOT NULL,
        h_inicio DATETIME NOT NULL,
        h_final DATETIME NOT NULL,        
        FOREIGN KEY (ID_sala) REFERENCES salas(ID) 
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    // Se verifica si la tabla ha sido creado
    if ($con->query($sqlv) === TRUE) {
        echo 'la tabla juntas ha sido creado'."\n";
    } else {
        echo 'Hubo un error al crear la tabla juntas: ' . $con->error."\n";
    }

    // Cerramos la conexión
    $con->close();
}

?>
