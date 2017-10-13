<?php

// CONECT TO MYSQL DATABASE

//JUAN MAC
// $db_name = 'bool-db';
// $port = '3306';
// $db_user = 'root';
// $db_pass = 'root';
//
// $dsn = "mysql:host=localhost;dbname=$db_name;charset=utf8mb4;port=$port;";
//
// try {
//   $db = new PDO($dsn, $db_user, $db_pass);
// } catch (Exception $e) {
//   echo "<h3>Ocurrió un error al conectar con la base de datos. Resivar el archivo inc/conn.php</h3>";
// }

//GASTON LINUX
$db_name = 'bool_db';
$port = '3306';
$db_user = 'root';
$db_pass = '38150144g';

$dsn = "mysql:host=localhost;dbname=$db_name;charset=utf8mb4;port=$port;";

try {
  $db = new PDO($dsn, $db_user, $db_pass);
} catch (Exception $e) {
  echo "<h3>Ocurrió un error al conectar con la base de datos. Resivar el archivo inc/conn.php</h3>";
}
