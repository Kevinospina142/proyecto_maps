<?php
session_start();
require_once("../model/cliente.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['lat'])  &&
        isset($_POST['lng'])
    ) {
        $coordenadas = $_POST['lng'].",".$_POST['lat'];
        //var_dump($coordenadas);



        try {
            $clientes = new clientes("", "", "", "", "");
            $resultados = $clientes->all($coordenadas);

            $_SESSION['resultados'] = $resultados;
            header("Location:../views/localizaciones.php");
            exit();
        } catch (PDOException $error) {
            echo "se genero un error al guardar el cliente, el error es: " . $error->getMessage();
        }
    } else {
        echo "Todos los campos deben estar llenos. :)";
    }
}