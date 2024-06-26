<?php

require "connection.php";

$page = $_POST["pg"];

$offset = 2 * ($page - 1);

?>

<table style="width: 100%;">
    <tr>
        <th>id</th>
        <th>title</th>
        <th class="d-none d-lg-block">Quantity</th>
        <th>Registration</th>
        <th></th>
    </tr>

    <?php

    $productrs = Database::search("SELECT * FROM `product`");

    $selectedrs = Database::search("SELECT * FROM `product` LIMIT 2 OFFSET " . $offset . "");

        $allProductnm = $productrs->num_rows;
        $DividedNumber = $allProductnm / 2;
        $PageNumbers = intval($DividedNumber);
        if ($allProductnm % 2 != 0) {
            $PageNumbers = $PageNumbers + 1;
        }
        if ($page > $PageNumbers) {
            $page = 1;
        }
        for ($Value = 0; $Value < 2; $Value++) {
            $productd = $selectedrs->fetch_assoc();
            if ($productd != null) {
    ?>
        <tr>
            <td><?php echo $productd["id"]; ?></td>
            <td><a href="updateproduct.php?id=<?php echo $productd["id"];?>"><?php echo $productd["title"]; ?></a></td>
            <td class="d-none d-lg-block"><?php echo $productd["qty"]; ?></td>
            <td><?php echo $productd["date_added"]; ?></td>
            <td>
                <?php
                if ($productd["status_id"] == "1") {
                ?>
                    <div class="col-12 d-grid">
                        <button class="btn btn-danger d-grid" id="blockbtn<?php echo $productd['id']; ?>" onclick="blockproduct(<?php echo $productd['id']; ?>)">Block</button>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-12 d-grid">
                        <button class="btn btn-success d-grid" id="blockbtn<?php echo $productd['id']; ?>" onclick="blockproduct(<?php echo $productd['id']; ?>)">Unblock</button>
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
                                    } ?> "><button onclick="viewmanageproducts('<?php echo $page - 1; ?>');" class="page-link">&laquo;</button></li>
            <?php if ((isset($backFPage)) || $page > 2) { ?><li class="page-item page-item-xs-none"><button class="page-link" onclick="viewmanageproducts('1');">1</button></li>
                <li class="page-item <?php if ($page != 3) {
                                            echo "disabled";
                                        } else {
                                        } ?> page-item-xs-none"><button class="page-link" <?php if ($page == 3) { ?> onclick="viewmanageproducts('2');" <?php } else {
                                                                                                                                                } ?>> <?php if ($page == 3) {
                                                                                                                                                                                        echo "2";
                                                                                                                                                                                    } else {
                                                                                                                                                                                        echo "...";
                                                                                                                                                                                    } ?></button></li><?php } ?>
            <?php for ($Pgn = $PgnStart; $Pgn <= $Pgnlimit; $Pgn++) { ?>
                <li class="page-item <?php if ($Pgn == $page) {
                                            echo "active point-none";
                                        } ?>"><button onclick="viewmanageproducts('<?php echo $Pgn; ?>');" class="page-link"><?php echo $Pgn; ?></a></li>
            <?php } ?>
            <li class="page-item <?php if ($page == $PageNumbers) {
                                        echo "disabled";
                                    } else {
                                    } ?>"><button onclick="viewmanageproducts('<?php echo $page + 1; ?>');" class="page-link">&raquo;</button></li>
        </ul>
    </nav>
</div>