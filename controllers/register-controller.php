<?php
//Constant variables
define('DB_PATH', '../db/users.json');

//Step 1 - Validate form
//TODO - add deeper validations.

//validate username
$name = trim($_POST['username']);
if (empty($name)) {
  echo "<p>Por favor, ingrese su nombre completo</p>";
} else {
  $name_flag = true;
}

//validate user email
$email = trim($_POST['email']);
if (empty($email)) {
  echo "<p>Por favor, ingresar un email</p>";
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<p>El email ingresado no es valido</p>";
} else {
  $email_flag = true;
}

//validate password
$password = trim($_POST['password']);
if (empty($password)) {
  echo "Por favor, ingrese una contraseña";
} elseif(strlen($password) < 8) {
  echo "<p>Su contraseña es demasiado corta</p>";
} else {
  $password_flag = true;
}

var_dump($name_flag && $email_flag && $password_flag);

//Step 2 - Create an username

//execute this actions if all the flags are true
if ($name_flag && $email_flag && $password_flag) {
  $user = [
    'username' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
  ];

  //Step 3 - retrieve dabase InfiniteIterator
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
}
