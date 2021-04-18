<?php

    include("../service_php/conexion.php");
    //require '../service_php/conexion.php';

    session_start();

    $user = $_POST['user'];
    $pasword = $_POST['password'];

    $sel = "SELECT COUNT(*) AS contar FROM adm WHERE nombre='$user' AND contracena='$pasword'";
    $consulta = mysqli_query($con,$sel);
    $data = mysqli_fetch_array($consulta);
    
    if($data['contar']>0){
        $_SESSION['username'] = $nombre;
        header("location: salas.php");
    }else{
        //echo 'Datos incorrectos';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link real="stylesheet" href="../includes/css_login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="css_login.css">
    <script src="js_login.js"></script>
</head>
<body>
    


<form action="" method="post" class="box">  <!--class="login"-->
    <div>
        <h1>
            Ingresar sólo como administrador
        </h1>
        <br>
        <p>
            NOTA: Con fines prácticos solamente hay un usuario para ingresar <br>
            DATOS: <br>
             - Nombre: admin <br>
             - Contraceña: hola123  
        </p>
    </div>

    <div>
        <label>Username</label><input name="user" type="text" placeholder="Nombre" id="username">
    </div>
    <div>
        <label>Password</label><input name="password" type="password" placeholder="Contraceña" id="password">
    </div>
    
    <div>
        <input name="login" type="submit" value="Ingresar" onclick="validate()">
    </div>
</form>

<!--<footer style="background-color:#000; width: 1367px; height: 170px; bottom: 0; position: fixed; color:goldenrod;">
	 	<?php
			require_once('../includes/footer.php');
		?>
</footer> -->   

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>
