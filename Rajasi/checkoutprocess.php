<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    $email = $_SESSION["u"]["email"];

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='".$email."'");
    $cartn = $cartrs->num_rows;

    $order = uniqid();
    
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $urs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$email."'");
    $ud = $urs->fetch_assoc();

    $lors = Database::search("SELECT * FROM `location` WHERE `id`='".$ud["location_id"]."'");
    $lod = $lors->fetch_assoc();

    for($x=0; $x<$cartn; $x++){
        $cartd = $cartrs->fetch_assoc();
        $proid = $cartd["product_id"];
        $proqty = $cartd["qty"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='".$proid."'");
       
            $prod = $productrs->fetch_assoc();

            if($lod["district_id"]=="1"){
                $delivery = $prod["delivery_fee_colombo"];
            }else{
                $delivery = $prod["delivery_fee_other"];
            }

            $t = $prod["price"]*$proqty + $delivery;

            Database::iud("INSERT INTO `invoice` (`order_id`,`product_id`,`user_email`,`date`,`total`,`qty`) 
            VALUES ('".$order."','".$proid."','".$email."','".$date."','".$t."','".$proqty."')");

            Database::iud("INSERT INTO `purchase` (`order_id`,`product_id`,`user_email`,`date`,`total`,`qty`) 
            VALUES ('".$order."','".$proid."','".$email."','".$date."','".$t."','".$proqty."')");

            $prodqty = $prod["qty"];
            $newqty = $prodqty - $proqty;

            Database::iud("UPDATE `product` SET `qty`='".$newqty."' WHERE `id`='".$proid."'");

    }
    Database::iud("DELETE FROM `cart` WHERE `user_email`='".$email."'");

    echo "success";
}

?>
