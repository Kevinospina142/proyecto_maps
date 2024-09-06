<?php

require_once("../model/Cliente.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['cedula']) &&
        isset($_POST['nombres']) &&
        isset($_POST['apellidos']) &&
        isset($_POST['direccion']) &&
        isset($_POST['lat']) &&
        isset($_POST['lng'])
    ) {

        $ubiCoordenadas = $_POST['lng'] .", ". $_POST['lat'];

        $newCliente = new clientes(
            $_POST['cedula'],
            $_POST['nombres'],
            $_POST['apellidos'],
            $_POST['direccion'],
            $ubiCoordenadas
        );
        try {
            $newCliente->guardar();
            header("Location:../index.php");
            exit();
        } catch (PDOException $error) {
            echo "se genero un error al guardar el cliente, el error es: " . $error->getMessage();
        }
    } else {
        echo "Todos los campos deben estar llenos. :)";
    }
}