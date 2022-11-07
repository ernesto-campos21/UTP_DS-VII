<?php
    require_once('class/modelo.php');
    class votos extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }
    

    public function listar_votos(){
        $instruccion = "CALL sp_listar_votos()";

        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if($resultado){
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    public function actualizar_votos($voto1, $voto2){
        
        $instruccion = "CALL sp_actualizar_votos($voto1, $voto2)";
        echo $instruccion;
        $actualiza = $this->_db->query($instruccion);
        
        

        if($actualiza){
            
            return $actualiza;
            $actualiza->close();
            $this->_db->close();
        }
    }
}
?>