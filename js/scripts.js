window.onload=function(){

    document.getElementById("crearNuevoUsuario").onclick = function () {

        var usuarioActual = document.getElementById("usuarioActual").innerHTML;
        var rolActual = document.getElementById("rolActual").innerHTML;

        var string = "<form name='formulario' action='/EJERCICIOS_PHP/control/procesaUsuario.php' method='post'>" + 
        "<div style='margin-bottom: 10px'><label style='margin-right: 10px'>USUARIO</label><input type='text' name='usuarioNuevo' /><br />" + 
        "</div><div style='margin-bottom: 10px; margin-right: 10px'><label style='margin-right: 10px; margin-bottom: 20px'>CONTRASEÑA</label><input type='password' name='passwordNueva' /><br />" + 
        "<label style='margin-right: 10px; margin-top: 10px'>ROL</label><input type='number' name='rolNuevo' min='1' max='2'><br /></div>" +
        "<div style='margin-bottom: 10px'><input type='submit' value='AÑADIR' name='login' /></div>"+
        "<input type='hidden' name='usuarioActual' value='"+usuarioActual+"'><input type='hidden' name='rolActual' value='"+rolActual+"'></form>";
        
        document.getElementById("formNuevoUsuario").innerHTML = string;

    }

}