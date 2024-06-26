<?php

require "connection.php";

$category = $_POST["c"];
$title = $_POST["t"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["p"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$desc = $_POST["desc"];

if(isset($_FILES["img1"])){
    $imageFile1 = $_FILES["img1"];
}

if(isset($_FILES["img2"])){
    $imageFile2 = $_FILES["img2"];
}

if(isset($_FILES["img3"])){
    $imageFile3 = $_FILES["img3"];
}

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;


if(empty($title)){
    echo "Give a title to your product.";
}else if(strlen($title)>100){
    echo "Title must not exceed 100 characters.";
}else if($qty=="0"|| $qty=="e"){
    echo "Please give the product quantity.";
}else if(!is_int($qty)){
    echo "Please add a valid quantity.";
}else if(empty($qty)){
    echo "Please add the quantity of your product.";
}else if($qty<0){
    echo "Product quantity can't be a negative value.";
}else if(empty($price)){
    echo "Please give the price to your product.";
}else if(!is_int($price)){
    echo "Please enter a valid price";
}else if ($category=="0"){
    echo "Please Select a Category.";
}else if(empty($dwc)){
    echo "Enter a delivery fee within Colombo";
}else if(!is_int($dwc)){
    echo "Please insert a valid price";
}else if(empty($doc)){
    echo "Enter a delivery fee outof Colombo";
}else if(!is_int($doc)){
    echo "Please insert a valid price";
}else if(empty($desc)){
    echo "Please add a description to your product";
}else{

        $file_extension;

        if(isset($_FILES["img1"]) && isset($_FILES["img2"]) && isset($_FILES["img3"])){
            $allowed_Image_Extention = array("image/jpg","image/png","image/jpeg","image/svg");

            $file_extension1 = $imageFile1["type"];
            $file_extension2 = $imageFile2["type"];
            $file_extension3 = $imageFile3["type"];
        
                    if(!in_array($file_extension1,$allowed_Image_Extention) && !in_array($file_extension2,$allowed_Image_Extention) && !in_array($file_extension3,$allowed_Image_Extention)){
                        echo "Please select a valid image.";
                    }else{

                        
                        Database::iud("INSERT INTO `product` (`title`,`price`,`qty`,`description`,`category_id`,`status_id`,`delivery_fee_colombo`,`delivery_fee_other`,`date_added`) VALUES('".$title."','".$price."','".$qty."','".$desc."','".$category."','".$state."','".$dwc."','".$doc."','".$date."')");

                        $lastId = Database::$connection->insert_id;
        
                        $newImageExtension;
        
                        if($file_extension="image/jpg"){
                            $newImageExtension = ".jpg";
                        }else if($file_extension="image/jpeg"){
                            $newImageExtension = ".jpeg";
                        }else if($file_extension="image/png"){
                            $newImageExtension = ".png";
                        }else if($file_extension="image/svg"){
                            $newImageExtension = ".svg";
                        }
        
                        $fileName1 = "productimgs//".uniqid().$newImageExtension;
                        move_uploaded_file($imageFile1["tmp_name"],$fileName1);

                        $fileName2 = "productimgs//".uniqid().$newImageExtension;
                        move_uploaded_file($imageFile2["tmp_name"],$fileName2);

                        $fileName3 = "productimgs//".uniqid().$newImageExtension;
                        move_uploaded_file($imageFile3["tmp_name"],$fileName3);
        
                        Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('".$fileName1."','".$lastId."')");
                        Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('".$fileName2."','".$lastId."')");
                        Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('".$fileName3."','".$lastId."')");
        
                        echo "1";
                  
                    }
        }else{
            echo "Please select images";
        }
        
    
    }
    


?>
