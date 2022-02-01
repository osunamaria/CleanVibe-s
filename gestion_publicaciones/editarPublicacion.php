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

        $cumplido = editarPublicacion($id, $_POST["titulo"], $_POST["tipo"], $_POST["publicacion"], $_POST["contenido"], $_POST["fecha"]);
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
            

            <input type="text" name="titulo" placeholder="TITULO" class="input-100" value='<?php echo $publicacion["titulo"]; ?>' required><br>
            Noticia <input name="publicacion" id="publicacion" type="radio" value='<?php echo $publicacion["publicacion"]; ?>'> Evento <input name="publicacion" id="publicacion" type="radio" value='<?php echo $publicacion["publicacion"]; ?>'require><br>
            Publica <input name="tipo" id="tipo" type="radio" value='<?php echo $publicacion["tipo"]; ?>'> Privada <input name="tipo" id="tipo" type="radio" value='<?php echo $publicacion["tipo"]; ?>'require><br>
            <textarea name="contenido" id="contenido" value='<?php echo $publicacion["contenido"]; ?>' require></textarea>
            <input type="submit" value="Guardar Cambios" class="btn-enviar">
            <div id="errores"><?php echo $error; ?></div>
        </div>
    </form>
    </article>
</body>

</html>