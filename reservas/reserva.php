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

    <!-- php -------------------------------- -->
    <?php
    //Conectar base de datos
    // include 

    $id_instalacion = $_POST['id_instalacion'];

    //Luego en la tabla de reservas, me traigo las hora inicio/hora fin, distinguiendo las fechas
    //Desde la misma consulta, y seis dias mas
    //Tabla de 7 columnas, distinguiendo horarios disponibles

    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
        $sql = $con->prepare("SELECT fecha,hora_inicio,hora_fin FROM reservas WHERE id_instalacion=:id_instalacion");
        $sql->bindParam(":id_instalacion", $id_instalacion);
        $sql->execute();
        //Array de los dias con sus fechas, 7 dias
        $horarios = []; 
        $horarios = "SELECT fecha,hora_inicio,hora_fin 
            FROM reservas 
            WHERE id_instalacion=:id_instalacion 
            AND TO_NUMBER(TO_CHAR(fecha,'DD')) < (TO_NUMBER(TO_CHAR(fecha,'DD'))+6) 
            AND TO_NUMBER(TO_CHAR(fecha,'DD')) => TO_NUMBER(TO_CHAR(GETDATE('DD'))";

        // while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
        //     $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
        // } Ejercicio dani

        $con = null; //Cerramos la conexión
        echo $id;
    } catch (PDOException $e) {
        echo $e;
    }

    for($i=0;$i<7;$i++){
        //Horario de 8 a 10, 1:30
        for($j=0;$j<9){
            echo "<tr>";
            echo "<td>".$horarios[$i]['nombre']."</td>";
            echo "<td>".$horarios[$i]['nombre']."</td>";
            echo "</tr>";
        }//Fin Para
    }//Fin Para

    ?>

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
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>