<?php
  require_once('helpers/session-check.php');
  require_once('helpers/user-functions.php');
  require_once('inc/conn.php');
  require_once('inc/config.php');
  require_once('classes/User.php');

  $user = new User()
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Boole</title>
    <link rel="stylesheet" href="styles/register.min.css">
    <link rel="stylesheet" href="styles/main-style.min.css">
    <link rel="stylesheet" href="styles/user-edit-style.min.css">
  </head>
  <body>
    <?php require_once 'left-navbar.php' ?>
    <div class="container">
      <form class="" action='controllers/user-edit-controller.php' method="post" enctype="multipart/form-data">
        <div class="input-container">
          <!-- User avatar -->
          <div class="user-avatar">
            <?php echo '<img src=' . $user->check_user_avatar($db, $site_url) . ">" ?>
          </div>
          <!-- LOAD AVATAR -->
          <label for="load-avatar" class="load-avatar">Seleccionar imagen</label>
          <input type="file" name="load-avatar" value="" class="input-load" id="load-avatar">
          <!-- NAME -->
          <label for="name">Nombre</label>
          <input id="name" class="form-input" type="text" name="name" value="" placeholder="Ingrese su nombre">
          <!-- SURNAME -->
          <label for="lastName">Apellido</label>
          <input id="lastName" class="form-input" type="text" name="lastName" value="" placeholder="Ingrese su apellido">
          <!-- TEL -->
          <label for="phone">Teléfono</label>
          <input id="phone" class="form-input" type="phone" name="phone" value="" placeholder="Ingrese su teléfono">
          <!-- OCCUPATION -->
          <label for="ocupation">Ocupación</label>
          <input id="ocupation" class="form-input" type="text" name="ocupation" value="" placeholder="Ingrese su ocupación">
          <!-- DESCRIPTION -->
          <label for="description">Descripción</label>
          <textarea id="description" class="form-input" name="description"></textarea>
          <!-- DIRECTION -->
          <label for="direction">Dirección</label>
          <input id="direction" class="form-input" type="text" name="direction" value="" placeholder="Ingrese su dirección">
          <!-- SELECTORS -->
          <div class="selectors">
            <!-- COUNTRY -->
            <label for="country">País</label>
            <select class="" name="country">
              <!-- TODO: Create php loop going through country's db -->
              <option value="argentina">Argentina</option>
            </select>
            <!-- STATE Create php loop going through state options according to country-->
            <label for="state">Estado</label>
            <select class="" name="state">
              <!-- TODO: -->
              <option value="buenos-aires">Buenos Aires</option>
            </select>
            <!-- CITY -->
            <label for="city">Ciudad</label>
            <select class="" name="city">
              <!-- TODO: Create php loop going through city options according to country -->
              <option value="caba">CABA</option>
            </select>
          </div>
        </div>
        <!-- Submit -->
        <input class="submit-btn" type="submit" name="submit" value="Actualizar">
      </form>
    </div>
  </body>
</html>
