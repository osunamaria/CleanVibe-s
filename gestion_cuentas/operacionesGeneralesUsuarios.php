<?php

    $servidor = "localhost";
    $baseDatos = "cleanvibes";
    $user = "root";
    $pass = "";

    function obtenerUsuario($id)
    {
        try {
            $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
            /*
            La clase PDOStatement es la que trata las sentencias SQL. 
            Una instancia de PDOStatement se crea cuando se llama a PDO->prepare(), 
            y con ese objeto creado se llama a métodos como bindParam() para pasar valores o execute() para ejecutar sentencias. 
            PDO facilita el uso de sentencias preparadas en PHP, que mejoran el rendimiento y la seguridad de la aplicación. 
            Cuando se obtienen, insertan o actualizan datos, el esquema es: PREPARE -> [BIND] -> EXECUTE. 
            Se pueden indicar los parámetros en la sentencia con un interrogante "?" o mediante un nombre específico.
            */
            $sql = $con->prepare("SELECT * from socios where id=:id");
            $sql->bindParam(":id", $id); //Para evitar inyecciones SQL
            $sql->execute();
            $row = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos la linea correspondiente en ROW
            $con = null; //Cerramos la conexión
            return $row;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function obtenerTodos(){
        try {
            $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['user'], $GLOBALS['pass']);
            $sql = $con->prepare("SELECT * from socios;");
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

    function insertarUsuario(){
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
                $sql = $con->prepare("INSERT into socios values(null, :usuario , :contrasena , :nombre , :apellidos , :dni , 'socio' , :correo , :telefono ,:fecnac , :num_miembros , :cuota, 1)");
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
    }
?>