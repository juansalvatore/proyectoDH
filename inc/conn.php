<?php

// CONECT TO MYSQL DATABASE

$db_name = 'bool_db';
$port = '8889';

$dsn = "mysql:host=localhost;dbname=$db_name;charset=utf8mb4;port=$port;";
$db_user = 'root';
$db_pass = 'root';

try {
  $db = new PDO($dsn, $db_user, $db_pass);
} catch (Exception $e) {
  echo "<h3>Ocurrió un error al conectar con la base de datos. Resivar el archivo inc/conn.php</h3>";
}
