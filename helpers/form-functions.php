<?php

function error_display($sub_index) {
  if (!empty($_SESSION['errors'][$sub_index])) {
    return "<p class='input_error'>" . $_SESSION['errors'][$sub_index] . "</p>";
  }
}

function display_correct_value($sub_index) {
  if (!empty($_SESSION['inputs'][$sub_index])) {
    return $_SESSION['inputs'][$sub_index];
  }
}
