<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- linkear con fuente belleza -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belleza&display=swap" rel="stylesheet">

    <!-- link para iconos -->
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- links css -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/publicaciones.css">
    <title>Publicaciones</title>
</head>

<body>
    <header>
        <a href="../index.html"><img src="../img/logoOriginal.png" alt="Logo de Clear Vibe's" class="logo"></a>
        <a href="../registro/index.html"><button class="sesion">Entrar</button></a>
    </header>

    <nav class="menu">
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

    <article class="container">
        <div class="tablon">
            <h2>TABLÓN DE ANUNCIOS</h2>
            <div class="row">
                <div class="col-3">
                    <select class="filtro" name="tema" id="tema">
                        <option value="0">Filtrar</option>
                        <option value="evento">Eventos</option>
                        <option value="noticia">Noticias</option>
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" class="anadirAnuncio" value="Buscar"></input>
                </div>
                <div class="col-7 justify-content-end">
                    <a href="form.html" class="anadirAnuncio"><i class="far fa-plus-square"></i> Nueva publicación</a>
                </div>
            </div>
            <div class="row">
                <div>
                    <!-- Obtener todas -->
                    <table class="fixed_headers">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Publicacion</th>
                                <th>Tipo</th>
                                <th>Contenido</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include_once "metodos.php";
                
                            // error_reporting(0);
                            
                            $evento_noticia = obtenerTodas();
                
                            for ($i=0;$i<sizeof($evento_noticia);$i++){
                                echo "<tr>";
                                    echo "<td>".$evento_noticia[$i]['titulo']."</td>";
                                    echo "<td>".$evento_noticia[$i]['publicacion']."</td>";
                                    echo "<td>".$evento_noticia[$i]['tipo']."</td>";
                                    echo "<td>".$evento_noticia[$i]['contenido']."</td>";
                                    // Añadir foto de editar y eliminar fontawesaome
                                    echo "<td><a href='editarPublicacion.php'><i class='fas fa-trash-alt'  width='16' height='16'></i></a></td>";
                                    echo "<td><a href='editarPublicacion.php'><i class='fas fa-edit'  width='16' height='16'></i></a></td>";
                                echo "</tr>";
                            }//Fin Para
                            ?>
                        </tbody>
                    </table>
                <!-- Obtener todas Fin -->
                </div>
            </div>
        </div>
    </article>

    <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 mt-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="../index.php" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <img src="../img/logoNaranja.png" alt="logo">
            </a>
            <span class="text-muted">&copy; 2021 Company, Inc</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex fs-1">
            <li class="m-5"><i class="fab fa-instagram"></i></li>
            <li class="m-5"><i class="fab fa-twitter"></i></li>
            <li class="m-5"><i class="fab fa-facebook-square"></i></li>
        </ul>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>