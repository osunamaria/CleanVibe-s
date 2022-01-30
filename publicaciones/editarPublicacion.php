<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/botonera.css">
    <link rel="stylesheet" href="css/form.css">
    <title>Editar publicacion</title>
</head>

<body>
    <?php include "metodos.php";

    if (count($_GET) > 0) {
        $id = $_GET["varId"];
        $publicacion = obtenerPublicacion($id);
    } else {
        $id = $_POST["id"];
        $publicacion = obtenerPublicacion($id);
    }
    $error = '';
    if (count($_POST) > 0) {
        function seguro($valor)
        {
            $valor = strip_tags($valor);
            $valor = stripslashes($valor);
            $valor = htmlspecialchars($valor);
            return $valor;
        }

        $cumplido = editarPublicacion($id, seguro($_POST["titulo"]), $_POST["publicacion"], $_POST["tipo"], seguro($_POST["contenido"]), seguro($_POST["fecha"]));
        if ($cumplido == true) {
            header("Location: verNoticias.php?varId=" . $id);
            exit();
        } else {
            $error = "Datos incorrectos o no se ha actualizado nada";
        }
    }
    ?>

    <a href="index.php">[Editar otra publicacion]</a>
    <a href="../index.html">[Pagina principal]</a>


    </nav>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <h2>Características:</h2>
        <div">
            <input type="hidden" name="id" value="<?php echo $publicacion["id"]; ?>">
            <!--aquí va el id, es hidden por lo tanto no es visible en la web, pero si accesible desde PHP -->
            <!-- Cambiar 2 radio y el textarea que estan como input y type text -->
            <input type="text" name="titulo" placeholder="Titulo" value='<?php echo $publicacion["titulo"]; ?>' required>
            <input type="text" name="tipo" placeholder="tipo"  value='<?php echo $publicacion["tipo"]; ?>' required>
            <input type="text" name="contenido" placeholder="contenido"  value='<?php echo $publicacion["contenido"]; ?>' required>

            <div id="errores"><?php echo $error; ?></div>
        </div>
    </form>
</body>

</html>