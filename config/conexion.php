<?php

class conexion{
    private static $conexion;
    private $pdo;

    private function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=proyectomaps', 'root', '');
    }
    public static function getInstance(){
        if(!isset(self::$conexion)){
            self::$conexion = new conexion();
        }
        return self::$conexion->pdo;
    }
}