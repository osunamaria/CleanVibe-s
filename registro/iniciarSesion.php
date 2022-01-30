<?php

    $servidor = "localhost";
    $baseDatos = "cleanvibes";
    $user = "root";
    $pass = "";

    $usuario=$_POST["usuario"];
    $contrasena= $_POST["contrasena"];

    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
        $sql = $con->prepare("SELECT id,tipo FROM socios WHERE usuario=:usuario AND contrasena=:contrasena");
        $sql->bindParam(":usuario", $usuario);
        $sql->bindParam(":contrasena", $contrasena);
        $sql->execute();

<<<<<<< HEAD
        $id = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos el id
        if($id==""){
            echo "Vacio";
        }else{
            echo "Lleno";
=======
        $persona = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos el id

        if ($persona!="") {
            //Inicio sesion
            //Sesion id seria el tipo de usuario
            session_id($persona['tipo']);
            session_start();
            
            // Variables de sesión:
            $_SESSION['sesion_iniciada'] = true;
            $_SESSION['username'] = $usuario;
            header("location: ../index.php");
        } else {
            //Error inicio sesion
            header("location: error.php");
>>>>>>> main
        }

        $con = null; //Cerramos la conexión
    } catch (PDOException $e) {
        echo $e;
    }
?>