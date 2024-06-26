<?php

require "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["email"];
$mobile = $_POST["m"];
$no = $_POST["no"];
$street = $_POST["street"];
$city = $_POST["city"];
$gender = $_POST["gender"];
$password = $_POST["p"];
$rp = $_POST["rp"];

if(empty($fname)){

    echo "Please enter your first name";

}else if(strlen($fname) > 50){

    echo "First name must be less than 50 characters";

}else if(empty($lname)){

    echo "Please enter your last name";

}else if(strlen($lname)>50){

    echo "Last name must be less than 50 characters";

}else if(empty($email)){

    echo "Please enter your email";

}else if(strlen($email)>100){

    echo "Email must be less than 100 characters";

}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

    echo "Invalid email";

}else if(empty($mobile)){

    echo "Please enter your mobile";

}else if(strlen($mobile)!=10){

    echo "Please enter 10 digit mobile number";

}else if(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$mobile)==0){

    echo "Invalid mobile number";
    
}else if(empty($no)){

    echo "Please enter your address no";

}else if(empty($street)){

    echo "Please enter your address street";

}else if($city == "0"){

    echo "Please select your city";

}else if($gender == "0"){

    echo "Please select your gender";

}else if(empty($password)){

    echo "Please enter your password";

}else if(strlen($password)<5||strlen($password)>20){

    echo "Password length must be between 5 and 20";

}else if(empty($rp)){

    echo "Please re-enter your password";

}else if($password != $rp){

    echo "Password & re-enter password doesn't match";

}else{

    $r = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");

    if($r->num_rows > 0){
        echo "User with the same email address or mobile already exists";
    }else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`email`,`fname`,`lname`,`mobile`,`password`,`gender_id`,`status_id`,`register_date`) 
        VALUES('".$email."','".$fname."','".$lname."','".$mobile."','".$password."','".$gender."','1','".$date."')");

        $locationrs = Database::search("SELECT * FROM `location` WHERE `city_id`='".$city."'");
        $locationd = $locationrs->fetch_assoc();
        $location = $locationd["id"];

        Database::iud("INSERT INTO `user_has_address` (`user_email`,`no`,`street`,`location_id`) VALUES ('".$email."','".$no."','".$street."','".$location."')");


        echo "done";
    }

}

?>