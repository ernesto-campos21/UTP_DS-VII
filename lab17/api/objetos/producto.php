<?php
class Producto{
 // conexion de base de datos y tabla productos
 private $conn;
 private $nombre_tabla = "productos";
 // atributos de la clase
 public $id;
 public $nombre;
 public $descripcion;
 public $precio;
 public $categoria_id;
 public $categoria_desc;
 public $creado;
 // constructor con $db como conexion a base de datos
 public function __construct($db){
 $this->conn = $db;
 }

 // leer productos
 function read(){
    // query para seleccionar todos
    $query = "SELECT
    c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado
    FROM " . $this->nombre_tabla . " p
    LEFT JOIN
    categorias c
    ON p.categoria_id = c.id
    ORDER BY
    p.creado DESC";
    // sentencia para preparar query
    $stmt = $this->conn->prepare($query);
    // ejecutar query
    $stmt->execute();
    return $stmt;
 }

 // crear producto
 function crear(){
    // query para insertar un registro
    $query = "INSERT INTO
    " . $this->nombre_tabla . "
    SET
    nombre=:nombre, precio=:precio, descripcion=:descripcion, categoria
   _id=:categoria_id, creado=:creado";
    // preparar query
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
    $this->precio=htmlspecialchars(strip_tags($this->precio));
    $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
    $this->categoria_id=htmlspecialchars(strip_tags($this->categoria_id));
    $this->creado=htmlspecialchars(strip_tags($this->creado));
    // bind values
    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":precio", $this->precio);
    $stmt->bindParam(":descripcion", $this->descripcion);
    $stmt->bindParam(":categoria_id", $this->categoria_id);
    $stmt->bindParam(":creado", $this->creado);
    // execute query
    if($stmt->execute()){
    return true;
    }
    return false;
   }

   // utilizado al completar el formulario de actualización del producto
function readOne(){
   // consulta para leer un solo registro
   $query = "SELECT
   c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.
  precio, p.categoria_id, p.creado
   FROM
   " . $this->nombre_tabla . " p
   LEFT JOIN
   categorias c
   ON p.categoria_id = c.id
   WHERE
   p.id = ?
   LIMIT
   0,1";
   // preparar declaración de consulta
   $stmt = $this->conn->prepare( $query );
   // ID de enlace del producto a actualizar
   $stmt->bindParam(1, $this->id);
   // ejecutar consulta
   $stmt->execute();
   // obtener fila recuperada
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   // establecer valores a las propiedades del objeto
   $this->nombre = $row['nombre'];
   $this->precio = $row['precio'];
   $this->descripcion = $row['descripcion'];
   $this->categoria_id = $row['categoria_id'];
   $this->categoria_desc = $row['categoria_desc'];
  }
  // POSTMAN: http://localhost/Laboratorios/lab17/api/producto/leer_uno.php?id=60
  // http://localhost/Laboratorios/lab17/api/producto/leer_uno.php?id=999
}
?>