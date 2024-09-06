<?php

require_once("../model/model.php");

class clientes extends model{
    private $cedula;
    private $nombres;
    private $apellidos;
    private $direccion;
    private $ubicacion;

    public function __construct($Cedula,$Nombre, $Apellido, $Direccion, $Ubicacion){
        parent::__construct();
        $this->cedula=$Cedula;
        $this->nombres=$Nombre;
        $this->apellidos=$Apellido;
        $this->direccion=$Direccion;
        $this->ubicacion=$Ubicacion;
    }
    public function getCedula(){
        return $this->cedula;
    }
    public function getNombres(){
        return $this->nombres;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getUbicacion(){
        return $this->ubicacion;
    }
    public function setCedula(int $Cedula){
        $this->cedula=$Cedula;
    }
    public function setNombres(string $Nombres){
        $this->nombres=$Nombres;
    }
    public function setApellidos(string $Apellidos){
        $this->apellidos=$Apellidos;
    }
    public function setDireccion(string $Direccion){
        $this->direccion=$Direccion;
    }
    public function setUbicacion(string $Ubicacion){
        $this->ubicacion=$Ubicacion;
    }
    protected function getSelectQuery($coordenadas): string{
        return 'SELECT clientes.cedula, clientes.nombres, clientes.apellidos, clientes.direccion, ST_Distance_Sphere(Ubicacion, POINT('.$coordenadas.')) as Distancia FROM clientes ORDER BY Distancia ASC';
    }
    protected function getInsertQuery(): string{
        return 'INSERT INTO clientes (cedula, nombres, apellidos, direccion, ubicacion) VALUES (:cedula, :nombres, :apellidos, :direccion, Point(:lng, :lat))';
    }
    protected function createPDO(PDOStatement $statement): PDOStatement{
        $lng = explode(',', $this->ubicacion)[0];
        $lat = explode(',', $this->ubicacion)[1];

        $statement->bindParam(':cedula', $this->cedula, PDO::PARAM_INT);
        $statement->bindParam(':nombres', $this->nombres, PDO::PARAM_STR);
        $statement->bindParam(':apellidos', $this->apellidos, PDO::PARAM_STR);
        $statement->bindParam(':direccion', $this->direccion, PDO::PARAM_STR);
        $statement->bindParam(':lng', $lng, PDO::PARAM_STR);
        $statement->bindParam(':lat', $lat, PDO::PARAM_STR);

        return $statement; 
    }
}
