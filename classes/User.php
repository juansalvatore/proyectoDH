<?php

class User {
  protected $name;
  protected $lastName;
  protected $email;
  protected $password;
  protected $phone;
  protected $ocupation;
  protected $description;
  protected $adress;
  protected $avatar;

  public function __construct() {
  }


  public function setEmail() {
    $this->email=$email;
  }
  public function setPassword() {
    $this->password=$password;
  }
  public function setName($name) {
    $this->name=$name;
  }
  public function setLastName($lastName) {
    $this->lastName=$lastName;
  }
  public function setPhone($phone) {
    $this->phone=$phone;
  }
  public function setOcupation($ocupation) {
    $this->ocupation=$ocupation;
  }
  public function setDescription($description) {
    $this->description=$description;
  }
  public function setAdress($adress) {
    $this->adress=$adress;
  }
  public function setAvatar($avatar) {
    $this->avatar=$avatar;
  }

  /////////////
  public function getEmail() {
    return $this->email;
  }
  public function getPassword() {
    return $this->password;
  }
  public function getName() {
    return $this->name;
  }
  public function getLastName() {
    return $this->lastName;
  }
  public function getPhone() {
    return $this->phone;
  }
  public function getOcupation() {
    return $this->ocupation;
  }
  public function getDescription() {
    return $this->description;
  }
  public function getAdress() {
    return $this->adress;
  }
  public function getAvatar() {
    return $this->avatar;
  }

  public function updateValueDb($colName, $value, $db) {
    $email = $this->getUserEmail();
    $stmt = $db->prepare("UPDATE user SET {$colName} = \"{$value}\" WHERE email LIKE "."\"".$email."\"");
    $stmt->execute();
  }

  //Get current user email from session
  public function getUserEmail() {
    if (isset($_SESSION['email'])) {
      return $_SESSION['email'];
    }
  }

  public function check_user_avatar($db, $site_url) {

    //Check if user has an uploaded avatar
    $stmt = $db->prepare("SELECT avatar FROM user WHERE email LIKE :email");
    $stmt->bindValue(':email', $this->getUserEmail(), PDO::PARAM_STR);
    $stmt->execute();
    $user_avatar = $stmt->fetch(PDO::FETCH_ASSOC);

    //Assing a default if avatar col is empty
    if (empty($user_avatar["avatar"])) {
      $built_url = $site_url . "images/default-user.png";
    } else {
      $built_url = $user_avatar["avatar"];
    }

    //return avatar url
    return $built_url;

  }
}
