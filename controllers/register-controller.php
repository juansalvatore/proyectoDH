<?php

session_start();

//Unset session errors
unset($_SESSION['errors']);

//Constant variables
define('DB_PATH', '../db/users.json');


//TODO - add deeper validations - unset session form

//validate username
$name = trim($_POST['username']);
if (empty($name)) {
  $_SESSION['errors']['name']  = 'Por favor, ingrese su nombre completo';
  $_SESSION['inputs']['name'] = "";
} else {
  $name_flag = true;
  $_SESSION['inputs']['name'] = $name;
}

//validate user email
$email = trim($_POST['email']);
if (empty($email)) {
  $_SESSION['errors']['email'] = 'Por favor, ingrese un email.';
  $_SESSION['inputs']['email'] = "";
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['errors']['email'] = 'El email ingresado no es valido';
  $_SESSION['inputs']['email'] = "";
} else {
  $email_flag = true;
  $_SESSION['inputs']['email'] = $email;
}

//validate password - The password should not be assinged to session
//due to security reasons
$password = trim($_POST['password']);
if (empty($password)) {
  echo "Por favor, ingrese una contraseña";
  $_SESSION['errors']['password'] = 'Por favor, ingrese una contraseña';
} elseif(strlen($password) < 8) {
  echo "<p>Su contraseña es demasiado corta</p>";
  $_SESSION['errors']['password'] = 'La contraseña es demasiado corta';
} else {
  $password_flag = true;
}


//execute this actions if all the flags are true
if ($name_flag && $email_flag && $password_flag) {
  $user = [
    'username' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
  ];

  //retrieve dabase InfiniteIterator
  if (file_exists(DB_PATH)) {
    $json = file_get_contents(DB_PATH);
    $users = json_decode($json, true);
  } else {
    $usuarios = [];
  }

  //Save user
  $users[] = $user;
  $json = json_encode($users);
  file_put_contents(DB_PATH, $json);
} else {
  header("Location: ../register.php");
}
