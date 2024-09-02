
<?php

#Salir si alguno de los datos no está presente

if (!empty($_POST["EditarDatos"])) {

    if (
        !isset($_POST["id"]) ||
        !isset($_POST["titulo"]) ||
        !isset($_POST["descripcion"]) ||
        !isset($_POST["estatus"])
    ) {
        echo "hola";
        //exit();
    }
}

include_once "../config/connection.php";

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$estatus = $_POST["estatus"];

$sentencia = $conec->prepare("UPDATE tareas SET titulo = ?, descripcion = ?, estatus = ? WHERE id = ?;");
$resultado = $sentencia->execute([$titulo, $descripcion, $estatus, $id]); 

$url = "http://$host$ruta/$html";



if ($resultado === true) {
    header("Location: ./../../index.php");
    //header("Location: index.php");
} else {
    echo "Fallo al insertar información, algo salió mal, verificar si la tabla existe";
}
