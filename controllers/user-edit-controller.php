<?php
include ('../classes/User.php');

// TODO agregar mail y contraseña
$user = new User();
// TODO: The implementation for the user to update his information already works. Now it's missing:
// CHECK IF THE UPDATE WAS DONE WITH A TRY and CATCH IF COULDNT.
// SHOW A SUCCSESS MESSAGE or ERROR MESSAGE
// CORRECT ERROR IN QUERIES FOR MOBILE AND TABLET

session_start();

//Initiate DATABASE
require_once('../inc/conn.php');
require_once('../inc/config.php');
require_once('../helpers/user-functions.php');

// SET EMAIL
$email = $_SESSION['email'];

//USER avatar
if ($_FILES[$input_name]['error'] == UPLOAD_ERR_OK) {
  $main_image_new_id = uniqid();
  $server_image_name = save_image_server('load-avatar', $main_image_new_id, "../images/profile_images/" . get_current_user_email() . "/");
  save_image_db($site_url, "images/profile_images/" . get_current_user_email() . "/" . $server_image_name, $db);
}

// NAME
$name = trim($_POST['name']);
// SURNAME
$lastName = trim($_POST['lastName']);
// TEL
$phone = trim($_POST['tel']);
// OCCUPATION
$ocupation = trim($_POST['occupation']);
// DESCRIPTION
$description = trim($_POST['description']);
// DIRECTION
$adress = trim($_POST['direction']);

// Assign values to User's attributes
$user->setName($email);
$user->setLastName($lastName);
$user->setPhone($phone);
$user->setOcupation($ocupation);
$user->setDescription($description);
$user->setAdress($adress);


// UPDATE user SET name = 'Juan', lastName = 'Salvatore', phone = '1', ocupation = 'neo', description = 'Hola', adress = 'Areco' WHERE email LIKE 'juansalvatore@live.com.ar'
// update user in db
// $stmt = $db->prepare("UPDATE user SET name = :name, lastName = :lastName, phone = :phone, ocupation = :ocupation, description = :description, adress = :adress WHERE email LIKE :email");
// $stmt->bindValue(':email', $email,PDO::PARAM_STR);
// // User->updateValueDb($colName, $value, $db);
// $stmt->bindValue(':name', $name,PDO::PARAM_STR);
// $stmt->bindValue(':lastName', $lastName,PDO::PARAM_STR);
// $stmt->bindValue(':phone', $phone,PDO::PARAM_STR);
// $stmt->bindValue(':ocupation', $ocupation,PDO::PARAM_STR);
// $stmt->bindValue(':description', $description,PDO::PARAM_STR);
// $stmt->bindValue(':adress', $adress,PDO::PARAM_STR);
// $stmt->execute();

$user->updateValueDb('lastName', $user->getLastName($lastName), $db);

// BRING user by EMAIL FROM DB
$stmt = $db->prepare("SELECT * FROM user WHERE email LIKE :email");
$stmt->bindValue(':email', $email,PDO::PARAM_STR);
$stmt->execute();
$userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($userRow);

//header("Location: ../user-edit.php");
