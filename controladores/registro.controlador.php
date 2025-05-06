<?php

include "modelos/registro.modelo.php";

class ControladorRegistro{

    /*
    Metodo agregar registro
    */

    static public function ctrRegistro(){

        if(isset($_POST["registroNombre"])){

            $tabla = "personas";

            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "telefono" => $_POST["registroTelefono"],
                "correo" => $_POST["registroEmail"],
                "clave" => $_POST["registroPassword"]            

            );

            $respuesta = ModeloRegistro::mdlRegistro($tabla, $datos);

            return $respuesta;

        }

    }

    /* 
    Metodo ingresar
    */

    static public function ctrIngreso(){
        public function crtIngreso(){
            $tabla = "personas";

            $item = "pers_correo";
            $valor = $_POST("ingresoCorreo");

            $respuesta = ModeloRegistro::mdlSeleccionarRegistro
        }
    }
    
}