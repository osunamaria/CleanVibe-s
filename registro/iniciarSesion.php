<?php

    $servidor = "localhost";
    $baseDatos = "clean_vibes";
    $user = "root";
    $pass = "";

    $usuario=$_POST["usuario"];
    $contrasena= $_POST["contrasena"];
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
        $sql = $con->prepare("SELECT id FROM socios WHERE usuario=:usuario AND contrasena=:contrasena");
        $sql->bindParam(":usuario", $usuario);
        $sql->bindParam(":contrasena", $contrasena);
        $sql->execute();
        $id = "SELECT id FROM socios WHERE usuario=:usuario AND contrasena=:contrasena";
        $con = null; //Cerramos la conexión
        echo $id;
        // if ($id != 0 && $id != null && $id!="") {
        //     header("Location: ../index.html");
        //     exit();
        // } else {
        //     echo "Datos incorrectos";
        // }
    } catch (PDOException $e) {
        echo $e;
    }

?>