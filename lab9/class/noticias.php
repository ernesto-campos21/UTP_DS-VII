<?php

    require_once('modelo.php');
    
    class noticias extends modeloCredencialesBD
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

        public public function consultar_noticias()
        {
            $instruccion = $this->_db->query($instruccion);
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