<?php



$host = "localhost";
        //public $dbname = 'db_postgres';
        $port = "5432";
        $dbname = "tasks_db";
 //'ConexionDB' should not be called staticall
        $username = "postgres";
        $password = "123456789";

        try {
            $conec = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
            //echo "Esta conectado a la Base de datos";
            $conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exp) {
            //echo ("sin conexión a la base de datos," $exp);
            echo ("sin conexión a la base de datos, $exp");
        }


/*class CConnection
{
    public static function ConexionDB()
    {
        $host = "localhost";
        //public $dbname = 'db_postgres';
        $port = "5432";
        $dbname = "tasks_db";
 //'ConexionDB' should not be called staticall
        $username = "postgres";
        $password = "123456789";
        //$connect;

        //    $pdo = new PDO($dsn, $username, $password);
        //$dsn = 'pgsql:host=localhost;port=5432;dbname=nombre_de_tu_base_de_datos';

        try {
            $conec = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
            //echo "Esta conectado a la Base de datos";
            $conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exp) {
            //echo ("sin conexión a la base de datos," $exp);
            echo ("sin conexión a la base de datos, $exp");
        }
        //return $conn;

    }

}*/

//CConnection::ConexionDB();

//$sentencia = $conec->query("select id, titulo, descripcion, estatus from tareas");