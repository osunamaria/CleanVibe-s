<?php
    //Conectar base de datos
    $servidor = "localhost";
    $baseDatos = "cleanvibes";
    $user = "root";
    $pass = "";

    $id_reserva = $_POST['id_reserva'];
    $id_socio = $_POST['id_socio'];
    $num_socio = $_POST['num_socio'];
    $num_no_socio = $_POST['num_no_socio'];

    echo $id_reserva."<br>";
    echo $id_socio."<br>";
    echo $num_socio."<br>";
    echo $num_no_socio."<br>";

?>