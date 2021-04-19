//funcion solo para verificar que el login fue exitoso o no
function validate(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    if(username == "admin" && password == "hola123"){
        alert("Ingreso exitosamente");
        return false;
    }else{
        alert("Ingreso fallido");
    }
}