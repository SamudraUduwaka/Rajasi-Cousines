<?php

require "connection.php";

if (isset($_GET["id"])) {
    $pid = $_GET["id"];
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Rajasi | Feedbacks</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="singleproductview.css" />
        <link rel="stylesheet" href="home.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="font&hr.css" />

        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body  style="background-color: rgba(247, 177, 96, 0.89); background-image: linear-gradient(90deg,rgba(247, 177, 96, 0.89) 0%,white 100%);">

        <div class="container-fluid">
            <div class="row">
                <?php
                require "header.php";
                ?>

                <div class="col-12">
                    <nav>
                        <ol class="d-flex flex-wrap mb-0 list-unstyled bg-white">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="singleproductview.php?id=<?php echo $pid; ?>">Single product view</a></li>
                            <li class="breadcrumb-item active">
                                <a href="#" class="text-black-50 text-decoration-none">Feedbacks</a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <span class="fs-1 fw-bolder"><i class="bi bi-stars"></i> Feedbacks...</span>
                        </div>
                    </div>
                </div>

                <div class="col-10 offset-1 col-lg-4 offset-lg-1 mt-3 mb-3">
                    <div class="row border border-1 border-dark">
                        <?php
                        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
                        $productd = $productrs->fetch_assoc();

                        ?>
                        <div class="col-12 text-center">
                            <span class="fs-4">Item name: <b><?php echo $productd["title"]; ?></b></span>
                        </div>
                        <div class="col-12 text-center mb-1">
                            <?php
                            $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                            $imgn = $imgrs->num_rows;

                            for ($x = 0; $x < $imgn; $x++) {
                                $imgd = $imgrs->fetch_assoc();

                                if ($x == 0) {
                                    $img = $imgd["code"];
                            ?>
                                    <img src="<?php echo $img; ?>" />
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <?php

                        ?>
                    </div>
                </div>

                <div class="col-10 offset-1 col-lg-7 offset-lg-0 mt-3">
                    <div class="row">
                        <?php

                        $feedrs = Database::search("SELECT * FROM `feeback` WHERE `product_id`='" . $pid . "'");
                        $feedn = $feedrs->num_rows;

                        for ($y = 0; $y < $feedn; $y++) {
                            $feedrow = $feedrs->fetch_assoc();

                        ?>
                            <div class="col-12 col-lg-6 border-secondary border border-1 rounded-1 rounded-end">
                                <div class="row m-1">
                                    <div class="col-12 ">
                                        <span class="fs-6 fw-bold text-primary"><?php echo $feedrow["user_email"]; ?></span>
                                    </div>
                                    <div class="col-12 ">
                                        <span class="fs-6 fw-bold text-dark"><?php echo $feedrow["feed"]; ?></span>
                                    </div>
                                    <div class="col-12 text-end">
                                        <span class="fs-6 fw-bold text-black-50"><?php echo $feedrow["date"]; ?></span>
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

        <?php
        require "footer.php";
        ?>

        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
}

?>