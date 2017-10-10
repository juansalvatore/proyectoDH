<?php

session_start();

//If user email is not in session go to login page
if (!isset($_SESSION['email'])) {
  header('Location:login.php');
}
