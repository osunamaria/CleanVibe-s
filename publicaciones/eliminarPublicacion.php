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
</body>
</html>