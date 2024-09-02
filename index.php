<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/844937a553.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light text-dark">
  <h1 class="text-center p-3" >PRUEBA PRÁCTICA SOLATI S.A.S - ANALISTA DE DESARROLLO 2</h1>
  <h5> CRUD Create (Crear), Read (Leer), Update (Actualizar) y Delete (Borrar), fue elaborado en php, PostgreSQL y Bootstrap (Framework)</h5>

  <?php
  //phpinfo();
  include_once("./app/config/connection.php");
  //CConnection::ConexionDB();
  ?>

  <div class="container-fluid row">


    <!-- id, un título, una descripción, y un estado
(pendiente, completada). shif ctrl f  -->
     <form class="col-4 p-4 bg-light text-dark border border-secondary"  action="insertardata.php" method="POST">

      <legend> Ingrese información sobre el caso</legend>
      <br>
      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input required name="id" type="text"  id="id" class="form-control" placeholder="Ingresa el Id" ">
      </div>
      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input required name="titulo" type="text" id="titulo" class="form-control"  placeholder="Ingresa el Titulo">
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input required name="descripcion" type="text"  id="descripcion" class="form-control"  placeholder="Ingresa la Descripcion">

      </div>

      <div class="mb-3">
        <label for="estatus" class="form-label">Estado</label>
        <input required name="estatus" type="text" id="estatus" class="form-control"  placeholder="Ingresa el Estado">
        <label for="estatus" class="form-label">Solamente (pendiente o comnpletada)</label>
      </div>

      <div class="mb-3 form-check">

      </div>
      <button type="submit" name= "GuardarDatos" value= "OK" class="btn btn-primary"  >Guardar <i class="fa-solid fa-floppy-disk"></i></button>

    </form>


    <div class="col-8 p-4">


      <table class="table border border-secondary">
        <thead>
          <tr>
           
            <th scope="col" class="border border-secondary">Id</th>
            <th scope="col" class="border border-secondary">Titulo</th>
            <th scope="col" class="border border-secondary">Descripcion</th>
            <th scope="col" class="border border-secondary">Estado</th>
            <th scope="col" class="border border-secondary"></th>
            <th scope="col" class="border border-secondary"></th>
          </tr>
        </thead>
        <tbody>

          <?php
          //phpinfo();
          include_once("./app/config/connection.php");

          //CConnection::ConexionDB();
          $sentencia = $conec->query("select id, titulo, descripcion, estatus from tareas");
          $tasks_db = $sentencia->fetchAll(PDO::FETCH_OBJ);

          //$sentencia = $conectar->query("SELECT id, titulo, descripcion, estatus FROM tareas");
          ?>
          <?php foreach ($tasks_db as $tareas_db) { ?>
            <tr>
              <td class="border border-secondary"><?php echo $tareas_db->id ?></td>
              <td class="border border-secondary"><?php echo $tareas_db->titulo ?></td>
              <td class="border border-secondary"><?php echo $tareas_db->descripcion ?></td>
              <td class="border border-secondary"><?php echo $tareas_db->estatus ?></td>
              <td class="border border-secondary"><a class="btn btn-primary" href="<?php echo "ediciondatos.php?id=" . $tareas_db->id ?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
              <td class="border border-secondary"><a class="btn btn-danger" href="<?php echo "app/config/borrar.php?id=" . $tareas_db->id ?>"><i class="fa-solid fa-trash"></i></a></td>
            </tr>

          <?php } ?>

        </tbody>
      </table>
    </div>

  </div>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>

</html>