<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    Database::iud("DELETE FROM `purchase`");

    echo "1";
}


?>