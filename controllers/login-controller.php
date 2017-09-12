<?php

//Step 1 - Validate form
//TODO - add deeper validations.
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
