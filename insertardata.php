
<?php
#Salir si alguno de los datos no está presente

if (!empty($_POST["GuardarDatos"])) {

    if (!empty($_POST["id"])  AND !isset($_POST["titulo"]) AND !isset($_POST["descripcion"]) AND !isset($_POST["estatus"])) {
        ECHO "esta bien";
        //exit();
    }/*else{
        //exit();
        //echo "<script>alert('Usuario ya existe');</script>";
        //header("Location: index.php");
        echo "Recuerda digital todos los campos";
    }*¨/

    /*if (!isset($_POST["id"]) || !isset($_POST["titulo"]) || !isset($_POST["descripcion"]) || !isset($_POST["estatus"])) {
        exit();
    }*/
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "./app/config/connection.php";

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$estatus = $_POST["estatus"];


$sentencia = $conec->prepare("INSERT INTO tareas(id, titulo, descripcion, estatus) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$id, $titulo, $descripcion, $estatus]);

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar


if ($resultado === true) {
    # Redireccionar a la lista
    header("Location: index.php");
} else {
    echo "Fallo al insertar información, algo salió mal, verificar si la tabla existe";
}
