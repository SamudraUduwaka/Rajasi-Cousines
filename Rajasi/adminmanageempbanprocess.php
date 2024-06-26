<?php

require "connection.php";

if(isset($_POST["id"])){
    $id = $_POST["id"];

    $emprs = Database::search("SELECT * FROM `employee` WHERE `id`='".$id."'");
    $num = $emprs->num_rows;

    if($num == 1){
        $row = $emprs->fetch_assoc();
        $ps = $row["status_id"];

        if($ps == "1"){

            Database::iud("UPDATE `employee` SET `status_id` = '2' WHERE `id`='".$id."'");
            echo "1";

        }else{

            Database::iud("UPDATE `employee` SET `status_id` = '1' WHERE `id`='".$id."'");
            echo "2";

        }
    }
}

?>