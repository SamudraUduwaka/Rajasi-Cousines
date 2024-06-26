<?php
require "connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>With us</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/rajasilogoo.jpg" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="semantic.css" />

    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com"> -->
</head>

<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="7ZfWtIEq"></script>

    <div class="container-fluid vh-100">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <p class="text-center texts">Delisious Cousine</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row m-3">
                    <div class="col-12 col-md-6 g-3">
                        <div class="d-grid" style="height: auto;">
                            <!-- Start WOWSlider.com BODY section -->
                            <div id="wowslider-container1">
                                <div class="ws_images">
                                    <ul>
                                        <li><img src="data1/images/rajasi5.jpg" alt="rajasi5" title="rajasi5" id="wows1_0" /></li>
                                        <li><img src="data1/images/rajasi4.jpg" alt="rajasi4" title="rajasi4" id="wows1_1" /></li>
                                        <li><a href="http://wowslider.net"><img src="data1/images/rajasi3.jpg" alt="wow slider" title="rajasi3" id="wows1_2" /></a></li>
                                        <li><img src="data1/images/rajasi1.jpg" alt="rajasi1" title="rajasi1" id="wows1_3" /></li>
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
                    <div class="col-12 col-md-6" id="signupcontent">
                        <div class="row">
                            <div class="col-12 g-3">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <p class="sign">Create New Account with Rajasi</p>
                                    </div>
                                    <div class="col-12">
                                        <p id="msg" class="text-danger"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="row d-grid">
                                            <div class="ui input focus">
                                                <input type="text" placeholder="First Name" id="fn">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row d-grid">
                                            <div class="ui input focus">
                                                <input type="text" placeholder="Last Name" id="ln">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row d-grid">
                                            <div class="ui input focus">
                                                <input type="text" placeholder="Email" id="e">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row d-grid">
                                            <div class="ui input focus">
                                                <input type="text" placeholder="Mobile number" id="m">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row d-grid">
                                            <div class="ui input focus">
                                                <input type="text" placeholder="No" id="no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row d-grid">
                                            <div class="ui input focus">
                                                <input type="text" placeholder="Street" id="st">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="row d-grid">
                                            <div class="ui input focus">
                                                <!-- <input type="text" placeholder="City"> -->
                                                <select class="form-select border border-info text-secondary" id="city">
                                                    <option class="" value="0">Select city</option>
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
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="row d-grid">
                                            <div class="ui input focus">
                                                <!-- <input type="text" placeholder="City"> -->
                                                <select class="form-select border border-info text-secondary" id="g">
                                                    <option class="" value="0">Select Gender</option>
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
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="row d-grid">
                                            <div class="ui action input focus">
                                                <input type="password" placeholder="Password" id="password">
                                                <button class="ui button" id="pbtn1" onclick="changeclasspassword1();">See <i class="bi bi-eye-slash-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="row d-grid">
                                            <div class="ui action input focus">
                                                <input type="password" placeholder="Confirm Password" id="rpassword">
                                                <button class="ui button" id="pbtn2" onclick="changeclasspassword2();">See <i class="bi bi-eye-slash-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <div class="row">
                                            <button class="btn ui orange button" onclick="signUp();">Sign Up Now</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <div class="row">
                                            <button class="ui brown button btn" onclick="changeView();">Already with us? Let's Sign In </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-none" id="signincontent">
                        <div class="row">
                            <div class="col-12 g-3">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <p class="sign">Sign In now with your account</p>
                                    </div>
                                    <div class="col-12">
                                        <p id="smsg" class="text-danger"></p>
                                    </div>
                                    <?php

                                        $e = "";
                                        $p = "";
                                        $r = "";

                                        if (isset($_COOKIE["e"])) {
                                            $e = $_COOKIE["e"];
                                            $r = "checked";
                                        }

                                        if (isset($_COOKIE["p"])) {
                                            $p = $_COOKIE["p"];
                                        }

                                        ?>
                                    <div class="col-12">
                                        <div class="row d-grid mt-2">
                                            <div class="ui input focus">
                                                <input type="text" placeholder="Email" id="se" value="<?php echo $e;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row d-grid">
                                            <div class="ui action input focus">
                                                <input type="password" placeholder="Password" id="spassword" value="<?php echo $p;?>">
                                                <button class="ui button" id="pbtn3" onclick="changeclasspassword3();">See <i class="bi bi-eye-slash-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 offset-1">
                                        <div class="row ">
                                            <div class="form-check fs-4">
                                                <input class="form-check-input" type="checkbox" id="remember" <?php
                                                                                                            if(isset($_COOKIE["e"]) && isset($_COOKIE["p"])){
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                                ?>>
                                                <label class="form-check-label">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-5 text-end">
                                        <span class="text-primary" style="cursor: pointer;" onclick="forgotPassword();">Forgot password</span>
                                    </div> -->
                                    <div class="col-12 d-grid">
                                        <div class="row">
                                            <button class="btn ui orange button" onclick="signIn();">Sign In Here</button>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 d-grid">
                                        <div class="row">
                                            <div class="fb-login-button" data-width="300px" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="true">k</div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <div class="row">
                                            <div id="my-signin2"></div>
                                            <script>
                                                function onSuccess(googleUser) {
                                                    console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
                                                }

                                                function onFailure(error) {
                                                    console.log(error);
                                                }

                                                function renderButton() {
                                                    gapi.signin2.render('my-signin2', {
                                                        'scope': 'profile email',
                                                        'width': 100,
                                                        'height': 30,
                                                        'longtitle': true,
                                                        'theme': 'dark',
                                                        'onsuccess': onSuccess,
                                                        'onfailure': onFailure
                                                    });
                                                }
                                            </script>

                                            <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
                                        </div>
                                    </div> -->
                                    <div class="col-12 d-grid">
                                        <div class="row">
                                            <button class="ui brown button btn" onclick="changeView();">Not a member? Hurry! Let's Sign Up </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Password Reset</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="np" />
                                        <button class="btn btn-outline-primary" type="button" id="npb" onclick="showPassword();">Show</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Re-Type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp" />
                                        <button class="btn btn-outline-primary" type="button" id="rnpb" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input class="form-control" type="text" id="vc" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <script src="script.js"></script>
    <script src="index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>