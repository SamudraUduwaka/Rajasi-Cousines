<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
    $fname = $_SESSION["u"]["fname"];
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Rajasi | Home</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="home.css" />
        <link rel="stylesheet" href="singleproductview.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    </head>

    <body>
        <div class="container-fluid">

            <?php require "homeheader.php"; ?>

            <div class="row p-2">
                <div class="col-12">
                    <div class="row m-3" style="background-color: rgb(250, 93, 2); background-image: linear-gradient(90deg,rgb(250, 93, 2) 0%,rgb(240, 188, 93) 100%);">

                        <div class="d-none d-lg-block offset-0 col-md-10 offset-md-1 col-lg-12 offset-lg-0 g-3">
                            <div class="d-grid" style="height: auto;">
                                <!-- Start WOWSlider.com BODY section -->
                                <div id="wowslider-container1">
                                    <div class="ws_images">
                                        <ul>
                                            <li><img src="data1/images/rajasi5.jpg" alt="rajasi5" title="" id="wows1_0" /></li>
                                            <li><img src="data1/images/rajasi4.jpg" alt="rajasi4" title="" id="wows1_1" /></li>
                                            <li><a href="http://wowslider.net"><img src="data1/images/rajasi3.jpg" alt="wow slider" title="" id="wows1_2" /></a></li>
                                            <li><img src="data1/images/rajasi1.jpg" alt="rajasi1" title="" id="wows1_3" /></li>
                                        </ul>
                                    </div>
                                    <div class="ws_bullets">
                                        <div>
                                            <a href="#" title="rajasi5"><span><img src="data1/tooltips/rajasi5.jpg" alt="rajasi5" />1</span></a>
                                            <a href="#" title="rajasi4"><span><img src="data1/tooltips/rajasi4.jpg" alt="rajasi4" />2</span></a>
                                            <a href="#" title="rajasi3"><span><img src="data1/tooltips/rajasi3.jpg" alt="rajasi3" />3</span></a>
                                            <a href="#" title="rajasi1"><span><img src="data1/tooltips/rajasi1.jpg" alt="rajasi1" />4</span></a>
                                        </div>
                                    </div>
                                    <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">wow slider</a> by WOWSlider.com v9.0</div>
                                    <div class="ws_shadow"></div>
                                </div>
                                <script type="text/javascript" src="engine1/wowslider.js"></script>
                                <script type="text/javascript" src="engine1/script.js"></script>
                                <!-- End WOWSlider.com BODY section -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row p-3">
                        <div class="col-12">
                            <div class="row border border-primary border-1 p-3">
                                <div class="col-12 text-center mb-2">
                                    <span class="fs-3 text-dark fw-bolder">Top Categories</span>
                                </div>

                                <?php

                                $categoryrs = Database::search("SELECT * FROM `category` LIMIT 6");
                                $categoryn = $categoryrs->num_rows;

                                for ($z = 0; $z < $categoryn; $z++) {
                                    $categoryd = $categoryrs->fetch_assoc();
                                    $catid = $categoryd["id"];

                                ?>
                                    <div class="col-4 col-lg-2">

                                        <?php
                                        $catimgrs = Database::search("SELECT * FROM `cat_img` WHERE `category_id`='" . $catid . "'");
                                        $catimgn = $catimgrs->num_rows;

                                        if ($catimgn == 1) {
                                            $catimgd = $catimgrs->fetch_assoc();
                                        ?>
                                            <img src="<?php echo $catimgd["code"]; ?>" class="img-fluid img-thumbnail rounded-circle border-dark border border-1" style="height: 180px;" />
                                        <?php
                                        } else {
                                        ?>
                                            <img src="images/cart.svg" class="img-fluid rounded-circle border-dark border border-1" style="height: 180px;" />
                                        <?php
                                        }
                                        ?>

                                        <br />
                                        <div class="col-12 text-center ">
                                            <a href="category.php?id=<?php echo $catid; ?>" class="text-dark fs-5"><?php echo $categoryd["name"]; ?></a>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="#products">
                    <div class="row p-3">
                        <div class="col-12">
                            <div class="row border border-primary border-1 p-3">
                                <div class="col-12 text-center mb-2">
                                    <span class="fs-3 text-dark fw-bolder">Top Products</span>
                                </div>

                                <?php

                                $prod = Database::search("SELECT * FROM `product` WHERE `status_id`='1' ORDER BY `date_added` DESC LIMIT 70");
                                $nprod = $prod->num_rows;

                                for ($x = 0; $x < $nprod; $x++) {
                                    $dprod = $prod->fetch_assoc();
                                ?>
                                    <div class="col-12 col-lg-6">
                                        <div class="card mb-3" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <?php

                                                    $img = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $dprod["id"] . "'");
                                                    $nimg = $img->num_rows;

                                                    $imge;
                                                    for ($y = 0; $y < $nimg; $y++) {
                                                        $dimg = $img->fetch_assoc();
                                                        if ($y == 1) {
                                                            $imge = $dimg["code"];
                                                        }
                                                    }

                                                    ?>
                                                    <img src="<?php echo $imge; ?>" class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $dprod["title"]; ?></h5>
                                                        <br />
                                                        <span class="fw-bold text-black-50 fs-5">Price: </span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs. <?php echo $dprod["price"]; ?> .00 </span>
                                                        <br />
                                                        <span class="fw-bold text-black-50 fs-5">Quantity: </span>&nbsp;
                                                        <input type="number" value="1" min="1" max="<?php echo $dprod['qty']; ?>" id="qtyinput<?php echo $dprod['id']; ?>" />

                                                        <!-- <div class="col-12" style="margin-top: 5px;">
                                                            <div class="row"> -->
                                                        <!-- <div class="border border-1 border-secondary rounded overflow-hidden float-start product_qty d-inline-block position-relative" style="width: 100%; height: 45px;">
                                                                    <span class="mt-1">Qty :</span>
                                                                    <input id="qtyinput" class="border-0 fs-6 fw-bold text-start mt-1" type="text" pattern="[0-9]*" value="1" />
                                                                    <div class="qty_buttons position-absolute">
                                                                        <div class="d-flex flex-column align-items-center border border-1 border-secondary qty-inc">
                                                                            <i class="fas fa-chevron-up" onclick="qty_inc(<?php echo $dprod['qty'], $dprod['id']; ?>);"></i>
                                                                        </div>
                                                                        <div class="d-flex flex-column align-items-center border border-1 border-secondary qty-dec">
                                                                            <i class="fas fa-chevron-down" onclick="qty_dec();"></i>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                        <!-- </div>
                                                        </div> -->

                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <div class="card-body d-grid">
                                                        <a class="btn btn-outline-success mb-2" href="<?php echo "singleproductview.php?id=" . ($dprod["id"]); ?>">Buy Now</a>
                                                        <a class="btn btn-outline-danger mb-2" onclick="addToCart(<?php echo $dprod['id']; ?>);">Add Cart</a>
                                                        <a class="btn btn-outline-secondary mb-2" onclick="addtowishlist(<?php echo $dprod['id']; ?>);"><i class="bi bi-suit-heart-fill"></i>Wishlist</a>
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
                    </div>
                </div>

            </div>

            <div id="about">
                <div class="col-12 p-2 m-2 mb-4 pb-5">
                    <div class="row" style="background-color: rgb(250, 93, 2); background-image: linear-gradient(90deg,rgb(250, 93, 2) 0%,rgb(240, 188, 93) 100%);">
                        <div class="col-12 offset-0 col-md-6 col-lg-6 offset-lg-0 g-3 pb-5">
                            <div class="row">
                                <div class="col-10 offset-1 mt-2 mb-2">
                                    <!-- <div class="input-group mb-3 border border-2 rounded border-dark rounded-4">
                                        <input type="text" class="form-control border-0" placeholder="Search anything for you..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-secondary border-0" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                                    </div> -->
                                </div>
                                <div class="col-10 offset-1 col-lg-8 offset-lg-2">
                                    <span class="fs-5 text-success fw-bolder mb-2">Open <b>Every Day</b></span><br />
                                    <span class="fs-5"><b>Monday</b> 08.00am - 10.00pm</span><br />
                                    <span class="fs-5"><b>Tuesday</b> 08.00am - 10.00pm</span><br />
                                    <span class="fs-5"><b>Wednesday</b> 08.00am - 10.00pm</span><br />
                                    <span class="fs-5"><b>Thursday</b> 08.00am - 10.00pm</span><br />
                                    <span class="fs-5"><b>Friday</b> 08.00am - 10.00pm</span><br />
                                    <span class="fs-5"><b>Saturday</b> 08.00am - 10.00pm</span><br />
                                    <span class="fs-5"><b>Sunday</b> 08.00am - 10.00pm</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 offset-0 col-md-6 col-lg-6 offset-lg-0 g-3">
                            <div class="row">
                                <img src="images/food.svg" height="300px" />
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <p class="">We are here for serving you good and healthy foods.</p>
                            </div>
                        </div>
                    </div>


                </div>

                <div id="map" class="text-center mb-3">
                    <div class="col-12">
                        <h2 class="fw-bold mb-3">Directions</h2>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.0266350827683!2d79.92867561445014!3d6.766606622167413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24f70a232e8d5%3A0xf3d7cce2b6b26016!2sRajasi%20Restaurant!5e0!3m2!1sen!2slk!4v1635632745628!5m2!1sen!2slk" width="1200" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div id="contact">
                <?php

                require "footer.php";

                ?>
            </div>

            <div class="modal fade" id="rateusmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rajasi | Rate Us</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span class="fs-4 text-center fw-bold">Select Ratings</span>
                            <br/><br/>
                            <?php
                            $ratingrs = Database::search("SELECT * FROM `ratings` ");
                            $ratingn = $ratingrs->num_rows;
                            $rateid = "1";

                            for($r1=0; $r1<$ratingn; $r1++){
                                $ratingd = $ratingrs->fetch_assoc();
                                $rateid = $ratingd["id"];
                                ?>
                                <button class="btn btn-warning" id="ratebtn<?php echo $ratingd["id"];?>" onclick="makerate(<?php echo $ratingd['id'];?>);"><?php echo $ratingd["id"];?></button>
                                <?php
                            }
                            ?>
                            <br/><br/>
                            <div id="stars">
                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="finalrate(<?php echo $rateid;?>);"><i class="bi bi-stars"></i> Rate</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="home.js"></script>
            <script src="script.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>