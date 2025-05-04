<?php

require_once "conexion.php";

class ModeloProducto {

    static public function mdlProducto($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, cantidad, precio) VALUES (:nombre, :cantidad, :precio)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

}
