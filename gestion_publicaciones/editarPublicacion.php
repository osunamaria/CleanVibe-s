<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/formPublicacion.css">
    <title>Editar Publicaciones</title>
</head>

<header>
        <a href="../index.html"><img src="../img/logoOriginal.png" alt="Logo de Clear Vibe's" class="logo"></a>
        <a href="../registro/index.html"><button class="sesion">Entrar</button></a>
    </header>

    <nav>
        <ul>
            <li><a href="#">Acerca de</a></li>
            <li><a href="#">Instalaciones</a></li>
            <li><a href="#">Reservas</a></li>
            <li><a href="#">Publicaciones</a></li>
            <li><a href="#">Estadísticas</a></li>
            <li><a href="#">Contabilidad</a></li>
            <li><a href="#">Gestión de cuentas</a></li>
        </ul>
    </nav>

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

        $cumplido = editarPublicacion($id, $_POST["titulo"], $_POST["publicacion"], $_POST["tipo"], $_POST["contenido"], $_POST["fecha"]);
        if ($cumplido == true) {
            header("Location: index.php?varId=" . $id);
            exit();
        } else {
            $error = "Datos incorrectos o no se ha actualizado nada";
        }
    }
    ?>
<article>
    <form class="form-register" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <h2 class="form-titulo">Características:</h2>
        <div class="contenedor-inputs">
            <input type="hidden" name="id" value="<?php echo $publicacion["id"]; ?>">
            <!--aquí va el id, es hidden por lo tanto no es visible en la web, pero si accesible desde PHP -->
            

            <input type="text" name="titulo" placeholder="titulo" class="input-100" require value='<?php echo $publicacion["titulo"]; ?>'><br>

            <!-- CHECKEAR REQUIRE -->
            Evento<input type="radio" name="publicacion" class="input-100" require value='<?php $publicacion["publicacion"] = "evento"; echo $publicacion["publicacion"]; ?>'>
            Noticia<input type="radio" name="publicacion" class="input-100" value='<?php $publicacion["publicacion"] = "noticia"; echo $publicacion["publicacion"]; ?>'><br>

            Publico<input type="radio" name="tipo" class="input-100" require value='<?php $publicacion["tipo"] = "publico"; echo $publicacion["tipo"]; ?>'>
            Privado<input type="radio" name="tipo" class="input-100" value='<?php $publicacion["tipo"] = "privado"; echo $publicacion["tipo"]; ?>' require><br>

            <textarea name="contenido" id="contenido" placeholder="contenido" require value='<?php echo $publicacion["contenido"]; ?>'></textarea><br>

            <input type="date" name="fecha" placeholder="fecha" class="input-100" require value='<?php echo $publicacion["fecha"]; ?>'><br>

            <input type="submit" value="Guardar Cambios" class="btn-enviar">
            <div id="errores"><?php echo $error; ?></div>
        </div>
    </form>
    </article>
</body>

</html>