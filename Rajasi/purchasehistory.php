<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $mail = $_SESSION["u"]["email"];

    $invoicers = Database::search("SELECT * FROM `purchase` WHERE `user_email`='" . $mail . "'");
    $in = $invoicers->num_rows;


?>

<!DOCTYPE html>

<html>
    <head>
        <title>
           Rajasi | Purchase History
        </title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="userprofile.css" />
        <link rel="stylesheet" href="home.css"/>
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    </head>

    <body style="background-color: rgba(247, 177, 96, 0.89); background-image: linear-gradient(90deg,rgba(247, 177, 96, 0.89) 0%,white 100%);">
    <div class="container-fluid">
            <div class="row">
                <?php
                require "header.php";
                ?>

                <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Purchase History</li>
                    </ol>
                </nav>
                </div>

                <div class="col-12 text-center mb-3 mt-3">
                    <span class="fs-1 fw-bold text-black-50">Transaction History</span>
                </div>

                <?php

                if ($in == 0) {

                ?>
                    <div class="col-12 text-center bg-transparent" style="height: 350px;">
                    <img src="images/emptypurchase.png"/>
                    <br/>
                        <span class="fs-1 fw-bold text-secondary d-block">You have no items in your Transaction History yet....</span>
                    </div>
                <?php

                } else {
                ?>


                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 d-none d-lg-block">
                                <div class="row">
                                    <div class="col-2 bg-light">
                                        <label class="form-label">#</label>
                                    </div>
                                    <div class="col-3 bg-light">
                                        <label class="form-label fw-bold">Order Details</label>
                                    </div>
                                    <div class="col-1 bg-light text-end">
                                        <label class="form-label fw-bold">Quantity</label>
                                    </div>
                                    <div class="col-1 bg-light text-end">
                                        <label class="form-label fw-bold">Amount</label>
                                    </div>
                                    <div class="col-2 bg-light text-end">
                                        <label class="form-label fw-bold">Purchased Date & Time</label>
                                    </div>
                                    <div class="col-3 bg-light"></div>
                                    <div class="col-12">
                                        <hr />
                                    </div>


                                </div>
                            </div>

                            <?php

                            for ($i = 0; $i < $in; $i++) {
                                $ir = $invoicers->fetch_assoc();
                            ?>


                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-2 bg-info text-center ">
                                            <label class="form-label text-white fs-6 py-5"><?php echo $ir["order_id"]; ?></label>
                                        </div>
                                        <div class="col-lg-3 col-12">
                                            <div class="row">
                                                <div class="card mx-3 my-3" style="max-width: 540px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <?php

                                                            $pid = $ir["product_id"];
                                                            $array;

                                                            $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                                            $n = $imagers->num_rows;
                                                            for ($x = 0; $x < $n; $x++) {
                                                                $f = $imagers->fetch_assoc();
                                                                $array[$x] = $f["code"];
                                                            }

                                                            ?>
                                                            <img src="<?php echo $array[0]; ?>" class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <?php

                                                                $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
                                                                $pr = $productrs->fetch_assoc();

                                                                ?>
                                                                <h5 class="card-title"><?php echo $pr["title"]; ?></h5>
                                                                <br/>
                                                                <p class="card-text"><b>Price :</b>Rs <?php echo $pr["price"]; ?> .00</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-1 text-center text-lg-end">
                                            <label class="form-label fs-4 pt-5"><?php echo $ir["qty"]; ?></label>
                                        </div>

                                        <div class="col-12 col-lg-1 text-center text-lg-end bg-secondary">
                                            <label class="form-label text-white fs-6 text-lg-start py-5 fw-bold">Rs <?php echo $ir["total"];?> .00</label>
                                        </div>

                                        <div class="col-12 col-lg-2 text-center text-lg-end">
                                            <label class="form-labell fs-5 pt-5"><?php echo $ir["date"]; ?></label>
                                        </div>

                                        <div class="col-lg-3 col-12">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-secondary rounded border border-1 border-primary mt-5 fs-5" onclick="addFeedback(<?php echo $pr['id']; ?>);"><i class="bi bi-info-circle-fill"></i>Feedback</button>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-danger rounded mt-5 fs-5" onclick="deletefrom(<?php echo $ir['id']; ?>);"><i class="bi bi-trash-fill"></i>Delete</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <!-- modal -->

                                        <div class="modal fade" id="feedmodal<?php echo $pr['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $pr["title"];?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <textarea id="feedtxt" cols="30" rows="10" class="form-control fs-4"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" onclick="saveFeedback(<?php echo $pr['id'];?>);">Save Feedback</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal -->
                                    </div>
                                </div>

                        </div>
                    </div>

                <?php
                            }

                ?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-lg-9 d-none d-lg-block"></div>
                        <div class="col-12 col-lg-3 d-grid">
                            <button class="btn btn-danger fs-5" onclick="clearAll();"><i class="bi bi-trash-fill"></i>Clear All Records</button>
                        </div>
                    </div>
                </div>

            <?php
                }

            ?>

            <?php
            require "footer.php";
            ?>
            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="purchasehistory.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>

<?php
}
?>