<?php

require "connection.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    if ($id == "1") {
?>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
    <?php
    } else if ($id == "2") {
    ?>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
    <?php
    } else if ($id == "3") {
    ?>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
    <?php
    } else if ($id == "4") {
    ?>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
    <?php
    } else if ($id == "5") {
    ?>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
        <span class="text-warning"><i class="bi bi-star-fill"></i></span>
<?php
    }
}




?>