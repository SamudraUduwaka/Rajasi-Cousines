<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="bootstrap.css"/> -->
    <style>
        .logo {
            background-image: url("images/rajasilogoo.jpg");
            /* background-position: center; */
            background-repeat: no-repeat;
            background-size: contain;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="col-12 rounded">
        <div class="row bg-dark p-3 border border-warning border-1 rounded">
            <div class="text-center col-7 mt-4">
                <span class="text-warning fs-2"><?php echo $fname; ?></span>
                <span class="text-warning fs-2">Welcome to Rajasi </span>
            </div>
            <div class="col-5 logo text-start">

            </div>
            <div class="col-2 dropdown text-end mt-3">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    My Account
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="wishlist.php"><i class="bi bi-heart-fill"></i>Wishlist</a></li>
                    <li><a class="dropdown-item" href="purchasehistory.php"><i class="bi bi-bag-check-fill"></i>Purchase History</a></li>
                    <li><a class="dropdown-item" href="cart.php"><i class="bi bi-cart-check-fill"></i>Cart</a></li>
                    <!-- <li><a class="dropdown-item" href="sellerproductview.php">My Products</a></li> -->
                    <li><a class="dropdown-item" href="userprofile.php"><i class="bi bi-people-fill"></i>Profile Settings</a></li>
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-caret-left-square-fill"></i>Log Out</a></li>
                </ul>
            </div>
            <div class="col-10">
                <!-- sidenav -->
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


                    <a href="home.php"><i class="bi bi-house-door"></i>Home</a>

                    <!-- <a href="cart.php">Cart</a> -->

                    <!-- <a data-bs-toggle="offcanvas" href="#offcanvasBottom6" role="button" aria-controls="offcanvasBottom">Services</a> -->
                    <!-- offcanvas services -->
                    <!-- <div class="offcanvas offcanvas-bottom bg-orange" tabindex="-1" id="offcanvasBottom6" aria-labelledby="offcanvasBottomLabel">
                        <div class="offcanvas-header">
                            <h2 class="offcanvas-title fs-2 text-dark text-center" style="font-family: 'kleeoness';" id="offcanvasBottomLabel">Services from us..</h2>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body small">
                            ...
                        </div>
                    </div> -->
                    <!-- offcanvas services -->

                    <!-- <a href="#">Watchlist</a> -->


                    <a href="#"><i class="bi bi-geo-alt-fill"></i>Map</a>

                    <a href="#contact"><i class="bi bi-person-lines-fill"></i>Contacts</a>

                    <a href="Chat.php"><i class="bi bi-chat-quote-fill"></i>Chat with Us</a>

                    <a href="#" onclick="rate();"><i class="bi bi-star-half"></i>Rate Us</a>

                    <a href="cart.php"><i class="bi bi-basket2-fill"></i>Cart</a>

                </div>

                <!-- Use any element to open the sidenav -->
                <div class="row bg-dark rounded">
                    <div class="col-12">
                        <div class="row text-center">
                            <button onclick="openNav();" class="btn btn-white fs-2 d-lg-none text-white"><i class="bi bi-distribute-vertical text-white"></i>Rajasi Clicks</button>
                        </div>
                        <div class="row d-none d-lg-block">
                            <div class="col-12 text-white text-center fs-4 p-3">
                                <div class="row">
                                    <div class="col-2">
                                        <a href="#"><i class="bi bi-house-door"></i>Home</a>
                                    </div>
                                    <!-- offcanvas about -->
                                    <!-- //////////////// -->
                                    <!-- offcanvas about -->

                                    <!-- <div class="col-2">
                                        <a href="cart.php">Cart</a>
                                    </div> -->

                                    <!-- offcanvas services -->
                                    <!-- /////////////// -->
                                    <!-- offcanvas services -->

                                    <!-- <div class="col-2">
                                        <a href="#">Watchlist</a>
                                    </div> -->
                                    <div class="col-1">
                                        <a href="#map"><i class="bi bi-geo-alt-fill"></i>Map</a>
                                    </div>
                                    <div class="col-2 text-end">
                                        <a href="#contact"><i class="bi bi-person-lines-fill"></i>Contacts</a>
                                    </div>
                                    <div class="col-3">
                                        <a href="Chat.php"><i class="bi bi-chat-quote-fill"></i>Chat with Us</a>
                                    </div>

                                    <div class="col-2">
                                        <a href="#" onclick="rate();"><i class="bi bi-star-half"></i>Rate Us</a>
                                    </div>

                                    <div class="col-2">
                                        <a href="cart.php"><i class="bi bi-basket2-fill"></i>Cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="rate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button-+" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
</body>

</html>