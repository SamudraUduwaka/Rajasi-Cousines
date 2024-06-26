<?php

require "connection.php";

if(isset($_POST["id"])){
    $id = $_POST["id"];

    if($id == "1"){

        $ratingrs = Database::search("SELECT * FROM `ratings` WHERE `id`='1'");
        $ratingd = $ratingrs->fetch_assoc();

        $num = $ratingd["number"];
        $number = $num + "1";
        Database::iud("UPDATE `ratings` SET `number`='".$number."' WHERE `id`='1'");

    }else if($id == "2"){

        $ratingrs = Database::search("SELECT * FROM `ratings` WHERE `id`='2'");
        $ratingd = $ratingrs->fetch_assoc();

        $num = $ratingd["number"];
        $number = $num + "1";
        Database::iud("UPDATE `ratings` SET `number`='".$number."' WHERE `id`='2'");

    }else if($id == "3"){

        $ratingrs = Database::search("SELECT * FROM `ratings` WHERE `id`='3'");
        $ratingd = $ratingrs->fetch_assoc();

        $num = $ratingd["number"];
        $number = $num + "1";
        Database::iud("UPDATE `ratings` SET `number`='".$number."' WHERE `id`='3'");

    }else if($id == "4"){

        $ratingrs = Database::search("SELECT * FROM `ratings` WHERE `id`='4'");
        $ratingd = $ratingrs->fetch_assoc();

        $num = $ratingd["number"];
        $number = $num + "1";
        Database::iud("UPDATE `ratings` SET `number`='".$number."' WHERE `id`='4'");

    }else if($id == "5"){

        $ratingrs = Database::search("SELECT * FROM `ratings` WHERE `id`='5'");
        $ratingd = $ratingrs->fetch_assoc();

        $num = $ratingd["number"];
        $number = $num + "1";
        Database::iud("UPDATE `ratings` SET `number`='".$number."' WHERE `id`='5'");

    }

        
        

        echo "success";

}


?>