<?php
/*
*/
?>
<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["id"]) || !isset($_POST["titulo"]) || !isset($_POST["descripcion"]) || !isset($_POST["estatus"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once("./app/config/connection.php");

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$estatus = $_POST["estatus"];



/*
Al incluir el archivo "conec.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */
$sentencia = $conec->prepare("INSERT INTO tareas(id, titulo, descripcion, estatus) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$id, $titulo, $descripcion, $estatus]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

/*
if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: index.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
*/