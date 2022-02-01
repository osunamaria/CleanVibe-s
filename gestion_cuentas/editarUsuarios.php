<?php
    function editarUsuario($id, $usuario, $contrasena, $nombre, $apellidos, $dni, $tipo, $correo, $telefono, $fecnac, $num_miembros, $cuota)
    {
        $retorno = false;
        try {
            $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
            $sql = $con->prepare("UPDATE usuarios  set usuario=:usuario , contrasena=:contrasena , nombre=:nombre apellidos=:apellidos , dni=:dni, tipo=:tipo, correo=:correo, telefono=:telefono, fecnac=:fecnac, num_miembros=:num_miembros, cuota=:cuota where id=:id;");
            $sql->bindParam(":id", $id);
            $sql->bindParam(":usuario", $usuario);
            $sql->bindParam(":contrasena", $contrasena);
            $sql->bindParam(":nombre", $nombre);
            $sql->bindParam(":apellidos", $apellidos);
            $sql->bindParam(":dni", $dni);
            $sql->bindParam(":tipo", $tipo);
            $sql->bindParam(":correo", $correo);
            $sql->bindParam(":telefono", $telefono);
            $sql->bindParam(":fecnac", $fecnac);
            $sql->bindParam(":num_miembros", $num_miembros);
            $sql->bindParam(":cuota", $cuota);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $retorno = true;
            }
            $con = null;
        } catch (PDOException $e) {
            echo $e;
        }
        return $retorno;
    }
?>