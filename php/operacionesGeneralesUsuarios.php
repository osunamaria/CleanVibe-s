<?php
function obtenerUsuario($id)
{
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        /*
        La clase PDOStatement es la que trata las sentencias SQL. 
        Una instancia de PDOStatement se crea cuando se llama a PDO->prepare(), 
        y con ese objeto creado se llama a métodos como bindParam() para pasar valores o execute() para ejecutar sentencias. 
        PDO facilita el uso de sentencias preparadas en PHP, que mejoran el rendimiento y la seguridad de la aplicación. 
        Cuando se obtienen, insertan o actualizan datos, el esquema es: PREPARE -> [BIND] -> EXECUTE. 
        Se pueden indicar los parámetros en la sentencia con un interrogante "?" o mediante un nombre específico.
        */
        $sql = $con->prepare("SELECT * from usuarios where id=:id");
        $sql->bindParam(":id", $id); //Para evitar inyecciones SQL
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos la linea correspondiente en ROW
        $con = null; //Cerramos la conexión
        return $row;
    } catch (PDOException $e) {
        echo $e;
    }
}

function eliminarUsuario($id){
    $retorno = false;
    try{
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("DELETE from usuarios where id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0){
            $retorno = true;
        }
        $con = null; //Cerramos la conexión
    }catch(PDOException $e){
        echo $e;
    }
    return $retorno;
}

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

function obtenerTodos(){
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("SELECT * from usuarios;");
        $sql->execute();
        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
            $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
        }
        $con = null;
    } catch (PDOException $e) {
        echo $e;
    }
    return $miArray;
}
?>