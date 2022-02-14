<?php
    //Conectar base de datos
    $servidor = "localhost";
    $baseDatos = "cleanvibes";
    $user = "root";
    $pass = "";

    //Recojo un array con las reservas, en caso de que sean varias
    $reservas=$_POST["id_reserva"];
    $id_socio = $_POST['id_socio'];
    $num_socio = $_POST['num_socio'];
    $num_no_socio = $_POST['num_no_socio'];

    try{
        //Compruebo que el socio este en nuestra base de datos
        if(){
            //Si esta dentro de nuestra base de datos, compruebo que el num de socios y no socio sean correctos, dependiendo de la pista que sea
            list($id_instalacion,$n,$m) = explode("/", $id_reserva[0]);
            switch($id_instalacion){
                case 1:
                case 2:
                    //Para las pistas de padel tienen que ser 4 
                    if(($num_no_socio+$num_socio)==4){
                        //Procedo a hacer las reservas
                    }else{
                        //Mando a pagina de error
                    }//Fin Si
                    break;
                case 3:
                case 4:
                    //Para las pistas de tenis deben ser 2 o 4
                    if(($num_no_socio+$num_socio)==2||($num_no_socio+$num_socio)==4){
                        //Procedo a hacer las reservas
                    }else{
                        //Mando a pagina de error
                    }//Fin Si
                    break;
                case 5:
                    //Futbol deben de ser 10
                    if(($num_no_socio+$num_socio)==10{
                       //Procedo a hacer las reservas
                    }else{
                        //Mando a pagina de error
                    }//Fin Si
                    break;
                case 6:
                    //Baloncesto deben de ser 10
                    if(($num_no_socio+$num_socio)==10{
                        //Procedo a hacer las reservas
                    }else{
                        //Mando a pagina de error
                    }//Fin Si
                    break;
                default:
                    //Mando a pagina de error
            }//Fin Segun Sea
        }else{
            //Mando a pagina de error
        }
    }catch(PDOException $e) {
        echo $e;
    }
    //Como recojo tres variables juntas, las separo con el metodo explode
    // list($id_instalacion, $fecha, $hora_inicio) = explode("/", $id_reserva);

    // echo $id_instalacion."<br>";
    // echo $fecha."<br>";
    // echo $hora_inicio."<br>";
    echo $id_socio."<br>";
    echo $num_socio."<br>";
    echo $num_no_socio."<br>";

?>