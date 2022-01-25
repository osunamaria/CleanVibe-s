<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/botonera.css">
    <title>Document</title>
</head>
<body>
    <!-- Preguntar antes de eliminar y asegurarse de si tiene permisos como usuario -->
    <?php include "metodos.php";
    $id= $_GET["varId"];
    $cumplido=eliminarPublicacion($id);
    $error='Se ha borrado la publicacion con el id: ' . $id;
    if(!$cumplido){
        $error="Error al borrar la publicacion seleccionado";
    }

    ?>

    <a href="index.html">[Eliminar otra publicacion]</a>
    <a href="../index.html">[Pagina principal]</a>

    <h2><?php echo $error;?></h2>
    <a href="index.html">Volver</a>
</body>
</html>