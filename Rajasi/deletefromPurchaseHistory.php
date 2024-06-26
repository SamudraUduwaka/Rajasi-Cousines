<?php

require "connection.php";

$id = $_POST["id"];

if(!empty($id)){
    Database::iud("DELETE FROM `purchase` WHERE `id`='".$id."'");

    echo "1";
}

?>