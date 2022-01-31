<?php

    $servidor = "localhost";
    $baseDatos = "clean_vibes";
    $user = "root";
    $pass = "";

    $usuario=$_POST["usuario"];
    $contrasena= $_POST["contrasena"];

    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);

        session_start();
        session_destroy();
        header("location: index.php");

        $con = null; //Cerramos la conexión
    } catch (PDOException $e) {
        echo $e;
    }
?>