<?php

    require_once('modelo.php');
    
    class noticia extends modeloCredencialesBD
    {
        protected $titulo;
        protected $texto;
        protected $fecha;
        protected $categoria;
        protected $imagen;

        public function __construct()
        {
            parent::__construct();
        }

        public function consultar_noticias()
        {
            $instruccion = "CALL sp_listar_noticias()";
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado)
            {
                echo "Fallo al consultar las noticas";
            }
            else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function insertar_noticias($titulo, $descripcion, $categoria, $fecha, $imagen)
        {
            $instruccion = "CALL sp_insertar_noticias('".$titulo."','".$descripcion."','".$categoria."','".$fecha."','".$imagen."')";
            
            $consulta = $this->_db->query($instruccion);
            $this->_db->close();
        }

        public function consultar_noticias_filtro($campo, $valor)
        {
            $instruccion = "CALL sp_listar_filtro('".$campo."', '".$valor."')";
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado)
            {
                echo "Fallo al consultar las noticas";
            }
            else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }
    }
?>