<?php
require "../model/turnoModel.php";
require "../model/listTurnos.php";


class Persistencia{
    public function __construct(){
        
    }
    public function guardar($turno){   
    //OBTENGO LA LISTA DE TURNOS ALMACENADA EN EL ARCHIVO
    $archivo = file_get_contents('../persistencia.json');
    $l = new listTurnos();
        if(empty($archivo)){
            $archivo= fopen("../persistencia.json", "w+");
          
            chmod("../persistencia.json", 755);
           
            $l -> addTurnos($turno);
            $json_string = json_encode($l);

            fwrite($archivo,"");
            fclose($archivo);
            file_put_contents('../persistencia.json', $json_string); 
            

        }else{
            //agrego el turno nuevo
            $l->addTurnos($turno);
            $a = json_decode($archivo, true);
            //recupero los turnos viejos
            foreach ($a as $t) {
                foreach ($t as $ar) {
                    # code...
                    $l->addTurnos($ar);
                }
                # code...
            }
            $archivo= fopen("../persistencia.json", "w+");
            // $t = array($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgSubida);
             chmod("../persistencia.json", 755);
            $json_string = json_encode($l);

            fwrite($archivo,"");
            fclose($archivo);
            file_put_contents('../persistencia.json', $json_string); 
        }

    }       
       public function leer(){

        $archivo = file_get_contents('../persistencia.json');
        $lista = new listTurnos();
        $a = json_decode($archivo, true);
        //recupero los turnos viejos
        foreach ($a as $t) {
            foreach($t as $arr){

                $lista->addTurnos($arr);
            }
            
            # code...
        }
        return $lista;

       }





   
}




?>