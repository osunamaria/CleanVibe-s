<?php

    $servidor = "localhost";
    $baseDatos = "cleanvibes";
    $user = "root";
    $pass = "";

    $usuario=$_POST["usuario"];
    $contrasena= $_POST["contrasena"];
    $nombre=$_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $dni=$_POST["dni"];
    $correo=$_POST["correo"];
    $telefono=$_POST["telefono"];
    $fecnac=$_POST["fecnac"];
    $num_miembros=$_POST["num_miembros"];

    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
  
    if($usuario=="" || $contrasena=="" || $nombre=="" || $apellidos=="" || $dni=="" || $correo=="" || $telefono=="" || $fecnac=="" || $num_miembros==""){
        
        echo "Debe rellenar todos los campos";

    }else if(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8){

        echo "DNI incorrecto";

    }else{

        try {
            if($num_miembros==1){
                $cuota=60;
            }else if($num_miembros>1 && $num_miembros<6){
                $cuota=70;
            }else if($num_miembros>5 && $num_miembros<11){
                $cuota=85;
            }else if($num_miembros>10){
                $cuota=90;
            }
            $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
            $sql = $con->prepare("INSERT into socios values(null, :usuario , :contrasena , :nombre , :apellidos , :dni , 'socio' , :correo , :telefono ,:fecnac , :num_miembros , :cuota, null)");
            $sql->bindParam(":usuario", $usuario);
            $sql->bindParam(":contrasena", $contrasena);
            $sql->bindParam(":nombre", $nombre);
            $sql->bindParam(":apellidos", $apellidos);
            $sql->bindParam(":dni", $dni);
            $sql->bindParam(":correo", $correo);
            $sql->bindParam(":telefono", $telefono);
            $sql->bindParam(":fecnac", $fecnac);
            $sql->bindParam(":num_miembros", $num_miembros);
            $sql->bindParam(":cuota", $cuota);
            $sql->execute();
            $id = $con->lastInsertId();
            $con = null;
            if ($id != 0) {
                header("Location: ../index.html");
                exit();
            } else {
                echo "Datos incorrectos";
            }
        } catch (PDOException $e) {
            echo $e;
        }

    }

?>