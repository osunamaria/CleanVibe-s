<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crear Instalacion</title>
</head>

<body>
    <?php include "metodo.php";

        error_log(0);

    $confirmacion = '';
    $error=false;//Control de errores
    $errores="";
    //Variables obtenidas por metodo post del formulario
        $tipo = $_POST['tipo'];
        $nombre = $_POST['nombre'];
        $localizacion = $_POST['localizacion'];

        //El HTML no lo controlaremos con required, para que así nos puedan meter valores vacios, ademas le daremos type text a todos para que puedan fallar y controlarlo aqui.
        if($tipo==""){
            $errores .= "<li>Necesitamos saber de quien es la instalacion</li>";
            $error=true;
        }

        if($nombre==""){
            $errores .= "<li>Para definir la instalacion necesitamo un nombre</li>";
            $error=true;
        }

        if($localizacion==""){
            $errores .= "<li>Es obligatorio definir una localizacion</li>";
            $error=true;
        }


        if (!$error) {
            $confirmacion = "Estos son los datos introducidos: <br>";
            $confirmacion .= "<li>Tipo: $tipo</li>";
            $confirmacion .= "<li>Nombre: $nombre</li>";
            $confirmacion .= "<li>Localizacion: $localizacion</li>";

        }else{
            $confirmacion = "No se ha podido realizar la inserción";
            $confirmacion .= $errores;
        }

    ?>
    <p><?php print($confirmacion); ?></p>   
    <a href="index.html">[ Insertar otra publicacion ]</a>
</body>
</html>