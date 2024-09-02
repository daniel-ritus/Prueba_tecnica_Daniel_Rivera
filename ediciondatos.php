<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de datos</title>

    <link rel="stylesheet" href="./css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/844937a553.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center">HANA SAP</h1>
    <h2> Aprender cada día más</h2>
    
    <?php
    if (!isset($_GET["id"])) {
    exit();
    }

    $id = $_GET["id"];
    include_once "./app/config/connection.php";
    $sentencia = $conec->prepare("SELECT id, titulo, descripcion, estatus FROM tareas WHERE id = ?;");
    $sentencia->execute([$id]);
    $tareas_db = $sentencia->fetchObject();
    if (!$tareas_db) {
    #No existe
    echo "¡No existe alguna solicitud con ese ID!";
    exit();
    }

    ?>

    <div class="position-relative">
        <div class="container-fluid row justify-content.center">
            <!-- id, un título, una descripción, y un estado
(pendiente, completada). shif ctrl f  -->
            <form class="col-4 p-4 position-absolute" style="left:35%" action="app/config/datoseditados.php" method="POST">
                <legend class="text-center"> Actualización datos</legend>
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input required value="<?php echo $tareas_db->id; ?>" name="id" type="text" id="id" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input required value="<?php echo $tareas_db->titulo; ?>" name="titulo" type="text" id="titulo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input required value="<?php echo $tareas_db->descripcion; ?>" name="descripcion" type="text" id="descripcion" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="estatus" class="form-label">Estado</label>
                    <input required value="<?php echo $tareas_db->estatus; ?>" name="estatus" type="text" id="estatus" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 form-check">

                </div>
                <button type="submit" name="EditarDatos" value="OK" class="btn btn-primary">Actualizar   <i class="fa-solid fa-floppy-disk"></i></button>
                <a href="./index.php" class="btn btn-primary">Volver   <i class="fa-solid fa-backward-step"></i></a>
            </form>
        </div>
    </div>




</body>

</html>