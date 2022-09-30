<?php include("./../datos/accesoADatos.php"); ?>
<?php include("./funciones.php"); ?>
    <?php
        $usuarioActual = $_POST["usuarioActual"];
        $rolActual = $_POST["rolActual"];
        $nuevoUsuario = $_POST["usuarioNuevo"];
        $nuevaPassword = $_POST["passwordNueva"];
        $nuevoRol = $_POST['rolNuevo'];

        $cadenaUsuarios = leerFichero('./../datos/usuarios.txt');
        if (strlen($cadenaUsuarios) !== 0) {
                        
            $arrayUsuarios = creaArrayDatos($cadenaUsuarios);

            if (!empty($_POST["usuarioNuevo"]) && !empty($_POST["passwordNueva"])) {
                
                $encontrado = false;
                $i = 0;
                $rolUsuario = 0;
                do {
                    if ($arrayUsuarios[$i][0] == $nuevoUsuario && $arrayUsuarios[$i][1] ==  $nuevaPassword) {
                        $encontrado = true;
                        $rolUsuario = $arrayUsuarios[$i][2];
                    }
                    $i++;
                } while (!$encontrado && $i < count($arrayUsuarios));

                if ($encontrado) {
                    header('Location: '.'./../formulario.php?usuario='.$usuarioActual."&rol=".$rolActual."&resol=usuarioExiste");
                } else {
                    $usuarioNuevo[0] = $nuevoUsuario;
                    $usuarioNuevo[1] = $nuevaPassword;
                    $usuarioNuevo[2] = $nuevoRol;
                    array_push($arrayUsuarios,$usuarioNuevo);
                    $cadenaUsuarios= arrayCadena($arrayUsuarios);
                    anadeUsuario($cadenaUsuarios);
                    header('Location: '.'./../formulario.php?usuario='.$usuarioActual."&rol=".$rolActual."&resol=usuarioAnadido");
                }
    
            } elseif (empty($_POST["usuario"])) {
                header('Location: '.'./../login.php?error=usuario');
            } elseif (empty($_POST["password"])) {
                header('Location: '.'./../login.php?error=password');
            }

                        
        } else {
            echo "<p>NO HAY NINGUN ALUMNO</p>";
        }
        //echo "<h1 style='color:green'>OK</h1>";
    ?>