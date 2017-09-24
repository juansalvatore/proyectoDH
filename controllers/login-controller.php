<?php
session_start();

//Unset session errors
unset($_SESSION['errors']);

$pathDB = '../db/users.json';
// $gestor = fopen($pathDB, 'r');
// $size = filesize($pathDB);
// $usuariosDB = fread($gestor, $size);
$usuariosDB = json_decode(file_get_contents($pathDB),true);

//Step 1 - Validate form
//TODO - add deeper validations.


//validate user email
$email = trim($_POST['email']);
if (empty($email)) {
  //echo "<p>Por favor, ingresar un email</p>";
  $_SESSION['errors']['email'] = 'Por favor, ingrese un email.';
  $_SESSION['inputs']['email'] = "";
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //echo "<p>El email ingresado no es valido</p>";
  $_SESSION['errors']['email'] = 'El email ingresado no es valido';
  $_SESSION['inputs']['email'] = "";
} else {
  $email_flag = true;
  $_SESSION['inputs']['email'] = $email;
}

//validate password
$password = trim($_POST['password']);
if (empty($password)) {
  //echo "Por favor, ingrese una contraseña";
  $_SESSION['errors']['password'] = 'Por favor, ingrese una contraseña';
} elseif(strlen($password) < 8) {
  //echo "<p>Su contraseña es demasiado corta</p>";
  $_SESSION['errors']['password'] = 'La contraseña es demasiado corta';
} else {
  $password_flag = true;
}

// compare users with database and log in if comparison is right
if($email_flag && $password_flag) {
  // go through all the decoded json
  for($i = 0; $i < count($usuariosDB); $i++) {
    // check if db email and password is equal to entered email and password
    if ($usuariosDB[$i]['email'] == $email && password_verify($password, $usuariosDB[$i]['password'])) {
      //recordar contraseña
      if($_POST['remember'] == true) {
        //TODO: Create cookie that stores hashed password
        $cookieName = "password";
        $cookieValue = $password;
        // Expira en 1 hora
        $exipira = time() + 3600;
        setcookie($cookieName, $cookieValue, $expira);
        header("Location: ../index.php");
      }
    } else {
      $_SESSION['errors']['password']  = 'Contraseña incorrecta';
      header("Location: ../login.php");
    }
  }
} else {
  // return to login if login failed, TODO: display errors
  header("Location: ../login.php");
}
