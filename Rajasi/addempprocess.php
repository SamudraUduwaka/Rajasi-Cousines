<?php

require "connection.php";

$f = $_POST["f"];
$l = $_POST["l"];
$e = $_POST["e"];
$m = $_POST["m"];
$g = $_POST["g"];
$no = $_POST["no"];
$s = $_POST["s"];
$c = $_POST["c"];

if (empty($f)) {
    echo "Give First name";
} else if (empty($l)) {
    echo "Give Last name";
} else if (empty($e)) {
    echo "Give Email";
} else if (strlen($e) > 100) {

    echo "Email must be less than 100 characters";
} else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {

    echo "Invalid email";
} else if (empty($m)) {

    echo "Give mobile";
} else if (strlen($m) != 10) {

    echo "Enter 10 digit mobile number";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $m) == 0) {

    echo "Invalid mobile number";
} else if ($g == "0") {
    echo "Select gender";
} else if (empty($no)) {
    echo "Give address no";
} else if (empty($s)) {
    echo "Give Street";
} else if ($c == "0") {
    echo "Select City";
} else {

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status_id = "1";

    Database::iud("INSERT INTO `employee` (`fname`,`lname`,`email`,`mobile`,`gender_id`,`register_date`,`status_id`) VALUES 
    ('" . $f . "','" . $l . "','" . $e . "','" . $m . "','" . $g . "','" . $date . "','" . $status_id . "')");

    $lastId = Database::$connection->insert_id;

    $loc = Database::search("SELECT * FROM `location` WHERE `city_id`='" . $c . "'");
    $loca = $loc->fetch_assoc();
    $location = $loca["id"];

    Database::iud("INSERT INTO `employee_has_address` (`employee_id`,`no`,`street`,`location_id`) VALUES 
    ('" . $lastId . "','" . $no . "','" . $s . "','" . $location . "')");

    if (isset($_FILES["img"])) {
        $img = $_FILES["img"];

        $file_extension;
        $allowed_Image_Extention = array("image/jpg", "image/png", "image/jpeg", "image/svg");

        $file_extension = $img["type"];

        if (!in_array($file_extension, $allowed_Image_Extention)) {
            echo "Please select a valid image.";
        } else {

            $newImageExtension;

            if ($file_extension = "image/jpg") {
                $newImageExtension = ".jpg";
            } else if ($file_extension = "image/jpeg") {
                $newImageExtension = ".jpeg";
            } else if ($file_extension = "image/png") {
                $newImageExtension = ".png";
            } else if ($file_extension = "image/svg") {
                $newImageExtension = ".svg";
            }

            $fileName = "empimgs//" . uniqid() . $newImageExtension;
            move_uploaded_file($img["tmp_name"], $fileName);

            Database::iud("INSERT INTO `emp_img`(`code`,`employee_id`) VALUES ('" . $fileName . "','" . $lastId . "')");
        }
    }


    echo "success";
}
