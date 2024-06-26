<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
    $fname = $_SESSION["u"]["fname"];

    $total = "0";
    $ship = "0";
    $shipping = "0";
?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Rajasi | Cart</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="cart.css" />
        <link rel="stylesheet" href="home.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="font&hr.css" />

        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    </head>

    <body  style="background-color: rgba(247, 177, 96, 0.89); background-image: linear-gradient(90deg,rgba(247, 177, 96, 0.89) 0%,white 100%);">

        <div class="container-fluid">
            <div class="row">
                <?php

                require "header.php";

                ?>
                <div class="col-12" style="background-color: #E3E5E4;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 border border-1 border-secondary rounded mb-2">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder">Cart <i class="bi bi-cart4"></i></label>
                        </div>
                        <div class="col-12 col-lg-6">
                            <hr class="hrbreak1" />
                        </div>

                        <?php

                        $cart = Database::search("SELECT * FROM `cart` ");
                        $ncart = $cart->num_rows;

                        if ($ncart == 0) {
                        ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptycart"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-2 fw-bolder">You have no items in your cart</label>
                                    </div>
                                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                        <a href="home.php" class="btn btn-primary fs-3">Start Shopping</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <?php
                                    for ($i = 0; $i < $ncart; $i++) {
                                        $dcart = $cart->fetch_assoc();
                                        $pid = $dcart["product_id"];

                                        $prod = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
                                        $pd = $prod->fetch_assoc();

                                        $total = $total + ($pd["price"] * $dcart["qty"]);

                                        $addressrs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `location` 
                                        ON `user_has_address`.`location_id`=`location`.`id`    WHERE `user_email`='" . $email . "'");
                                        $ar = $addressrs->fetch_assoc();
                                        $district_id = $ar["district_id"];

                                        $ship = "0";

                                        if ($district_id == "1") {
                                            $ship = $pd["delivery_fee_colombo"];

                                            $shipping = $shipping + $pd["delivery_fee_colombo"];
                                        } else {
                                            $ship = $pd["delivery_fee_other"];

                                            $shipping = $shipping + $pd["delivery_fee_other"];
                                        }

                                    ?>


                                        <div class="card mb-3 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="fw-bold text-black-50 fs-5"><?php echo $pd["title"]; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="hrbreak1" />
                                                <div class="col-md-4">

                                                    <?php

                                                    $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                                    $in = $imagers->num_rows;

                                                    $arr;

                                                    for ($x = 0; $x < $in; $x++) {
                                                        $ir = $imagers->fetch_assoc();
                                                        $arr[$x] = $ir["code"];
                                                    }

                                                    ?>
                                                    <img src="<?php echo $arr[0]; ?>" class="img-fluid rounded-start" alt="...">

                                                    <!-- <img src="images/noodles.jpeg" class="img-fluid rounded-start d-inline-block"> -->
                                                    <!-- tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="" data-bs-content="" alt="..."> -->
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $pd["title"]; ?></h5>
                                                        <br />
                                                        <span class="fw-bold text-black-50 fs-5">Item Price : </span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs. <?php echo $pd["price"]; ?> .00 </span>
                                                        <br />
                                                        <span class="fw-bold text-black-50 fs-5">Quantity: </span>&nbsp;
                                                        <input type="text" value="<?php echo $dcart["qty"]; ?>" class="mt-3 border border-2 border-secondary fs-4 fw-bold px-3 cartqtytxt" />
                                                        <br />

                                                        
                                                        <?php



                                                        ?>
                                                        <span class="fw-bold text-black-50 fs-5">Delivery Fee: </span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs. <?php echo $ship; ?> .00 </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <div class="card-body d-grid">
                                                        <a class="btn btn-outline-success mb-2" onclick="goToSPV(<?php echo $pid;?>);">Pay for this</a>
                                                        <a class="btn btn-outline-danger mb-2" onclick="deletefromcart(<?php echo $dcart['id'] ?>)">Remove</a>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Requested total <i class="bi bi-info-circle"></i></span>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Rs. <?php echo ($pd["price"] * $dcart["qty"]) + $ship; ?> .00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fs-3 fw-bold">Summery</label>
                                    </div>
                                    <div class="col-12">
                                        <hr />
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-6 fw-bold ">Items (<?php echo $ncart; ?>)</span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="fs-6 fw-bold ">Rs. <?php echo $total; ?> .00</span>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <span class="fs-6 fw-bold ">Shipping </span>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <span class="fs-6 fw-bold ">Rs. <?php echo $shipping; ?> .00</span>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <hr />
                                    </div>
                                    <div class="col-6 mt-2">
                                        <span class="fs-5 fw-bold ">Total</span>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <?php
                                        $grand = $total + $shipping;
                                        ?>
                                        <span class="fs-5 fw-bold ">Rs. <?php echo $grand; ?> .00</span>
                                    </div>
                                    <div class="col-12 mt-3 mb-3 d-grid">
                                    <!-- onclick="goToCheckout(<?php echo $shipping,$total,$ncart;?>);" -->
                                        <a class="btn btn-warning fs-5 fw-bold" href="checkout.php?t=<?php echo $total;?>&s=<?php echo $shipping;?>&n=<?php echo $ncart;?>">CHECKOUT</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <?php
                        }
                        ?>
                    
                </div>

            </div>
        </div>
        <?php

        require "footer.php";

        ?>


        <script src="cart.js"></script>
        <script src="script.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>
    </body>

    </html>

<?php
}
