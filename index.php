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

<body>
  <h1 class="text-center p-3">HANA SAP</h1>
  <h2> Aprender cada día más</h2>

  <?php
  //phpinfo();
  include_once("./app/config/connection.php");
  //CConnection::ConexionDB();
  ?>

  <div class="container-fluid row">


    <!-- id, un título, una descripción, y un estado
(pendiente, completada). shif ctrl f  -->


    <form action="insertar.php" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input required name="nombre" type="text" id="nombre" placeholder="Nombre de mascota" class="form-control">
      </div>
      <div class="form-group">
        <label for="edad">Edad</label>
        <input required name="edad" type="number" id="edad" placeholder="Edad de mascota" class="form-control">
      </div>
      <button type="submit" class="btn btn-success">Guardar</button>
      <a href="./listar.php" class="btn btn-warning">Ver todas</a>
    </form>


    <form class="col-4 p-4" action="insertardata.php" method="POST">

      <legend> example</legend>

      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="" class="form-control" id="exampleInputPassword1">
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>

      <div class="mb-3">
        <label for="estatus" class="form-label">Estado</label>
        <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>



      <div class="mb-3 form-check">

      </div>
      <button type="submit" class="btn btn-primary">Guardar <i class="fa-solid fa-floppy-disk"></i></button>

    </form>


    <div class="col-8 p-4">


      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
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
              <td><?php echo $tareas_db->id ?></td>
              <td><?php echo $tareas_db->titulo ?></td>
              <td><?php echo $tareas_db->descripcion ?></td>
              <td><?php echo $tareas_db->estatus ?></td>
              <td><a class="btn btn-primary" href="<?php echo "editar.php?id=" . $tareas_db->id ?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
              <td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $tareas_db->id ?>"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>

  </div>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>

</html>