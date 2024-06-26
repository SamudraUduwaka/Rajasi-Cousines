<?php

require "connection.php";

$cat = $_POST["cat"];

if(isset($_FILES["img"])){
    $img = $_FILES["img"];
}

if(empty($cat)){
    echo "First enter a category";
}else{
    $categoryrs = Database::search("SELECT * FROM `category` WHERE `name` LIKE '%".$cat."%'");
    $categoryn = $categoryrs->num_rows;

    if($categoryn > 0){
        echo "Already exists such category";
    }else{
        Database::iud("INSERT INTO `category` (`name`) VALUES ('".$cat."')");

        $lastId = Database::$connection->insert_id;

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
    
                $fileName = "catimgs//" . uniqid() . $newImageExtension;
                move_uploaded_file($img["tmp_name"], $fileName);
    
                Database::iud("INSERT INTO `cat_img`(`code`,`category_id`) VALUES ('" . $fileName . "','" . $lastId . "')");

                echo "Success";
            }

        }else{
            echo "Select an image";
        }

        
    }
}

?>