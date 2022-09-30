<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; min-height: 60vh;">
        <form name="formulario" action="control/procesaLogin.php" method="post">
            <?php
            if (isset($_GET['error'])){
                if ($_GET['error'] == 'usuarioNoValido') {
                    echo "<h2 style='color:red'>ERROR: USUARIO MAL INTRODUCIDO</h2>";
                } else {
                    $error = $_GET['error'];
                    $error = strtoupper($error);
                    echo "<h2 style='color:red'>ERROR: NO HAS INTRODUCIDO ".$error."</h2>";
                }
            }   
            ?>
            <div style="margin-bottom: 10px">
                <label>USUARIO</label>
                <input type="text" name="usuario" /><br />
            </div>
            <div style="margin-bottom: 10px">
                <label>CONTRASEÑA</label>
                <input type="password" name="password" /><br />
            </div>
            <div>
                <input type="submit" value="LOGIN" name="login"/>
            </div>
            
       </form>
    </div>

</body>
</html>