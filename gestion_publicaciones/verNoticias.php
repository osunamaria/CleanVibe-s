<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/botonera.css">
        <link rel="stylesheet" href="css/view.css">
        <title>Ver publicaciones</title>
    </head>
    <body>
        
    <?php include "metodo.php";
    $id=$_GET["varId"];
    $publicacion=obtenerTodas($id);
    ?>

<a href="index.html">[Editar otra publicacion]</a>
    <a href="../index.html">[Pagina principal]</a>

        <div>
            <header>
                <div>
                    
                    <div>
                        <h3><?php echo $publicacion["titulo"]?></h3><!--aquí va el valor del texto 1-->
                        <p><?php echo $publicacion["publicacion"]?></p><!-- aquí va el valor del texto 2--> 
                        <p><?php echo $publicacion["tipo"]?></p><!-- aquí va el valor del texto 3-->
                    </div>
                </div>
            </header>

            <div>
                <div>
                    <ul>
                        <li>
                        <?php echo $publicacion["contenido"]?> <!-- aquí va el valor del número 1-->
                            <span>contenido</span><!-- pon aquí el nombre de tu número 1-->
                        </li>
                        <li>
                        <?php echo $publicacion["fecha"]?> <!-- aquí va el valor del número 2-->
                            <span>fecha</span><!-- pon aquí el nombre de tu número 2-->
                        </li>
                    </ul>
                </div>
            </div>

        </div>

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