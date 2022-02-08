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
    <link rel="stylesheet" href="../css/tablaReservas.css">
    <title>Reservas</title>
</head>
<body>
<div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="../index.php" class="me-md-auto">
                <span class="fs-4"><img src="../img/logoOriginal.png" class="img-fluid"></span>
            </a>

            <ul class="nav nav-pills mt-4">
                <li class="nav-item"><a href="../index.php" class="nav-link text-secondary">Inicio</a></li>
                <li class="nav-item"><a href="../publicaciones/index.html" class="nav-link text-secondary">Publicaciones</a></li>
                <li class="nav-item"><a href="../reservas/index.php" class="nav-link text-secondary">Reservas</a></li>
                <?php
                // Continuar la sesión
                session_start();

                if(isset($_SESSION['sesion_iniciada']) == true ){
                    $tipo = session_id();
                    if($tipo=="presidente" || $tipo=="administrador"){
                        echo "<li class='nav-item dropdown'>";
                            echo "<a class='nav-link dropdown-toggle text-secondary' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                                echo "Gestiones";
                            echo "</a>";
                            echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                                echo "<li><a class='dropdown-item' href='#'>Usuarios</a></li>";
                                echo "<li><a class='dropdown-item' href='#'>Publicaciones</a></li>";
                                echo "<li><a class='dropdown-item' href='#'>Instalaciones</a></li>";
                                echo "<li><a class='dropdown-item' href='#'>Contabilidad</a></li>";
                                echo "<li><a class='dropdown-item' href='#'>Estadisticas</a></li>";
                            echo "</ul>";
                        echo "</li>";
                    }
                    echo "<li class='nav-item me-md-auto'><a href='../cerrarSesion.php' class='nav-link active bg-secondary rounded-pill' aria-current='page'>Cerrar sesión</a></li>";
                }else{
                    echo "<li class='nav-item me-md-auto'><a href='../registro/index.php' class='nav-link active bg-secondary rounded-pill' aria-current='page'>Entrar</a></li>";
                }//Fin si
            ?>
            </ul>
        </header>
    </div>

    <div class="container">
        <table class="table">
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
            echo "<th>".getdate()['weekday']." / ".getdate()['month']."</th>";
            echo "<th>".getdate()['weekday']." / ".getdate()['month']."</th>";
            echo "<th>".getdate()['weekday']." / ".getdate()['month']."</th>";
            echo "<th>".getdate()['weekday']." / ".getdate()['month']."</th>";
            echo "<th>".getdate()['weekday']." / ".getdate()['month']."</th>";
            echo "<th>".getdate()['weekday']." / ".getdate()['month']."</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            //Luego en la tabla de reservas, me traigo las hora inicio/hora fin, distinguiendo las fechas
            //Desde la misma consulta, y seis dias mas
            //Tabla de 7 columnas, distinguiendo horarios disponibles

            //Generar tabla, preguntar las horas que estan registradas en la base de datos, que seran las que no estan disponibles

            try {
                $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
                $sql = $con->prepare("SELECT hora_inicio,fecha
                                        FROM reservas 
                                        WHERE id_instalacion=:id_instalacion 
                                        AND DAY(fecha) = DAY(NOW()) || DAY(fecha) < (DAY(NOW())+6)
                                        LIMIT 0,25;");
                $sql->bindParam(":id_instalacion", $id_instalacion);
                $sql->execute();
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
                    $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
                }//Fin Mientras

                $horario = array(
                    0 => "8:00:00",
                    1 => "9:30:00",
                    2 => "11:00:00",
                    3 => "12:30:00",
                    4 => "14:00:00",
                    5 => "16:00:00",
                    6 => "17:30:00",
                    7 => "19:00:00",
                    8 => "20:30:00"
                );

                //i: dias
                //n: cada reserva que existe en nuestra bd
                //j: las horas de reserva

                //Cojo la fecha actual
                $fecha_actual = date("Y-m-d");
                
                //Recorriendo horas
                for($j=0;$j<sizeof($horario);$j++){
                    echo "<tr>";
                    //Recorro los dias
                    for($i=0;$i<7;$i++){
                        $fecha = date("Y-m-d",strtotime($fecha_actual."+ ".$i." days"));

                        //Recorro el array mientras me de falso
                        //Interruptor para saber si esta reservada 
                        $n = 0;
                        $pistaReservada = false;
                        do{
                            // echo $miArray[$n]['hora_inicio'] ."<br>";
                            // echo $horario[$j] ."<br>";
                            // if (strcmp($miArray[$n]['fecha'],$fecha) === 0 && strcmp($miArray[$n]['hora_inicio'],$horario[$j]) === 0){
                            if ($miArray[$n]['fecha'] === $fecha){
                                if($miArray[$n]['hora_inicio'] === $horario[$j]){
                                    echo "TE LO DIJE QUE IBA <br>";
                                    $pistaReservada = true;
                                }else{
                                    echo "Esto no va pisha <br>";    
                                }
                            }else{
                                echo "Esto no va pisha <br>";
                            }//Fin Si
                            $n++;
                        }while($pistaReservada || $n<sizeof($miArray));

                        if($pistaReservada){
                            echo "<td class='bg-danger'>".$horario[$j]."</td>";
                        }else{
                            echo "<td class='bg-success'>".$horario[$j]."</td>";
                        }//Fin Si
                    }//Fin Para
                    echo "</tr>";
                }//Fin Para

                $con = null; //Cerramos la conexión
            } catch (PDOException $e) {
                echo $e;
            }

            ?>
            </tbody>
        </table>
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
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>