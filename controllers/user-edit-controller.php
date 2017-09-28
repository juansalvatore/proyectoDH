<?php

session_start();

// TODO: add each input to database related to user

// NAME
$name = trim($_POST['name']);
// TODO: add name to db

// SURNAME
$surname = trim($_POST['surname']);
// TODO: add surname to db

// TEL
$tel = trim($_POST['tel']);
// TODO: add tel to db

// OCCUPATION
$occupation = trim($_POST['occupation']);
// TODO: add occupation to db

// DESCRIPTION
$description = trim($_POST['description']);
// TODO: add description to db

// DIRECTION
$direction = trim($_POST['direction']);
// TODO: add direction to db

// echo of values to be stored in db
echo $name." ".$surname." ".$tel." ".$occupation." ".$description." ".$direction;



// selectors
