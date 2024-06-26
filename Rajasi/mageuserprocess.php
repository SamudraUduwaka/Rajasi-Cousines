<?php

require "connection.php";

$page = $_POST["pg"];

$offset = 2 * ($page - 1);

?>

<table style="width: 100%;">
    <tr>
        <th>Email</th>
        <th>First Name</th>
        <th class="d-none d-lg-block">Last Name</th>
        <th>Registration</th>
        <th></th>
    </tr>

    <?php

    $userrs = Database::search("SELECT * FROM `user` WHERE `email`!= 'institutework456@gmail.com'");

    $selectedrs = Database::search("SELECT * FROM `user` WHERE `email`!= 'institutework456@gmail.com' LIMIT 2 OFFSET " . $offset . "");

    $allProductnm = $userrs->num_rows;
    $DividedNumber = $allProductnm / 2;
    $PageNumbers = intval($DividedNumber);
    if ($allProductnm % 2 != 0) {
        $PageNumbers = $PageNumbers + 1;
    }
    if ($page > $PageNumbers) {
        $page = 1;
    }
    for ($Value = 0; $Value < 2; $Value++) {
        $userd = $selectedrs->fetch_assoc();
        if ($userd != null) {
    ?>
            <tr>
                <td><?php echo $userd["email"]; ?></td>
                <td><?php echo $userd["fname"]; ?></td>
                <td class="d-none d-lg-block"><?php echo $userd["lname"]; ?></td>
                <td><?php echo $userd["register_date"]; ?></td>
                <td>
                    <?php
                    if ($userd["status_id"] == "1") {
                    ?>
                        <div class="col-12 d-grid">
                            <button class="btn btn-danger d-grid" id="blockbtn<?php echo $userd["email"];?>" onclick="blockuser('<?php echo $userd['email']; ?>');">Block</button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-12 d-grid">
                            <button class="btn btn-success d-grid" id="blockbtn<?php echo $userd["email"];?>" onclick="blockuser('<?php echo $userd['email']; ?>');">Unblock</button>
                        </div>
                    <?php
                    }
                    ?>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>

<?php
$PgnStart = 1;
if ($PageNumbers > 4) {
    if ($page > $PageNumbers - 4) {
        $PgnStart = $PageNumbers - 4;
        $backFPage = "on";
    }
    if ($page <= $PageNumbers - 4) {
        $PgnStart = $page;
    }
    $Pgnlimit = $PgnStart + 4;
} else {
    $PgnStart = 1;
    $Pgnlimit = $PageNumbers;
}
?>
<div class="row my-3 mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination d-flex justify-content-center col-gap">
            <li class="page-item <?php if ($page == 1) {
                                        echo "disabled";
                                    } else {
                                    } ?> "><button onclick="viewmanageusers('<?php echo $page - 1; ?>');" class="page-link">&laquo;</button></li>
            <?php if ((isset($backFPage)) || $page > 2) { ?><li class="page-item page-item-xs-none"><button class="page-link" onclick="viewmanageusers('1');">1</button></li>
                <li class="page-item <?php if ($page != 3) {
                                            echo "disabled";
                                        } else {
                                        } ?> page-item-xs-none"><button class="page-link" <?php if ($page == 3) { ?> onclick="viewmanageusers('2');" <?php } else {
                                                                                                                                                } ?>> <?php if ($page == 3) {
                                                                                                                                                                                        echo "2";
                                                                                                                                                                                    } else {
                                                                                                                                                                                        echo "...";
                                                                                                                                                                                    } ?></button></li><?php } ?>
            <?php for ($Pgn = $PgnStart; $Pgn <= $Pgnlimit; $Pgn++) { ?>
                <li class="page-item <?php if ($Pgn == $page) {
                                            echo "active point-none";
                                        } ?>"><button onclick="viewmanageusers('<?php echo $Pgn; ?>');" class="page-link"><?php echo $Pgn; ?></a></li>
            <?php } ?>
            <li class="page-item <?php if ($page == $PageNumbers) {
                                        echo "disabled";
                                    } else {
                                    } ?>"><button onclick="viewmanageusers('<?php echo $page + 1; ?>');" class="page-link">&raquo;</button></li>
        </ul>
    </nav>
</div>