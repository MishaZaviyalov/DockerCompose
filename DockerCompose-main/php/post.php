<?php
require 'DataBaseClass.php';
$email = $_POST['email'];
$password = $_POST['password'];

if(isset($email) and isset($password)){
    $database = new DataBaseClass();
    $database->insertInformation($email, $password);
    require '../all-good.html';
}