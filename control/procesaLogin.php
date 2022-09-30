<?php include("./../datos/accesoADatos.php"); ?>
    <?php
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $cadenaUsuarios = leerFichero('./../datos/usuarios.txt');
        if (strlen($cadenaUsuarios) !== 0) {
                        
            $arrayUsuarios = creaArrayDatos($cadenaUsuarios);

            if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
                
                $encontrado = false;
                $i = 0;
                $rolUsuario = 0;
                do {
                    if ($arrayUsuarios[$i][0] == $usuario && $arrayUsuarios[$i][1] == $password) {
                        $encontrado = true;
                        $rolUsuario = $arrayUsuarios[$i][2];
                    }
                    $i++;
                } while (!$encontrado && $i < count($arrayUsuarios));

                if ($encontrado) {
                    header('Location: '.'./../formulario.php?usuario='.$usuario."&rol=".$rolUsuario);
                    
                } else {
                    header('Location: '.'./../login.php?error=usuarioNoValido');
                }
    
            } elseif (empty($_POST["usuario"])) {
                header('Location: '.'./../login.php?error=usuario');
            } elseif (empty($_POST["password"])) {
                header('Location: '.'./../login.php?error=password');
            }

                        
        } else {
            echo "<p>NO HAY NINGUN ALUMNO</p>";
        }

        
        if ($usuario)
        //echo "<h1 style='color:green'>OK</h1>";
    ?>