<?php

    $servidor = "localhost";
    $baseDatos = "clean_vibes";
    $user = "root";
    $pass = "";

    $usuario=$_POST["usuario"];
    $contrasena= $_POST["contrasena"];

    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
        $sql = $con->prepare("SELECT id FROM socios WHERE usuario=:usuario");
        $sql->bindParam(":usuario", $usuario);
        $sql->execute();

        echo $id;
        if ($id != 0 && $id != null && $id!="") {
            header("location: ../index.html");
            exit();
        } else {
            echo "Datos incorrectos";
        }
        
        $con = null; //Cerramos la conexión
    } catch (PDOException $e) {
        echo $e;
    }

    //Si el usuario y la contraseña son iguales, inicio sesion
    if ($usuario == $pass && $usuario != "" && $pass!=""){
        // Si se usa debe contener sólo caracteres alfanuméricos e ir antes de session_start():
        session_id("inicioSesion");
    
        // Iniciar la sesión
        session_start();
    
        // Variables de sesión:
        $_SESSION['sesion_iniciada'] = true;
        $_SESSION['username'] = $usuario;
        header("location: paginaprincipal.php");
    }else{
        header("location: error.php");
    }//Fin Si
?>