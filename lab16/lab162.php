<?php 
    
    $data = json_decode(file_get_contents('https://api.mercadolibre.com/users/226384143'),true);

    foreach($data as $nombre => $valor){
        if(!is_array($valor)){
            print "Campo $nombre : Valor $valor <br>";
        }else{
            print "Campo $nombre : [";
            foreach($valor as $valor_array){
                if(!is_array($valor_array)){
                    print("Valor: $valor_array, ");
                }else{
                    print("<arreglo>");
                }
                print("] <br>");
            }
        }
    }
?>