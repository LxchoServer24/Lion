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
        echo 'Datos incorrectos';
    }
?>
<!-- 
<style type="text/css">
*{
    font-size: 14px;
}
form.login {
    background: none repeat scroll 0 0 #F1F1F1;
    border: 1px solid #DDDDDD;
    font-family: sans-serif;
    margin: 0 auto;
    padding: 20px;
    width: 278px;
}
form.login div {
    margin-bottom: 15px;
    overflow: hidden;
}
form.login div label {
    display: block;
    float: left;
    line-height: 25px;
}
form.login div input[type="text"], form.login div input[type="password"] {
    border: 1px solid #DCDCDC;
    float: right;
    padding: 4px;
}
form.login div input[type="submit"] {
    background: none repeat scroll 0 0 #DEDEDE;
    border: 1px solid #C6C6C6;
    float: right;
    font-weight: bold;
    padding: 4px 20px;
}
.error{
    color: red;
    font-weight: bold;
    margin: 10px;
    text-align: center;
}
</style> -->
 
<form action="" method="post" class="login">
    <div><label>Username</label><input name="user" type="text" ></div>
    <div><label>Password</label><input name="password" type="password"></div>
    <div class="alert"><?php echo isset($alert)? $alert : ''; ?></div>
    <div><input name="login" type="submit" value="login"></div>
</form>
