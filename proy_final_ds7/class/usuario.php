<?php
    require_once('modelo.php');

    class usuarios extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }

        public function validar_usuario($usr, $pwd){
            $instruccion = "CALL sp_validate_login('".$usr."', ".$pwd."')";

            $consulta = $this -> _db -> query($instruccion);
            $resultado = $consulta -> fetch_all(MYSQL_ASSOC);

            if($resultado){
                return $resultado;
                $resultado -> close();
                $this -> _db -> close();
            }
        }
    }
?>