<?php

session_start();

require "connection.php";

$n = $_POST["n"];
$s = $_POST["s"];
$c = $_POST["c"];

if(isset($_SESSION["u"])){
    $email = $_SESSION["u"]["email"];

    if(empty($n)){
        echo "Address no is required to update";
    }else if(empty($s)){
        echo "Enter the street";
    }else{

    $lrs = Database::search("SELECT * FROM `location` WHERE `city_id`='".$c."'");
    $ld = $lrs->fetch_assoc();
    $l = $ld["id"];

    Database::iud("UPDATE `user_has_address` SET `no`='".$n."' , `street`='".$s."' , `location_id`='".$l."'
     WHERE `user_email`='".$email."'");

    echo "success";

           
    }

}


?>