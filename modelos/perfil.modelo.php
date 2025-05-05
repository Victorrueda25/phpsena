<?php

require_once "conexion.php";

class ModeloPerfil {

    static public function mdlRegistrarPerfil($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt = null;
            return "ok";
        } else {
            $stmt = null;
            return "error";
        }
    }

}