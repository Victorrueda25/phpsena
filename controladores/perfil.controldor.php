<?php


require_once "modelos/perfil.modelo.php";

class ControladorPerfil {

    static public function ctrRegistrarPerfil() {

        if (isset($_POST["nombre"])) {

            $tabla = "perfil";

            $datos = array(
                "nombre" => $_POST["nombre"]
            );

            $respuesta = ModeloPerfil::mdlRegistrarPerfil($tabla, $datos);

            return $respuesta;
        }
    }

}