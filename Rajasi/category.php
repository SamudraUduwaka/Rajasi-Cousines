<?php

require "connection.php";

if (isset($_GET["id"])) {
    $cid = $_GET["id"];

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Rajasi | Category Search</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="home.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    </head>

    <body style="background-color: rgba(247, 177, 96, 0.89); background-image: linear-gradient(90deg,rgba(247, 177, 96, 0.89) 0%,white 100%);">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row">
                    <?php

                    require "header.php";

                    ?>

                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category Search</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-center">
                                <span class="fs-3 text-dark fw-bolder">Category Search</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row border border-dark border-2 rounded rounded-2 m-2 ms-0 p-1">
                            <div class="col-12 text-center">
                                <?php

                                $cat = Database::search("SELECT * FROM `category` WHERE `id`='" . $cid . "'");
                                $catd = $cat->fetch_assoc();

                                $catname = $catd["name"];

                                ?>

                                <span class="fw-bold fs-4 text-secondary"><?php echo $catname; ?></span>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <?php

                                    $productrs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cid . "'");
                                    $productn = $productrs->num_rows;

                                    if ($productn > 0) {
                                        for ($y = 0; $y < $productn; $y++) {
                                            $dprod = $productrs->fetch_assoc();
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
                                                                if ($y == 0) {
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
                                                                <input type="number" value="1" min="1" max="<?php echo $dprod["qty"];?>" id="qtyinput<?php echo $dprod["id"];?>"/>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-4">
                                                            <div class="card-body d-grid">
                                                                <a class="btn btn-outline-success mb-2" href="<?php echo "singleproductview.php?id=" . ($dprod["id"]); ?>">Buy Now</a>
                                                                <a class="btn btn-outline-danger mb-2" onclick="addToCart(<?php echo $dprod['id'];?>);">Add Cart</a>
                                                                <a class="btn btn-outline-secondary mb-2" onclick="addtowishlist(<?php echo $dprod['id']; ?>);"><i class="bi bi-suit-heart-fill"></i>Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>

                                        <div class="col-12">
                                            <div class="row text-center ">
                                                <img src="images/nocatitems.svg" height="350px" />
                                                <span class="fs-2 fw-bold text-secondary mb-5">Oops! We have no any items for this.</span>
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row border border-dark border-2 rounded rounded-2 m-2 ms-0 p-1">

                            <div class="col-12 text-center">
                                <span class="fs-4 text-secondary fw-bold">Related Categories</span>
                            </div>

                            <?php

                            $categoryrs = Database::search("SELECT * FROM `category` WHERE `id`!= '" . $cid . "'");
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
        </div>

        <?php
        require "footer.php";
        ?>

        <script src="bootstrap.bundle.js"></script>
        <script src="home.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
}
?>