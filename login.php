<?php
  session_start();
  require_once('helpers/form-functions.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Iniciar sesión en tu cuenta de Boole</title>

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
        <h1>Iniciá sesión en tu cuenta de Boole</h1>
        <form class="" action="controllers/login-controller.php" method="post">
          <div class="input-container">
            <!-- Email input -->
            <label for="email">Email</label>
            <input class="form-input" type="text" name="email" value="<?php echo display_correct_value('email')?>" id="email" placeholder="Ingrese su email">
            <?php echo error_display('email'); ?>
            <!-- Password input -->
            <label for="password">Contraseña</label>
            <input class="form-input" type="password" name="password" value="" id="password" placeholder="Ingrese una contraseña">
            <?php echo error_display('password'); ?>
            <!-- Recordar contraseña -->
            <input class="remember" type="checkbox" name="remember" value="true">
            <label class="remember" for="remember">Recordar contraseña</label>
          </div>
          <!-- Submit -->
          <input class="submit-btn" type="submit" name="submit" value="Ingresar">
        </form>
      </div>
      <!-- END register form -->
    </div>
  </body>
</html>

<!-- Borrar los errores una vez utilizados -->
<?php unset($_SESSION['errors']); ?>
