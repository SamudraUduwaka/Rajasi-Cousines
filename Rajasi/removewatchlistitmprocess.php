<?php

require "connection.php";

$id = $_GET["id"];

$wishrs = Database::search("SELECT * FROM `wishlist` WHERE `id`='".$id."'");
$wishrow = $wishrs->fetch_assoc();

$pid = $wishrow["product_id"];
$mail = $wishrow["user_email"];

Database::iud("INSERT INTO `recents` (`product_id`,`user_email`) VALUES('".$pid."','".$mail."')");
// echo "product addedd to recents";

Database::iud("DELETE FROM `wishlist` WHERE `id`='".$id."'");

echo "success";

?>