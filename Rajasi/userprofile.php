<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Rajasi | Update profile</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="userprofile.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    </head>

    <body style="background-color: rgba(247, 177, 96, 0.89); background-image: linear-gradient(90deg,rgba(247, 177, 96, 0.89) 0%,white 100%);">
        <div class="container-fluid">
            <div class="col-12">
                <?php
                require "header.php";
                ?>
                <div class="row mt-5 mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                        </ol>
                    </nav>
                    <div class="col-12 col-lg-3 offset-0 offset-lg-1 border border-dark border-1 rounded rounded-1 pb-4">
                        <div class="row">
                            <div class="col-12 mb-1 text-center">
                                <span class="fs-3">Profile Pic</span>
                            </div>
                            <div class="col-12">

                                <?php

                                $imgrs = Database::search("SELECT * FROM `profileimg` WHERE `user_email`='" . $email . "'");
                                $imgn = $imgrs->num_rows;

                                if ($imgn == 1) {
                                    $imgd = $imgrs->fetch_assoc();
                                    $img = $imgd["code"];
                                ?>
                                    <img src="<?php echo $img; ?>" class="col-5 col-lg-2 ms-2 img-thumbnail productimg" id="prev1" />
                                <?php
                                } else {
                                ?>
                                    <img src="images/userprofile.svg" class="col-5 col-lg-2 ms-2 img-thumbnail productimg" id="prev1" />
                                <?php
                                }

                                ?>
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input class="d-none" type="file" accept="img/*" id="imguploader1" />
                                                    <label class="btn btn-primary col-5 col-lg-9" for="imguploader1" onclick="changeImg();">Select</label>
                                                    <button class="btn btn-outline-primary col-5 col-lg-9" onclick="saveimg();">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 border border-dark border-1 rounded rounded-1 pb-4">
                        <div class="row">
                            <?php
                            $userrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                            $userd = $userrs->fetch_assoc();
                            ?>
                            <div class="col-12 mb-1 text-center">
                                <span class="fs-3">Profile Details</span>
                            </div>
                            <div class="col-6">
                                <span>First Name</span>
                                <input type="text" class="form-control" value="<?php echo $userd['fname']; ?>" id="fname" />
                            </div>
                            <div class="col-6">
                                <span>Last Name</span>
                                <input type="text" class="form-control" value="<?php echo $userd['lname']; ?>" id="lname" />
                            </div>
                            <div class="col-12">
                                <span>Email</span>
                                <input type="text" class="form-control" value="<?php echo $userd['email']; ?>" disabled />
                            </div>
                            <div class="col-12">
                                <span>Mobile</span>
                                <input type="text" class="form-control" value="<?php echo $userd['mobile']; ?>" id="mobile" />
                            </div>
                            <div class="col-12">
                                <span>Password</span>
                                <input type="password" class="form-control" value="<?php echo $userd['password']; ?>" disabled />
                            </div>
                            <div class="col-6">
                                <span>Register date</span>
                                <input type="text" class="form-control" value="<?php echo $userd['register_date']; ?>" disabled />
                            </div>
                            <div class="col-6">
                                <span>Gender</span>
                                <?php
                                $genderrs = Database::search("SELECT * FROM `gender` WHERE `id`='" . $userd["gender_id"] . "'");
                                $genderd = $genderrs->fetch_assoc();
                                ?>
                                <select class="form-select" id="gender">
                                    <option value="<?php echo $genderd['id']; ?>"><?php echo $genderd['name']; ?></option>
                                    <?php
                                    $grrs = Database::search("SELECT * FROM `gender` WHERE `id`!='" . $userd["gender_id"] . "'");
                                    $grn = $grrs->num_rows;

                                    for ($i = 0; $i < $grn; $i++) {
                                        $grd = $grrs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $grd['id']; ?>"><?php echo $grd['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-12 mt-2 d-grid">
                                <button class="btn btn-outline-primary" onclick="saveprofileprocess();">Save Changes</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-3 border border-dark border-1 rounded rounded-1 pb-4">
                        <div class="row">
                            <div class="col-12 mb-1 text-center">
                                <span class="fs-3">Address Details</span>
                            </div>
                            <div class="col-12">
                                <span>No</span>
                                <?php
                                $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $email . "'");
                                $addressd = $addressrs->fetch_assoc();
                                ?>
                                <input type="text" class="form-control" value="<?php echo $addressd['no']; ?>" id="no" />
                            </div>
                            <div class="col-12">
                                <span>Street</span>
                                <input type="text" class="form-control" value="<?php echo $addressd['street']; ?>" id="street" />
                            </div>
                            <div class="col-12">
                                <span>City</span>
                                <?php
                                $locationrs = Database::search("SELECT * FROM `location` WHERE `id`='" . $addressd["location_id"] . "'");
                                $locationd = $locationrs->fetch_assoc();

                                $cityrs = Database::search("SELECT * FROM `city` WHERE `id`='" . $locationd["city_id"] . "'");
                                $cityd = $cityrs->fetch_assoc();
                                ?>
                                <select class="form-select" id="city">
                                    <option value="<?php echo $cityd['id']; ?>"><?php echo $cityd['name']; ?></option>
                                    <?php
                                    $crs = Database::search("SELECT * FROM `city` WHERE `id`!='" . $cityd["id"] . "'");
                                    $cn = $crs->num_rows;

                                    for ($i = 0; $i < $cn; $i++) {
                                        $cd = $crs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $cd['id']; ?>"><?php echo $cd['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-12">
                                <span>District</span>
                                <?php
                                $districtrs = Database::search("SELECT * FROM `district` WHERE `id`='" . $locationd["district_id"] . "'");
                                $districtd = $districtrs->fetch_assoc();
                                ?>
                                <select class="form-select" disabled>
                                    <option value="<?php echo $districtd['id']; ?>"><?php echo $districtd['name']; ?></option>
                                </select>

                            </div>
                            <div class="col-12">
                                <span>Province</span>
                                <?php
                                $provincers = Database::search("SELECT * FROM `province` WHERE `id`='" . $locationd["province_id"] . "'");
                                $provinced = $provincers->fetch_assoc();
                                ?>
                                <select class="form-select" disabled>
                                    <option value="<?php echo $provinced['id']; ?>"><?php echo $provinced['name']; ?></option>
                                </select>
                            </div>
                            <div class="col-12 mt-2 d-grid">
                                <button class="btn btn-outline-primary" onclick="saveaddressprocess();">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php

        require "footer.php";

        ?>


        <script src="bootstrap.bundle.js"></script>
        <script src="userprofile.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>
<?php
}

?>