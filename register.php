<?php
  session_start();
  require_once('helpers/form-functions.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Crear una cuenta en Boole</title>

    <!-- Default metas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Metas -->
    <meta name="description" content="Cree una cuenta en Boole de manera sencilla y rápida.">

    <!-- Style files -->
    <link rel="stylesheet" href="styles/register.min.css">
    <link rel="stylesheet" href="styles/landing-style.min.css">

  </head>
  <body>
    <!-- header with logo log in and register buttons -->
    <header>
      <a href="index.php">
        <div class="logo"></div>
      </a>
      <div class="header-right">
        <div class="faq"><a href="faq.html">Faq</a></div>
        <div class="logIn"><a href="login.php">Ingresar</a></div>
        <div class="register"><a href="register.php">Registrarse</a></div>
      </div>
    </header>
    <!-- END OF: header with logo log in and register buttons -->

    <div class="container">
      <!-- START register form -->
      <div class="form-container">
        <h1>Crear una cuenta en <strong>Boole</strong></h1>
        <p>Es fácil y rápido. ¡Ingrese sus datos y comienze a trabajar!</p>
        <form class="" action="controllers/register-controller.php" method="post">
          <div class="input-container">
            <!-- Name input -->
            <label for="username">Nombre completo</label>
            <input class="form-input" type="text" name="username" value="<?php echo display_correct_value('name'); ?>" id="username" placeholder="Ingrese su nombre completo">
            <?php echo error_display('name'); ?>
            <!-- Email input -->
            <label for="email">Email</label>
            <input class="form-input" type="text" name="email" value="<?php echo display_correct_value('email')?>" id="email" placeholder="Ingrese su email">
            <?php echo error_display('email'); ?>
            <!-- Password input -->
            <label for="password">Contraseña</label>
            <input class="form-input" type="password" name="password" value="" id="password" placeholder="Ingrese una contraseña">
            <?php echo error_display('password'); ?>
          </div>
          <!-- Submit -->
          <input class="submit-btn" type="submit" name="submit" value="Crear cuenta">
        </form>
      </div>
      <!-- END register form -->
    </div>
  </body>
</html>

<!-- Borrar los errores una vez utilizados -->
<?php unset($_SESSION['errors']); ?>
