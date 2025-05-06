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

        if(isset($_POST["ingresoEmail"])){

            $tabla = "personas";
            $item = "pers_correo";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloRegistro::mdlSeleccionarRegistro($tabla, $item, $valor);

            if($respuesta["pers_correo"] == $_POST["ingresoEmail"] && $respuesta["pers_clave"] == $_POST["ingresoPasword"]){
                $_SESSION["validarIngreso"] = "ok";

                echo '<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
            } else {
                echo '<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>';

                echo '<div class="alert alert-success">la contraseña no es valida</div>';
            }
        }
    }

    // Método crtIngreso corregido
    public function crtIngreso(){
        $tabla = "personas";

        $item = "pers_correo";
        $valor = $_POST["ingresoCorreo"]; // CORREGIDO: antes era $_POST("ingresoCorreo");

        $respuesta = ModeloRegistro::mdlSeleccionarRegistro($tabla, $item, $valor); // CORREGIDO: faltaba ;

        return $respuesta; // CORREGIDO: faltaba ;
    }

} // Aquí se cierra la clase correctamente.
