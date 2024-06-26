<!DOCTYPE html>
<html>

<head>
    <title>Rajasi | Admin Sign In</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/rajasilogoo.jpg" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="font&hr.css" />

    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: rgb(250, 93, 2); background-image: linear-gradient(90deg,rgb(250, 93, 2) 0%,rgb(240, 188, 93) 100%);">

    <div class="container-fluid justify-content-center" style="margin-top: 100px;">
        <div class="row align-content-center">

            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <p class="text-center fs-2 text-dark fw-bolder">Rajasi Admins</p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-6 d-none d-lg-block">
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
                    <div class="col-12 col-lg-6 d-block p-5">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="fs-4 fw-bold text-black-50">Sign in To Your Account.</p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Enter your email here to verify</label>
                                <input type="email" class="form-control" id="email" />
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="adminverification();">Verify to Log In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger">Back to User's Log In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center">&copy;2021 Rajasi.lk All Rights Reserved.</p>
            </div>

        </div>
    </div>

    <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rajasi Admin Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Enter the verification code you got by an Email.</label>
                    <input type="text" class="form-control" id="v" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                </div>
            </div>
        </div>
    </div>


    <script src="admin.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>