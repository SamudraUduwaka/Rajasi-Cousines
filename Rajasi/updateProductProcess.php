<?php

require "connection.php";

$pid = $_POST["id"];
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

        if(isset($_FILES["img1"])){
            $allowed_Image_Extention = array("image/jpg","image/png","image/jpeg","image/svg");
            $file_extension1 = $imageFile1["type"];

            if(!in_array($file_extension1,$allowed_Image_Extention)){
                echo "Please select a valid image.";
            }else{ 

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

                $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$pid."'");
                $imgn = $imgrs->num_rows;

                for($a=0; $a<$imgn; $a++){
                    if($a==0){
                        $imgd = $imgrs->fetch_assoc();
                        Database::iud("UPDATE `images` SET `code`='".$fileName1."' WHERE `code`='".$imgd["code"]."'");
                    }
                }

                
                
            }
        }else if(isset($_FILES["img2"])){
            $allowed_Image_Extention = array("image/jpg","image/png","image/jpeg","image/svg");
            $file_extension2 = $imageFile2["type"];

            if(!in_array($file_extension2,$allowed_Image_Extention)){
                echo "Please select a valid image.";
            }else{ 

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

                $fileName2 = "productimgs//".uniqid().$newImageExtension;
                move_uploaded_file($imageFile2["tmp_name"],$fileName2);

                $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$pid."'");
                $imgn = $imgrs->num_rows;

                for($a=0; $a<$imgn; $a++){
                    if($a==1){
                        $imgd = $imgrs->fetch_assoc();
                        Database::iud("UPDATE `images` SET `code`='".$fileName2."' WHERE `code`='".$imgd["code"]."'");
                    }
                }

                
                
            }
        }else if(isset($_FILES["img3"])){
            $allowed_Image_Extention = array("image/jpg","image/png","image/jpeg","image/svg");
            $file_extension3 = $imageFile3["type"];

            if(!in_array($file_extension3,$allowed_Image_Extention)){
                echo "Please select a valid image.";
            }else{ 

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

                $fileName3 = "productimgs//".uniqid().$newImageExtension;
                move_uploaded_file($imageFile3["tmp_name"],$fileName3);

                $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$pid."'");
                $imgn = $imgrs->num_rows;

                for($a=0; $a<$imgn; $a++){
                    if($a==2){
                        $imgd = $imgrs->fetch_assoc();
                        Database::iud("UPDATE `images` SET `code`='".$fileName3."' WHERE `code`='".$imgd["code"]."'");
                    }
                }

                
                
            }
        }
    
    Database::iud("UPDATE `product` SET `title`='".$title."',`price`='".$price."',`qty`='".$qty."',`description`='".$desc."'
    ,`category_id`='".$category."',`delivery_fee_colombo`='".$dwc."',`delivery_fee_other`='".$doc."' WHERE `id`='".$pid."'");
    
    echo "1";
    
}
?>