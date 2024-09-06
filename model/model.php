<?php

require_once("../config/conexion.php");

abstract class model{
    protected $pdo;
    private $modelArray;
    public function __construct(){
        $this->pdo = Conexion::getInstance();
        $this->modelArray = [];
    }

    protected abstract function getSelectQuery($coordenadas): string;

    public function all($coordenadas): array{
        return $this->pdo->query($this->getSelectQuery($coordenadas))->fetchAll(PDO::FETCH_ASSOC);
    }
    protected abstract function getInsertQuery(): string;
    protected abstract function createPDO(PDOStatement $pDOStatement):PDOStatement;

    public function guardar(): bool{
        return $this->createPDO($this->pdo->prepare($this->getInsertQuery()))->execute();
    }
}
