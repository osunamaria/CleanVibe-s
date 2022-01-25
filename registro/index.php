<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- linkear con fuente belleza -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belleza&display=swap" rel="stylesheet">

    <!-- links css -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/registro.css">

    <!-- link para iconos -->
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">

    <!-- links js -->
    <script src="../js/registro.js"></script>

</head>

<body>
    <?php include_once "operacionesGeneralesUsuarios.php";
                $error = "";
                if (count($_POST) > 0) {
                    $id = insertaUsuario($_POST["usuario"], $_POST["contrasena"], $_POST["nombre"], $_POST["apellidos"], $_POST["dni"], $_POST["correo"], $_POST["telefono"], $_POST["fecnac"], $_POST["num_miembros"]);
                    if ($id != 0) {
                        header("Location: ../index.html");
                        exit();
                    } else {
                        $error = "Datos incorrectos";
                    }
                }
            ?>
    <header>
        <a href="../index.html"><img src="../img/logoOriginal.png" alt="Logo de Clear Vibe's" class="logo"></a>
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
    <section>
        <article>
            <div class="opcion">
                <h1 id="registro" class="subrayado">Reg&iacute;strate</h1>
                <h1 id="inicio">Inicia sesi&oacute;n</h1>
            </div>
        </article>
        <article>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" id="formRegistro">
                <table>
                    <tr>
                        <td>
                            <label for="usuario">Usuario</label>
                        </td>
                        <td>
                            <input type="text" name="usuario" id="usuario">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="contrasena">Contrase&ntilde;a</label>
                        </td>
                        <td>
                            <input type="text" name="contrasena" id="contrasena">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nombre">Nombre</label>
                        </td>
                        <td>
                            <input type="text" name="nombre" id="nombre">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="apellidos">Apellidos</label>
                        </td>
                        <td>
                            <input type="text" name="apellidos" id="apellidos">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dni">DNI</label>
                        </td>
                        <td>
                            <input type="text" name="dni" id="dni">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="correo">Correo</label>
                        </td>
                        <td>
                            <input type="email" name="correo" id="correo">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telefono">Telefono</label>
                        </td>
                        <td>
                            <input type="tel" name="telefono" id="telefono">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fecnac">Fecha de nacimiento</label>
                        </td>
                        <td>
                            <input type="date" name="fecnac" id="fecnac">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="num_miembros">Miembros de la familia</label>
                        </td>
                        <td>
                            <input type="number" name="num_miembros" id="num_miembros">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Enviar">
                        </td>
                    </tr>
                </table>
            </form>
        </article>
        <article>
            <form action="" id="formInicio" class="oculto">
                <table>
                    <tr>
                        <td>
                            <label for="usuario">Usuario</label>
                        </td>
                        <td>
                            <input type="text" name="usuario" id="usuario">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="contrasena">Contrase&ntilde;a</label>
                        </td>
                        <td>
                            <input type="text" name="contrasena" id="contrasena">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Enviar">
                        </td>
                    </tr>
                </table>
            </form>
            <div id="errores"><?php echo $error; ?></div>
        </article>
    </section>
    <footer>
        <div class="redes">
            <h3>Redes sociales</h3>
            <ul>
                <li><i class="fab fa-instagram"></i></li>
                <li><i class="fab fa-twitter"></i></li>
                <li><i class="fab fa-facebook-square"></i></li>
            </ul>
        </div>
        <div class="nosotros">
            <h3>Sobre nosotros</h3>
            <p>somos unos crackens</p>
        </div>
        <div class="avisos">
            <h3>Avisos legales</h3>
            <ul>
                <li>FAQ</li>
                <li>Condiciones de uso</li>
                <li>Otras cosas</li>
            </ul>
        </div><br>
        <hr>
        <p class="copy">Copyright &copy; 2021 Todos los derechos reservados ClearVibe's S.A.</p>
    </footer>
</body>

</html>