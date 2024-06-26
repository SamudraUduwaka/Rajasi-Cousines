<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {

    $mail = $_SESSION["a"]["email"];

    $chatrs = Database::search("SELECT * FROM `chat` WHERE `from` NOT IN ('" . $mail . "') GROUP BY `from` ORDER BY `date` DESC ");
    $n = $chatrs->num_rows;

    for ($x = 0; $x < $n; $x++) {

        $r = $chatrs->fetch_assoc();
        $u = array_unique($r);

        $imgrs = Database::search("SELECT * FROM `profileimg` WHERE `user_email`='".$r["from"]."'");
        $imgd = $imgrs->fetch_assoc();


?>
        <div class="row bg-white border border-2 border-primary rounded rounded-1 m-2">
            <div class="col-12 " onclick="replace('<?php echo $u['from'];?>');">
                <img src="<?php echo $imgd["code"];?>" class="img-fluid rounded-circle border-primary border " style="height: 50px;" />
                <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="mb-0"><?php echo $u["from"]; ?></h6><small class="small font-weight-bold"><?php echo $r["date"];?></small>
                    </div>
                    <p class="font-italic mb-0 text-small"><?php echo $u["content"]; ?></p>
                </div>
            </div>
        </div>

<?php

    }
}

?>