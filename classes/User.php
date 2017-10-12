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

  public function __construct($name, $lastName, $email, $password, $phone, $ocupation, $description, $adress, $avatar) {
    $this->email=$email;
    $this->password=$password;
  }

  public function setName($name) {
    $this->name=$name;
  }
  public function setLastName($lastName) {
    $this->lastName=$lastName;
  }
  public function setEmail($email) {
    $this->email=$email;
  }
  public function setPassword($password) {
    $this->password=$password;
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

  public function getName() {
    return $this->name;
  }
  public function getLastName() {
    return $this->lastName;
  }
  public function getEmail() {
    return $this->email;
  }
  public function getPassword() {
    return $this->password;
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
}
