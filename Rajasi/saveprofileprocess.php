<?php

session_start();

require "connection.php";

$f = $_POST["f"];
$l = $_POST["l"];
$m = $_POST["m"];
$g = $_POST["g"];

if(isset($_SESSION["u"])){
    $email = $_SESSION["u"]["email"];

    if(empty($f)){
        echo "Enter your first name";
    }else if(empty($l)){
        echo "Enter your last name";
    }else if(empty($m)){
        echo "Mobile number is empty";
    }else{

    Database::iud("UPDATE `user` SET `fname`='".$f."' , `lname`='".$l."' , `mobile`='".$m."' ,
     `gender_id`='".$g."' WHERE `email`='".$email."'");

    $user = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $userd = $user->fetch_assoc();

    $_SESSION["u"] = $userd;

    echo "success";
    }
}

?>
