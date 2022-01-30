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
        $sql->execute();

        $id = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos el id

        if (!$id=="") {
            //Inicio sesion
            //Sesion id seria el tipo de usuario
            session_id($id['tipo']);
            session_start();
            
            // Variables de sesión:
            $_SESSION['sesion_iniciada'] = true;
            $_SESSION['username'] = $id['usuario'];
            header("location: ../index.php");
        } else {
            //Error inicio sesion
            header("location: error.php");
        }

        $con = null; //Cerramos la conexión
    } catch (PDOException $e) {
        echo $e;
    }
?>