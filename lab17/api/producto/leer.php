<?php
//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// la conexion a la base de datos estará aqui

// incluir archivos de conexion y objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/producto.php';
// inicializar base de datos y objeto producto
$conex = new Conexion();
$db = $conex->obtenerConexion();
// inicializar objeto
$producto = new Producto($db);
// lectura de productos estará aqui

// query productos
$stmt = $producto->read();
$num = $stmt->rowCount();
// verificar si hay mas de 0 registros encontrados
if($num>0){
 // arreglo de productos
 $products_arr=array();
 $products_arr["records"]=array();
 // obtiene todo el contenido de la tabla
 // fetch() es mas rapido que fetchAll()
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 // extraer fila
 // esto creara de $row['nombre'] a
 // solamente $nombre
 extract($row);
 $product_item=array(
 "id" => $id,
 "nombre" => $nombre,
 "descripcion" => html_entity_decode($descripcion),
 "precio" => $precio,
 "categoria_id" => $categoria_id,
 "categoria_desc" => $categoria_desc
 );
 array_push($products_arr["records"], $product_item);
 }
 // asignar codigo de respuesta - 200 OK
 http_response_code(200);
 // mostrar productos en formato json
 echo json_encode($products_arr);
}
// no hay productos encontrados estará aqui

else{
    // asignar codigo de respuesta - 404 No encontrado
    http_response_code(404);
    // informarle al usuario que no se encontraron productos
    echo json_encode(
    array("message" => "No se encontraron productos.")
    );
   }

   // POSTMAN: http://localhost/Laboratorios/lab17/api/producto/leer.php