<?php

function check_user_avatar($user_email, $db, $site_url) {

  //Check if user has an uploaded avatar
  $stmt = $db->prepare("SELECT avatar FROM user WHERE email LIKE :email");
  $stmt->bindValue(':email', $user_email, PDO::PARAM_STR);
  $stmt->execute();
  $user_avatar = $stmt->fetch(PDO::FETCH_ASSOC);

  //Assing a default if avatar col is empty
  if (is_null($user_avatar["avatar"])) {
    $built_url = $site_url . "images/default-user.png";
  } else {
    $built_url = $user_avatar["avatar"];
  }

  //return avatar url
  return $built_url;

}

//Ger current user email from session
function get_current_user_email() {
  return $_SESSION['email'];
}

//Save img in server
function save_image_server($input_name, $image_name, $path) {
  //Create folder if it doesnt exist
  if ( ! is_dir($path)) {
    mkdir($path);
  }

  if ($_FILES[$input_name]['error'] == UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);
		move_uploaded_file(
			$_FILES[$input_name]['tmp_name'],
			$path.$image_name.'.'.$ext
		);
  }
  return $image_name.'.'.$ext;
}

//Save image url in database
function save_image_db($site_url, $image_path, $db) {
  $stmt = $db->prepare("UPDATE user SET avatar = " . "'" . $site_url . $image_path . "'" . " WHERE email LIKE " . "'" . get_current_user_email() . "'");
  $stmt->bindValue(':email', get_current_user_email(), PDO::PARAM_STR);
  var_dump($stmt);
  $stmt->execute();
  $user_avatar = $stmt->fetch(PDO::FETCH_ASSOC);
}
