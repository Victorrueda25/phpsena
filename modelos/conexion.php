<?php

    class Conexion{

        static public function conectar(){

            $link = new PDO("mysql:host=localhost;port=3307;dbname=php_sena", "root", "root"); 

            return $link;

        }

    }