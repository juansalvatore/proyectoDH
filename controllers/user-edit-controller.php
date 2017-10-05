<?php

// TODO: The implementation for the user to update his information already works. Now it's missing:
// CHECK IF THE UPDATE WAS DONE WITH A TRY and CATCH IF COULDNT.
// SHOW A SUCCSESS MESSAGE or ERROR MESSAGE
// CORRECT ERROR IN QUERIES FOR MOBILE AND TABLET

session_start();

// SET EMAIL
$email = $_COOKIE['email'];

// CONECT TO MYSQL DATABASE
$dsn = 'mysql:host=localhost;dbname=bool-db;charset=utf8mb4;port=3306;';
$db_user = 'root';
$db_pass = 'root';
$db = new PDO($dsn, $db_user, $db_pass);

// NAME
$name = trim($_POST['name']);
// SURNAME
$lastName = trim($_POST['surname']);
// TEL
$phone = trim($_POST['tel']);
// OCCUPATION
$ocupation = trim($_POST['occupation']);
// DESCRIPTION
$description = trim($_POST['description']);
// DIRECTION
$adress = trim($_POST['direction']);

// UPDATE user SET name = 'Juan', lastName = 'Salvatore', phone = '1', ocupation = 'neo', description = 'Hola', adress = 'Areco' WHERE email LIKE 'juansalvatore@live.com.ar'
// update user in db
$stmt = $db->prepare("UPDATE user SET name = :name, lastName = :lastName, phone = :phone, ocupation = :ocupation, description = :description, adress = :adress WHERE email LIKE :email");
$stmt->bindValue(':email', $email,PDO::PARAM_STR);
$stmt->bindValue(':name', $name,PDO::PARAM_STR);
$stmt->bindValue(':lastName', $lastName,PDO::PARAM_STR);
$stmt->bindValue(':phone', $phone,PDO::PARAM_STR);
$stmt->bindValue(':ocupation', $ocupation,PDO::PARAM_STR);
$stmt->bindValue(':description', $description,PDO::PARAM_STR);
$stmt->bindValue(':adress', $adress,PDO::PARAM_STR);
$stmt->execute();

// BRING user by EMAIL FROM DB
$stmt = $db->prepare("SELECT * FROM user WHERE email LIKE :email");
$stmt->bindValue(':email', $email,PDO::PARAM_STR);
$stmt->execute();
$userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($userRow);

header("Location: ../user-edit.php");
