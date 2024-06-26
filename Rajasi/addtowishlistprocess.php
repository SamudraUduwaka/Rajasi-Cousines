<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    $uemail = $_SESSION["u"]["email"];
    $id =$_GET["id"];

    $wishlistrs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='".$id."' AND `user_email`='".$uemail."'");
    $n = $wishlistrs->num_rows;

    if($n==1){
        echo "You have recently added this product to the wishlist";
    }else{
        Database::iud("INSERT INTO `wishlist` (`product_id`,`user_email`) VALUES ('".$id."','".$uemail."')");
        echo "successfully added";
    }

    
}

?>