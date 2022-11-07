<?php
require_once('modelo.php');

class noticias extends modeloCredencialesBD{

    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct(){
   
        parent::__construct();
       
    }
    public function consultar_noticias(){
        $instruccion = "CALL sp_listar_noticias()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar las noticias";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function consultar_noticias_filtro($campo, $valor){
        $instruccion = "CALL sp_listar_noticias_filtro('".$campo."','".$valor."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar las noticias";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    public function buscar_cantidad_noticias(){
        $instruccion = "CALL cantidadN()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        } else {
            echo "Fallo al consultar la cantidad las Noticias";
        }
    }
    public function paginar_noticias($minimo, $maximo){

        $instruccion = "CALL sp_paginar_noticias('".$minimo."','".$maximo."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar las noticias";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}
?>