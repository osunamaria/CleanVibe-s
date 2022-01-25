<?php
$servidor = "localhost";
$baseDatos = "clean_vibes";
$usuario = "root";
$pass = "";


function insertaUsuario($usuario, $contrasena, $nombre, $apellidos, $dni, $correo, $telefono, $fecnac, $num_miembros){
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
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("INSERT into socios values(null, :usuario , :contrasena , :nombre , :apellidos , :dni , 'socio' , :correo , :telefono ,:fecnac , :num_miembros , :cuota)");
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
    } catch (PDOException $e) {
        echo $e;
    }
    return $id;
}

?>