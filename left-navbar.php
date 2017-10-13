<!-- Left navbar -->
<div class="navbar">
  <div class="proyectos">
    <img src="images/oval.png" alt="">
    <p><strong>Proyectos</strong></p>
  </div>
  <div class="tresBotones">
    <div class="button plus">
      <img src="images/plus.png" alt="">
    </div>
    <div class="button info">
      <img src="images/information.png" alt="">
    </div>
    <a href="user-edit.php">
      <div class="button user">
        <?php echo '<img src=' . check_user_avatar(get_current_user_email(), $db, $site_url) . ">" ?>
      </div>
    </a>
  </div>
</div>
