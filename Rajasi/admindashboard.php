<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {
    $fname = $_SESSION["a"]["fname"];
    $lname = $_SESSION["a"]["lname"];
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Rajasi | Admin Panel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="home.css" />
        <link rel="stylesheet" href="admin.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    </head>

    <body style="background-color: rgb(250, 93, 2); background-image: linear-gradient(90deg,rgb(250, 93, 2) 0%,rgb(240, 188, 93) 100%);">
        <div class=" d-none d-lg-block">
            <div class="sidenav bg-dark">
                <!-- <div class=""> -->
                <div class="text-center m-3">
                    <p class="text-orange fs-3">Dashboard</p>
                </div>
                <a href="productadd.php" class="text-white h"><i class="bi bi-dot"></i>New items</a>
                <a href="#map" class="text-white h"><i class="bi bi-dot"></i>Map</a>
                <a href="#addcategory" class="text-white h"><i class="bi bi-dot"></i>Add &nbsp; Categories</a>
                <a href="#addemployees" class="text-white h"><i class="bi bi-dot"></i>Add &nbsp; Employee</a>
                <a href="#manageusers" class="text-white h"><i class="bi bi-dot"></i>Users</a>
                <a href="#manageproducts" class="text-white h"><i class="bi bi-dot"></i>Products</a>
                <a href="#manageemp" class="text-white h"><i class="bi bi-dot"></i>Employees</a>
                <a href="adminchat.php" class="text-white h"><i class="bi bi-dot"></i>Chat</a>
                <a href="#rate" class="text-white h"><i class="bi bi-dot"></i>Rates</a>
                <!-- </div> -->
            </div>
        </div>
        <div class="row d-block d-lg-none bg-dark p-3">
            <div class="col-12">
                <div class="row text-center text-white">
                    <div class="col-12">
                        <h3 class="text-center">Dashboard</h3>
                    </div>
                    <div class="col-6">
                        <a href="productadd.php" class="fs-5">New items</a>
                    </div>
                    <div class="col-6">
                        <a href="#map" class="fs-5">Map</a>
                    </div>
                    <div class="col-6">
                        <a href="#addcategory" class="fs-5">Add Categories</a>
                    </div>
                    <div class="col-6">
                        <a href="#addemployees" class="fs-5">Add Employee</a>
                    </div>
                    <div class="col-6">
                        <a href="#manageusers" class="fs-5">Users</a>
                    </div>
                    <div class="col-6">
                        <a href="#manageproducts" class="fs-5">Products</a>
                    </div>
                    <div class="col-6">
                        <a href="#manageemp" class="fs-5">Employees</a>
                    </div>
                    <div class="col-6">
                        <a href="adminchat.php" class="fs-5">Chat</a>
                    </div>
                    <div class="col-6">
                        <a href="#rate" class="fs-5">Rates</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <div class="offset-0 offset-lg-2 mainbox">
            <div class="row">
                <div class="col-12">
                    <div class="row">

                        <!-- ////////////////////////////////////////////////// -->
                        <div class="col-12">
                            <div class="row m-3 border border-1 border-start-0 border-end-0 border-secondary p-2">
                                <div class="col-12 col-lg-5 text-center text-lg-end">
                                    <img src="images/rajasilogoo.jpg" />
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="row text-center text-lg-start">

                                        <span class="fs-3 fw-bolder mt-2">Welcome to Rajasi Admins
                                            <br />

                                        </span>
                                        <span class="text-black-50 fs-4"><?php echo $fname . " " . $lname; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="top">
                            <div class="col-12">
                                <div class="row border border-3 border-primary rounded rounded-2 m-2 p-2 gy-2 pb-2">

                                    <div class="col-12 text-center">
                                        <span class="fs-3 text-dark fw-bolder">Summery</span>
                                    </div>

                                    <?php
                                    $today = date("Y-m-d");
                                    $thismonth = date("m");
                                    $thisyear = date("Y");
                                    $a = "0";
                                    $b = "0";
                                    $c = "0";
                                    $e = "0";
                                    $f = "0";

                                    $invoicers = Database::search("SELECT * FROM `invoice`");
                                    $in = $invoicers->num_rows;

                                    for ($x = 0; $x < $in; $x++) {
                                        $ir = $invoicers->fetch_assoc();

                                        $f = $f + $ir["qty"];

                                        $d = $ir["date"];
                                        $splitdate = explode(" ", $d);
                                        $pdate = $splitdate[0];

                                        if ($pdate == $today) {
                                            $a = $a + $ir["total"];
                                            $c = $c + $ir["qty"];
                                        }

                                        $splitmonth = explode("-", $pdate);
                                        $pyear = $splitmonth[0];
                                        $pmonth = $splitmonth[1];

                                        if ($pyear == $thisyear) {
                                            if ($pmonth = $thismonth) {
                                                $b = $b + $ir["total"];
                                                $e = $e + $ir["qty"];
                                            }
                                        }
                                    }
                                    ?>

                                    <div class="col-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Daily Earnings
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Rs. <?php echo $a; ?> .00</h5>
                                                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                <a href="#" class="btn btn-primary"><i class="bi bi-bookmark-heart-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Monthly Earnings
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Rs. <?php echo $b; ?> .00</h5>
                                                <!-- <p class="card-text">With supporting text below as a natural 
                                                lead-in to additional content.</p> -->
                                                <a href="#" class="btn btn-primary"><i class="bi bi-bookmark-heart-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Today Sellings
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $c; ?> Items</h5>
                                                <!-- <p class="card-text">With supporting text below as a natural 
                                                lead-in to additional content.</p> -->
                                                <a href="#" class="btn btn-primary"><i class="bi bi-bookmark-heart-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Monthly Sellings
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $e; ?> Items</h5>
                                                <!-- <p class="card-text">With supporting text below as a natural 
                                                lead-in to additional content.</p> -->
                                                <a href="#" class="btn btn-primary"><i class="bi bi-bookmark-heart-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Total Sellings
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $f; ?> Items</h5>
                                                <!-- <p class="card-text">With supporting text below as a natural 
                                                lead-in to additional content.</p> -->
                                                <a href="#" class="btn btn-primary"><i class="bi bi-bookmark-heart-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Total Engagements
                                            </div>
                                            <div class="card-body">
                                                <?php

                                                $usersrs = Database::search("SELECT * FROM `user`");
                                                $un = $usersrs->num_rows;

                                                ?>
                                                <h5 class="card-title"><?php echo $un; ?></h5>
                                                <!-- <p class="card-text">With supporting text below as a natural 
                                                lead-in to additional content.</p> -->
                                                <a href="#" class="btn btn-primary"><i class="bi bi-bookmark-heart-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- ////////////////////////////////////////////////// -->

                        <!-- ////////////////////////////////////////////////// -->

                        <div id="manageusers">

                            <div class="col-12">
                                <div class="row border border-3 border-primary rounded rounded-1 m-2 p-2">
                                    <div class="col-12 text-center m-2 rounded rounded-2 bg-orange">
                                        <span class="fs-3 text-black-50">Manage Users</span>
                                    </div>
                                    <div class="col-12" id="viewResults">

                                        <div class="row g-3" id="manageuserbtn">
                                            <div class="col-12 text-center mt-2">
                                                <span class="fs-3">Welcome to manage users</span>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 offset-0 offset-md-3 offset-lg-4">
                                                <img src="images/manageuser.svg" />
                                            </div>
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-primary" onclick="viewmanageusers(1);">Start Managing</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>

                            <!-- ////////////////////////////////////////////////// -->

                            <!-- ////////////////////////////////////////////////// -->

                            <div id="manageproducts">

                                <div class="col-12">
                                    <div class="row border border-3 border-primary rounded rounded-1 m-2 p-2">
                                        <div class="col-12 text-center m-2 rounded rounded-2 bg-orange">
                                            <span class="fs-3 text-black-50">Manage Products</span>
                                        </div>
                                        <div class="col-12" id="viewResultspro">
                                            <div class="row g-3">
                                                <div class="col-12 text-center mt-2">
                                                    <span class="fs-3">Welcome to manage products</span>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4 offset-0 offset-md-3 offset-lg-4">
                                                    <img src="images/managepro.svg" />
                                                </div>
                                                <div class="col-12 d-grid">
                                                    <button class="btn btn-primary" onclick="viewmanageproducts(1);">Start Managing</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- ////////////////////////////////////////////////// -->

                                <!-- ////////////////////////////////////////////////// -->

                                <div id="manageemp">

                                    <div class="col-12">
                                        <div class="row border border-3 border-primary rounded rounded-1 m-2 p-2">
                                            <div class="col-12 text-center m-2 rounded rounded-2 bg-orange">
                                                <span class="fs-3 text-black-50">Manage Employees</span>
                                            </div>
                                            <div class="col-12" id="viewResultsproemp">
                                                <div class="row g-3">
                                                    <div class="col-12 text-center mt-2">
                                                        <span class="fs-3">Welcome to manage employees</span>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 offset-0 offset-md-3 offset-lg-4">
                                                        <img src="images/manageemp.svg" />
                                                    </div>
                                                    <div class="col-12 d-grid">
                                                        <button class="btn btn-primary" onclick="viewmanageemp(1);">Start Managing</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- ////////////////////////////////////////////////// -->

                                    <!-- ////////////////////////////////////////////////// -->

                                    <div id="addemployees">



                                        <div class="col-12">
                                            <div class="row border border-3 border-primary rounded rounded-1 m-2 p-2">
                                                <div class="col-12 col-lg-6">
                                                    <div class="row border border-1 border-dark rounded m-1 mt-0">

                                                        <div class=" m-3 mb-5">
                                                            <span class="fs-2">
                                                                Add new employee
                                                            </span>
                                                        </div>

                                                        <div class="col-12 mb-5 text-center">
                                                            <img src="images/addemp.svg" class="col-12 ms-2 img-thumbnail productimg" id="prev1" />
                                                            <div class="col-12 text-center mb-3">
                                                                <div class="row">
                                                                    <div class="col-12 d-grid mt-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <input class="d-none" type="file" accept="img/*" id="imguploader1" />
                                                                                <label class="btn btn-primary col-12" for="imguploader1" onclick="changeImgemp();">Upload</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="row border border-1 border-dark rounded p-2">
                                                        <div class="col-12 col-lg-6 mb-1">
                                                            <span class="text-dark-50 fs-5">Enter first name</span>
                                                            <input class="form-control" placeholder="First Name" id="fnamee" />
                                                        </div>
                                                        <div class="col-12 col-lg-6 mb-1">
                                                            <span class="text-dark-50 fs-5">Enter last name</span>
                                                            <input class="form-control" placeholder="Last Name" id="lname" />
                                                        </div>
                                                        <div class="col-12 mb-1">
                                                            <span class="text-dark-50 fs-5">Enter email</span>
                                                            <input class="form-control" placeholder="Email" id="mail" />
                                                        </div>
                                                        <div class="col-12 col-lg-6 mb-1">
                                                            <span class="text-dark-50 fs-5">Enter mobile</span>
                                                            <input class="form-control" placeholder="Mobile" id="mobile" />
                                                        </div>
                                                        <div class="col-12 col-lg-6 mb-1">
                                                            <span class="text-dark-50 fs-5">Select Gender</span>
                                                            <select class="form-select" id="gender">
                                                                <option value="0">Select gender</option>
                                                                <?php

                                                                $genderrs = Database::search("SELECT * FROM `gender`");
                                                                $gendern = $genderrs->num_rows;

                                                                for ($x = 0; $x < $gendern; $x++) {
                                                                    $genderd = $genderrs->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $genderd["id"]; ?>"><?php echo $genderd["name"]; ?></option>
                                                                <?php
                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-lg-6 mb-1">
                                                            <span class="text-dark-50 fs-5">No</span>
                                                            <input class="form-control" placeholder="No" id="no" />
                                                        </div>
                                                        <div class="col-12 col-lg-6 mb-1">
                                                            <span class="text-dark-50 fs-5">Enter street</span>
                                                            <input class="form-control" placeholder="Street" id="street" />
                                                        </div>
                                                        <div class="col-12 mb-1">
                                                            <span class="text-dark-50 fs-5">Select City</span>
                                                            <select class="form-select" id="city">
                                                                <option value="0">Select city</option>
                                                                <?php

                                                                $cityrs = Database::search("SELECT * FROM `city`");
                                                                $cityn = $cityrs->num_rows;

                                                                for ($x = 0; $x < $cityn; $x++) {
                                                                    $cityd = $cityrs->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $cityd["id"]; ?>"><?php echo $cityd["name"]; ?></option>
                                                                <?php
                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 d-grid mt-2 mb-2">
                                                            <button class="btn btn-primary" onclick="addEmp();">Add</button>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>

                                    </div>

                                    <!-- ////////////////////////////////////////////////// -->

                                    <!-- ////////////////////////////////////////////////// -->

                                    <div id="addcategory">

                                        <div class="col-12">
                                            <div class="row border border-3 border-primary rounded rounded-1 m-2 p-2">

                                                <div class="col-12 col-lg-8">
                                                    <div class="row border border-1 border-dark rounded">
                                                        <span class="text-center fs-3">
                                                            Add Category
                                                        </span>
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6 m-2 mt-5">
                                                                    <span class="">Available categories</span>
                                                                </div>
                                                                <div class="col-6 m-2 mb-3">
                                                                    <select class="form-select">
                                                                        <option>Find Categories</option>
                                                                        <?php

                                                                        $categoryrs = Database::search("SELECT * FROM `category`");
                                                                        $categoryn = $categoryrs->num_rows;

                                                                        for ($y = 0; $y < $categoryn; $y++) {
                                                                            $categoryd = $categoryrs->fetch_assoc();
                                                                        ?>
                                                                            <option><?php echo $categoryd["name"]; ?></option>
                                                                        <?php
                                                                        }

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row">

                                                                <div class="col-8  p-3">
                                                                    <span>Enter new category</span>
                                                                    <input class="form-control" id="categoryfield" />
                                                                </div>
                                                                <div class="col-4 d-grid p-3">
                                                                    <button class="btn btn-dark" onclick="addCat();">Add Category</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 ">
                                                    <div class="row border border-1 border-dark rounded">
                                                        <!-- <img src="images/addcategory.svg" /> -->

                                                        <div class="col-12 mb-5 text-center">
                                                            <img src="images/addcategory.svg" class="col-12 ms-2 img-thumbnail productimg" id="prev5" />
                                                            <div class="col-12 text-center mb-3">
                                                                <div class="row">
                                                                    <div class="col-12 d-grid mt-2">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <input class="d-none" type="file" accept="img/*" id="imguploader5" />
                                                                                <label class="btn btn-primary col-12" for="imguploader5" onclick="changeImgcat();">Upload</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- ////////////////////////////////////////////////// -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="rate">
                        <div class="col-12">
                            <div class="row border border-3 border-primary rounded rounded-2 m-2 p-2 gy-2 pb-2">
                                <div class="col-12 text-center">
                                    <span class="fs-3 fw-bold text-dark">Rating Summery</span>
                                </div>

                                <div class="col-12 mt-2 mb-2">
                                    <div class="row">
                                        <?php
                                        
                                        $raters1 = Database::search("SELECT * FROM `ratings` WHERE `id`='1'");

                                        $rated1 = $raters1->fetch_assoc();
                                        
                                        ?>
                                        <div class="col-4 offset-2">

                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                        </div>
                                        <div class="col-4">
                                            <span>1 Star Rating</span>
                                        </div>
                                        <div class="col-2">
                                            <span><?php echo $rated1["number"];?> Ratings</span>
                                        </div>
                                        <?php
                                        
                                        $raters2 = Database::search("SELECT * FROM `ratings` WHERE `id`='2'");

                                        $rated2 = $raters2->fetch_assoc();
                                        
                                        ?>
                                        <div class="col-4 offset-2">

                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                        </div>
                                        <div class="col-4">
                                            <span>2 Star Rating</span>
                                        </div>
                                        <div class="col-2">
                                            <span><?php echo $rated2["number"];?> Ratings</span>
                                        </div>
                                        <?php
                                        
                                        $raters3 = Database::search("SELECT * FROM `ratings` WHERE `id`='3'");

                                        $rated3 = $raters3->fetch_assoc();
                                        
                                        ?>
                                        <div class="col-4 offset-2">

                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                        </div>
                                        <div class="col-4">
                                            <span>3 Star Rating</span>
                                        </div>
                                        <div class="col-2">
                                            <span><?php echo $rated3["number"];?> Ratings</span>
                                        </div>

                                        <?php
                                        
                                        $raters4 = Database::search("SELECT * FROM `ratings` WHERE `id`='4'");

                                        $rated4 = $raters4->fetch_assoc();
                                        
                                        ?>
                                        <div class="col-4 offset-2">

                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-black-50"><i class="bi bi-star-fill"></i></span>
                                        </div>
                                        <div class="col-4">
                                            <span>4 Star Rating</span>
                                        </div>
                                        <div class="col-2">
                                            <span><?php echo $rated4["number"];?> Ratings</span>
                                        </div>

                                        <?php
                                        
                                        $raters5 = Database::search("SELECT * FROM `ratings` WHERE `id`='5'");

                                        $rated5 = $raters5->fetch_assoc();
                                        
                                        ?>
                                        <div class="col-4 offset-2">

                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                                        </div>
                                        <div class="col-4">
                                            <span>5 Star Rating</span>
                                        </div>
                                        <div class="col-2">
                                            <span><?php echo $rated5["number"];?> Ratings</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <div id="map" class="text-end">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.0266350827683!2d79.92867561445014!3d6.766606622167413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24f70a232e8d5%3A0xf3d7cce2b6b26016!2sRajasi%20Restaurant!5e0!3m2!1sen!2slk!4v1635632745628!5m2!1sen!2slk" width="1200" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <script src="admin.js"></script>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>
<?php
}

?>