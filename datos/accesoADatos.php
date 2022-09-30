<?php

    function leerFichero($ruta){
        return file_get_contents($ruta);
    }

    function creaArrayDatos($cadenaUsuarios){
        $arrayUsuarios = explode("\n", $cadenaUsuarios);

        for ($i = 0; $i < count($arrayUsuarios); $i++){

            $arrayNuevo = explode(";", $arrayUsuarios[$i]);
            $arrayUsuarios[$i] = $arrayNuevo;

        }
        
        return $arrayUsuarios;
    }

    function anadeUsuario($cadenaUsuarios) {
        file_put_contents("./../datos/usuarios.txt",$cadenaUsuarios);
    }

?>