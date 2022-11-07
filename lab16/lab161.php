<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Laboratorio 16.1</title>
</head>
<body>
    <h1>Consulta de Servicio Web de Conversión de Temperatura</h1>
    <form action="lab161.php" name="FormConv" method="POST">
        <br>
        Convertir desde <select name="temp" id="">
            <option value="CtoF" select>°C a °F</option>
            <option value="FtoC">°F a °C</option>
        </select> El valor
        <input type="number" name="valor" step="Any" id="" required>
        <input type="submit" name="Convertir" value="Convertir">        
    </form>

    <?php 
        $servico = "https://www.w3schools.com/xml/tempconvert.asmx?wsdl";
        $parametros = array();
        if(array_key_exists('Convertir', $_POST)){
            $valor = $_POST['valor'];
            $temp = $_POST['temp'];

            if($temp == "CtoF"){
                $parametros['Celsius'] = $valor;
                $cliete = new SoapClient($servico, $parametros);
                $resultObj = $cliete->CelsiusToFahrenheit($parametros);
                $resultado = $resultObj->CelsiusToFahrenheitResult;
            }else{
                $parametros['Fahrenheit']=$valor;
                $cliete = new SoapClient($servico, $parametros);
                $resultObj = $cliete->FahrenheitToCelsius($parametros);
                $resultado = $resultObj->FahrenheitToCelsiusResult;
            }
            print("<br> La temperatura $valor".substr($temp,0,1)." es igual al $resultado".substr($temp,3,1));
        }
    ?>
</body>
</html>