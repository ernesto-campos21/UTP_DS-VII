<?php
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
// incluir archivos de conexion y objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/producto.php';
// obtener conexion a la base de datos
$conex = new Conexion();
$db = $conex->obtenerConexion();
// preparar el objeto producto
$product = new Producto($db);
// set ID property of record to read
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
// leer los detalles del producto a editar
$product->readOne();
if($product->nombre!=null){
 // creacion del arreglo
 $product_arr = array(
 "id" => $product->id,
 "nombre" => $product->nombre,
 "descripcion" => $product->descripcion,
 "precio" => $product->precio,
 "categoria_id" => $product->categoria_id,
 "categoria_desc" => $product->categoria_desc
 );
 // asignar codigo de respuesta - 200 OK
 http_response_code(200);
 // mostrarlo en formato json
 echo json_encode($product_arr);
}
?>