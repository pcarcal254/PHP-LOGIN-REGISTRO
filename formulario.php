<!DOCTYPE html>
<?php include("datos/accesoADatos.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
    <script src="js/scripts.js"></script>
</head>
<body>

<?php
    if (!empty($_GET["usuario"]) && !empty($_GET["rol"])){
            echo ("<div>");
                echo "<h2>BIENVENIDO ".strtoupper($_GET['usuario'])."</h2>";
                echo "<p id='usuarioActual' hidden>".$_GET['usuario']."</p>";
                echo "<p id='rolActual' hidden>".$_GET['rol']."</p>";

            echo ("<div>");
                echo("<div>");
                        $cadenaAlumnos = leerFichero('datos/usuarios.txt');
                        if (strlen($cadenaAlumnos) !== 0) {
                            
                            $arrayAlumnos = explode("\n", $cadenaAlumnos);

                            for ($i = 0; $i < count($arrayAlumnos); $i++){

                                $arrayNuevo = explode(";", $arrayAlumnos[$i]);
                                $arrayAlumnos[$i] = $arrayNuevo;

                            }

                            $stringTabla = "<table style='border: 1px solid black;'><tr><th>NOMBRE</th><th>CLAVE</th></tr>";

                            for ($i = 0; $i < count($arrayAlumnos); $i++){
                                $stringTabla .= "<tr>
                                    <td>".$arrayAlumnos[$i][0]."</td>
                                    <td>".$arrayAlumnos[$i][1]."</td>
                                </tr>";
                            }
                            
                            echo $stringTabla;
                            
                        } else {
                            echo "<p>NO HAY NINGUN ALUMNO</p>";
                        }
                        if ($_GET['rol'] == 1) {
                            echo '<button type="button" id="crearNuevoUsuario" name="NUEVO USUARIO" style="margin-bottom:10px">NUEVO USUARIO</button>';
                        }
                        if (isset($_GET['resol']) && $_GET['resol'] == 'usuarioExiste') {
                            echo '<p style="color: red;">EL USUARIO QUE HAS INTENTADO INTRODUCIR YA ESTA EN NUESTRA BASE DE DATOS</p>';
                        } else if (isset($_GET['resol']) && $_GET['resol'] == 'usuarioAnadido') {
                            echo '<p style="color: green;">EL USUARIO HA SIDO AÑADIDO CORRECTAMENTE</p>';
                        }
                echo ("</div>");
                echo ("<div id='formNuevoUsuario'>");
                    
                echo ("</div>");
            echo ("</div>");
        echo ("</div>");
    } else {
        header('Location: login.php');
    }
?>
    
</body>
</html>