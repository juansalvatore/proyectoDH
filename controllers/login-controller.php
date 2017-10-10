<?php
session_start();

//Initiate DATABASE
require_once('../inc/conn.php');

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
} else {
  $password_flag = true;
}

// compare users with database and log in if comparison is right
if($email_flag && $password_flag) {
  // compare mail with db mails

  // QUERY: SELECT email, password FROM user WHERE email LIKE :email
  $stmt = $db->prepare("SELECT email, password FROM user WHERE email LIKE :email");
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->execute();

  $emailAndPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);


  // check if db email and password is equal to entered email and password
  if ($email == $emailAndPassword[0]['email'] && password_verify($password, $emailAndPassword[0]['password'])) {

    //save email in session
    $_SESSION['email'] = $email;

    //recordar contraseña
    if($_POST['remember'] == true) {

      // CREATE SESSION
      $_SESSION['email'] = $email;

      // Expira en 1 hora
      $expira = time() + 3600;

      //Create email cookie
      $cookieEmailName = "email";
      $cookieEmailValue = $email;
      setcookie($cookieEmailName, $cookieEmailValue, $expira, '/');

      //Create password cookies
      $cookiePassName = "password";
      //TODO: hash password to compare
      $cookiePassValue = $password;
      setcookie($cookiePassName, $cookiePassValue, $expira, '/');
      setcookie();
      header("Location: ../main.php");

    }
    header("Location: ../main.php");
  } else {
    $_SESSION['errors']['password']  = 'Contraseña incorrecta';
    header("Location: ../login.php");
  }

} else {
  // return to login if login failed, TODO: display errors
  header("Location: ../login.php");
}
