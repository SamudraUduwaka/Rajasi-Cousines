<?php

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <title>Rajasi | Customize Your Food</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/rajasilogoo.jpg" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="singleproductview.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>
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
                        <li class="breadcrumb-item active" aria-current="page">Customize Your Food</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12">
                <div class="row text-center">
                    <span class="fw-bolder fs-2">Customize Your Meal</span>
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-5 col-lg-3 offset-1 offset-lg-1">
                        <span class="fs-5">Select the meal-time you want</span>

                        <div class="row border border-1 border-primary rounded rounded-2" style="background-color: silver;">
                            <div class="col-12 text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Only Breakfast
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="2">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Only Lunch
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="3">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Only Tea time
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="4">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Only Dinner
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="5">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Only desserts
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="6">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Breakfast with desserts
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="7">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Lunch with desserts
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="8">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Dinner with desserts
                                    </label>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="fs-5 text-primary">Why we ask for this?</a>

                    </div>

                    <div class="col-5 col-lg-3 offset-1 offset-lg-1">
                        <span class="fs-5">For Breakfast (As we recommend)</span>

                        <div class="row border border-1 border-primary rounded rounded-2" style="background-color: silver;">
                            <div class="col-12 text-center">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <?php
                                        
                                        $productrs = Database::search("SELECT * FROM `product` WHERE `category_id`='2'");
                                        $productn = $productrs->num_rows;

                                        if($productn >0){
                                            $productd = $productrs->fetch_assoc();
                                            
                                        }
                                        
                                        ?>
                                        <div class="col-md-4">
                                            <img src="..." class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-5 col-lg-3 offset-1 offset-lg-1">
                        <span class="fs-5">For Dessert (As we recommend)</span>

                        <div class="row border border-1 border-primary rounded rounded-2" style="background-color: silver;">
                            <div class="col-12 text-center">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="..." class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="col-12" id="meal">

            </div>
        </div>
    </div>

    <script src="customize.js"></script>
</body>

</html>