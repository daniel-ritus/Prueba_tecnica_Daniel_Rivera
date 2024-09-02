<?php
if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "../config/connection.php";
$sentencia = $conec->prepare("DELETE FROM tareas WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: ./../../index.php");
    //header("Location: index.php");
} else {
    echo "Algo salió mal";
}

