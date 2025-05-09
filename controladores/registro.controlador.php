<?php

include "modelos/registro.modelo.php";

class ControladorRegistro{

    /*
    Método agregar registro
    */
    static public function ctrRegistro(){

        if(isset($_POST["registroNombre"])){

            $tabla = "personas";

            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "telefono" => $_POST["registroTelefono"],
                "correo" => $_POST["registroEmail"],
                "clave" => password_hash($_POST["registroPassword"], PASSWORD_DEFAULT)
            );

            $respuesta = ModeloRegistro::mdlRegistro($tabla, $datos);

            return $respuesta;
        }
    }

    /*
    Método seleccionar todos los registros
    */
    static public function ctrSeleccionarRegistro(){

        $tabla = "personas";

        $respuesta = ModeloRegistro::mdlSeleccionarRegistro($tabla, null, null);

        return $respuesta;
    }

    /*
    Método ingresar (login) con verificación de contraseña
    */
    static public function ctrIngreso(){

        if(isset($_POST["ingresoEmail"])){

            $tabla = "personas";
            $item = "pers_correo";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloRegistro::mdlSeleccionarRegistro($tabla, $item, $valor);

            if($respuesta &&
               $respuesta["pers_correo"] == $_POST["ingresoEmail"] &&
               password_verify($_POST["ingresoPassword"], $respuesta["pers_clave"])){

                session_start();

                $_SESSION["validarIngreso"] = "ok";

                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?modulo=contenido";
                </script>';

            } else {
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';

                echo '<div class="alert alert-danger">Correo o contraseña incorrectos</div>';
            }
        }
    }

public static function ctrActualizar() {
    if (isset($_POST['actualizarNombre'], $_POST['actualizarTelefono'], $_POST['actualizarCorreo'], $_POST['actualizarClave'])) {

        $tabla = "personas";

        $datos = array(
            "id" => $_GET["id"], 
            "nombre" => $_POST["actualizarNombre"],
            "telefono" => $_POST["actualizarTelefono"],
            "correo" => $_POST["actualizarCorreo"],
            "clave" => password_hash($_POST["actualizarClave"], PASSWORD_DEFAULT)
        );

        $respuesta = ModeloRegistro::mdlActualizarRegistro($tabla, $datos);

        return $respuesta;
    }

    return null;
}
} // Fin de la clase