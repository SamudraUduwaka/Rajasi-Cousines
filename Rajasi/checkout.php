<?php

if (isset($_GET["t"]) && isset($_GET["s"]) && isset($_GET["n"])) {
    $total = $_GET["t"];
    $shipping = $_GET["s"];
    $no = $_GET["n"];

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Rajasi | CheckOut</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="cart.css" />
        <link rel="stylesheet" href="home.css" />
        <link rel="stylesheet" href="style.css" />
        <!-- <link rel="stylesheet" href="font&hr.css" />

        <script src="sweetalert2.min.js"></script> -->
        <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    </head>

    <body style="background-color: rgba(247, 177, 96, 0.89); background-image: linear-gradient(90deg,rgba(247, 177, 96, 0.89) 0%,white 100%);">

        <div class="container-fluid mb-5">
            <div class="col-12">
                <?php

                require "header.php";

                ?>
            </div>
            <div class="col-12 offset-0 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-3">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CheckOut</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-6 offset-0 offset-lg-2 offset-xl-3">
                        <div class="row border border-1 border-dark rounded">
                            <div class="col-12">
                                <div class="row">
                                    <div class="text-center">
                                        <span class="fs-3 fw-bold">CheckOut</span>
                                    </div>

                                    <div class="w-100">
                                        <hr />
                                    </div>

                                    <div class="col-12 col-lg-6 text-center text-lg-start">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">No of products</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Total Amount</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Total Shipping</span>
                                            </div>
                                            <div class="col-12 col-lg-8 offset-0 offset-lg-2">
                                                <hr />
                                            </div>
                                            <div class="col-12 mb-3">
                                                <span class="fs-4 fw-bold">Total CheckOut</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 text-center text-lg-end">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold"><?php echo $no; ?> Items</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Rs. <?php echo $shipping; ?> .00</span>
                                            </div>
                                            <div class="col-12 col-lg-8 offset-0 offset-lg-2">
                                                <hr />
                                            </div>
                                            <div class="col-12 mb-3">
                                                <span class="fs-4 fw-bold">Rs. <?php echo $shipping + $total; ?> .00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-6 d-grid mb-4">
                                            <button class="btn btn-success fs-5" onclick="pay();"><i class="bi bi-credit-card"></i>Pay Now</button>
                                        </div>

                                        <div class="col-12 col-lg-6 d-grid mb-4">
                                            <button class="btn btn-warning fs-5" onclick="cashondelivery();"><i class="bi bi-cash-stack"></i>Cash On Delivery</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>

        <?php
        
        require "footer.php";
        
        ?>

        <script src="checkout.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <!-- <script src="sweetalert2.all.min.js"></script> -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
}

?>