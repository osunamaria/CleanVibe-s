<!-- Jesus Vazquez Gessa -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="form">
<?php

// Continuar la sesión
session_start();

if( isset($_SESSION['sesion_iniciada']) == true ){
    //Borrar variables de la sesion.
    session_unset(); 

    // Destruye el resto de información sobre la sesión
    session_destroy();

    //Vuelve al inicio de sesion
    header("location: ../registro/index.html");
}else{
    echo "<h2>Todavia no se ha introducido usuario y contraseña</h2><br>";

    echo "<a href='../registro/index.html'>[ Volver ]</a>";
}//Fin Si

?>
</div>

</body>
</html>