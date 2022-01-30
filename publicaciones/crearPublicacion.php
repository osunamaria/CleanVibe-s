<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crear Noticia</title>
</head>

<body>
    <?php include "metodos.php";

        error_log(0);

    $confirmacion = '';
    $error=false;//Control de errores
    $errores="";
    //Variables obtenidas por metodo post del formulario
    //isset para controlar errores
        
        $titulo = $_POST['titulo'];
        $publicacion = isset($_POST['publicacion']);
        $tipo = isset($_POST['tipo']);
        $contenido = $_POST['contenido'];
        $fecha = $_POST['fecha'];

        //El HTML no lo controlaremos con required, para que así nos puedan meter valores vacios, ademas le daremos type text a todos para que puedan fallar y controlarlo aqui.
        if($publicacion==""){
            $errores .= "<li>Necesitamos saber si es una noticia o evento</li>";
            $error=true;
        }else{
            $publicacion =$_POST['publicacion'];
        }

        if($titulo==""){
            $errores .= "<li>Para definir la publicacion necesitamo un titulo</li>";
            $error=true;
        }

        if($tipo==""){
            $errores .= "<li>Es obligatorio definir la privacidad de la publicacion</li>";
            $error=true;
        }else{
            $tipo = $_POST['tipo'];
        }

        if($contenido==""){
            $errores .= "<li>Es necesaria una breve descripcion de la publicacion</li>";
            $error=true;
        }

        if($fecha==""){
            $errores .= "<li>Defina la fecha</li>";
            $error=true;
        }


        if (!$error) {
            $confirmacion = "Estos son los datos introducidos: <br>";
            $confirmacion .= "<li>Titulo: $titulo</li>";
            $confirmacion .= "<li>Tipo: $tipo</li>";
            $confirmacion .= "<li>Publicacion: $publicacion</li>";
            $confirmacion .= "<li>Contenido: $contenido</li>";
            insertarPublicacion($titulo, $publicacion, $tipo, $contenido, $fecha);
        }else{
            $confirmacion = "No se han podido realizar la inserción";
            $confirmacion .= $errores;

        }

    ?>
    <p><?php print($confirmacion); ?></p>   
    <a href="form.html">[ Insertar otra publicacion ]</a>
</body>
</html>