<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    $email = $_SESSION["u"]["email"];

    if(isset($_FILES["i"])){

        $img = $_FILES["i"];
    
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
    
                $fileName = "userimgs//" . uniqid() . $newImageExtension;
                move_uploaded_file($img["tmp_name"], $fileName);

                $imgrs = Database::search("SELECT * FROM `profileimg` WHERE `user_email`='".$email."'");
                $imgn = $imgrs->num_rows;

                if($imgn==1){
                    Database::iud("UPDATE `profileimg` SET `code`='".$fileName."'");
                }else{
                    Database::iud("INSERT INTO `profileimg`(`code`,`user_email`) VALUES ('" . $fileName . "','" . $email . "')");
                }
    
                echo "Success";
            }
    }

}

?>