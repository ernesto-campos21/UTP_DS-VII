<?php
    require_once('modelo.php');

    class usuarios extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }


        public function validar_usuario($usr, $pwd){
            $instruccion = "CALL sp_validate_login('".$usr."','".$pwd."')";

            if($consulta = $this -> _db -> query($instruccion)){
                echo '<script language="javascript">alert("Bienvenido'.$usr.'!");</script>';
                return true;
            }
            return false;
        }

        public function registrar_usuario($name, $lastname, $mail, $username, $password){

            $instruccion = "CALL sp_register_user('".$username."','".$password."','".$mail."','".$name."','".$lastname."')";
            
            if($consulta = $this -> _db -> query($instruccion)){
                echo '<script language="javascript">alert("El usuario se ha registrado!");</script>';
                return true;
            }
            return false;
            
        }

        public function user_exist($user){

            $instruccion = "CALL sp_validate_username('".$user."')";
           
            if($consulta = $this -> _db -> query($instruccion)){
                $resultado = $consulta -> fetch_all(MYSQLI_ASSOC);
                if($resultado > 0){
                    echo '<script language="javascript">alert("El usuario ya existe!");</script>';
                    return true;
                }     
            }
            return false;
        }

        public function mail_exist($mail){

            $instruccion = "CALL sp_validate_mail('".$mail."')";
            
            if($consulta = $this -> _db -> query($instruccion)){
                $resultado = $consulta -> fetch_all(MYSQLI_ASSOC);
                if($resultado > 0)
                {
                    echo '<script language="javascript">alert("El correo ya existe!");</script>';
                    return true;
                }            
            }
            return false;
        }


        public function validar_existencias($user, $mail){

            if($this->user_exist($user))
            {
                return true;
            }
            else{
                if($this->mail_exist($mail)){
                    return true;
                }
                else{
                    echo '<script language="javascript">alert("Error de Programa");</script>';
                }
            }
            return false;
        }
        
    }
?>