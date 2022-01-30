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
    <link rel="stylesheet" href="../css/reservas.css">
    <title>Reservas</title>
</head>
<body>
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

    <table class="table table-success table-striped">
        <thead>
            <tr>
                

        <!-- php -------------------------------- -->
        <?php
        //Conectar base de datos
        $servidor = "localhost";
        $baseDatos = "cleanvibes";
        $user = "root";
        $pass = "";

        $id_instalacion = $_POST['id_instalacion'];

        echo "<th>".getdate()['weekday']." / ".getdate()['month']."</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        //Luego en la tabla de reservas, me traigo las hora inicio/hora fin, distinguiendo las fechas
        //Desde la misma consulta, y seis dias mas
        //Tabla de 7 columnas, distinguiendo horarios disponibles

        //Generar tabla, preguntar las horas que estan registradas en la base de datos, que seran las que no estan disponibles

        try {
            $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
            $sql = $con->prepare("SELECT fecha,hora_inicio FROM reservas WHERE id_instalacion=:id_instalacion AND TO_NUMBER(TO_CHAR(fecha,'DD')) < (TO_NUMBER(TO_CHAR(GETDATE,'DD'))+6) 
            AND TO_NUMBER(TO_CHAR(fecha,'DD')) => TO_NUMBER(TO_CHAR(GETDATE('DD'))");
            $sql->bindParam(":id_instalacion", $id_instalacion);
            $sql->execute();
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
                $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
            }//Fin Mientras
            
            for($i=0;$i<7;$i++){
                //Horario de 8 a 10, 1:30
                for($j=0;$j<9;$j++){
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "</tr>";
                }//Fin Para
            }//Fin Para

            $con = null; //Cerramos la conexión
        } catch (PDOException $e) {
            echo $e;
        }

        ?>
        </tbody>
    </table>

    <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 mt-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="index.html" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <img src="img/logoNaranja.png" alt="logo">
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