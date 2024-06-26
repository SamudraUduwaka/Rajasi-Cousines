<?php

session_start();
require "connection.php";

$e = $_POST["e"];
$p = $_POST["p"];
$r = $_POST["remember"];

if(empty($e)){

    echo "Please enter your email";

}else if(empty($p)){

    echo "Please enter your password";

}else{

    $userrs = Database::search("SELECT * FROM `user` WHERE `email`='".$e."' AND `password`='".$p."'");
    $usern = $userrs->num_rows;

    if($usern == 1){

        

        $userd = $userrs->fetch_assoc();

        if($userd["status_id"]=='1'){
            echo "1";
            $_SESSION["u"] = $userd;

            if($r=="true"){
    
                setcookie("e",$e,time()+(60*60*24*365));
                setcookie("p",$p,time()+(60*60*24*365));
    
            }else{
    
                setcookie("e","",-1);
                setcookie("p","",-1);
    
            }
        }else{
            echo "2";
        }
        

    }else{

        echo "Invalid email or password";

    }

}

?>